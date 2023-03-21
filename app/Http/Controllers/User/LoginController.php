<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

use App\Libraries\UserFunctions;

class LoginController extends Controller
{
    public function __construct()
    {
    }



    public function login(Request $request)
    {
        if(UserFunctions::checkLogin()){
            return redirect('mypage');
        }
        $line_signup_url = 'https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id='.config('services.line.client_id').'&bot_prompt=aggressive&redirect_uri='.config('services.line.redirect').'&state='.md5(uniqid(rand(), true)).'&scope=profile%20openid&nonce='.md5(uniqid(rand(), true)).'';
        return view('user.auth.login', compact('line_signup_url'));
    }



    public function login_post(Request $request) {
      $credentials = $request->only(['email', 'password']);
      if (Auth::guard('web')->attempt($credentials, true)) {
            // ログインしたらリダイレクト
            if(Auth::guard('web')->user()->first_setting_flags){
                return redirect('/mypage/');
            }else{
                return redirect('/mypage/setting/step01');
            }
            // Auth::guard('web')->logout();
            // return back()->withErrors([
            //     'auth' => ['認証に失敗しました'],
            // ]);
        }else{
            return back()->withErrors([
                'auth' => ['認証に失敗しました'],
            ]);
        }
    }




    public function logout()
    {
        // login状態のチェック
        if (\Auth::guard('web')->check()) {
            // ログアウトしてログインページにリダイレクト
            \Auth::guard('web')->logout();

            return redirect('login')->with('logout-success', 'ログアウトしました');
        }
    }


    
    public function signup() {
        if(UserFunctions::checkLogin()){
            return redirect('mypage');
        }
        $line_signup_url = 'https://access.line.me/oauth2/v2.1/authorize?response_type=code&client_id='.config('services.line.client_id').'&bot_prompt=aggressive&redirect_uri='.config('services.line.redirect').'&state='.md5(uniqid(rand(), true)).'&scope=profile%20openid&nonce='.md5(uniqid(rand(), true)).'';
        return view('user.auth.signup', compact('line_signup_url'));
    }

    public function signup_post(Request $request) {

        // reCAPTCHA
        $secretKey = '6Lc1wuYkAAAAAATHRDET5FTpn3yDTaEfv6n1N93v';
        $captchaResponse = $request->g_recaptcha_response;

        // APIリクエスト
        $verifyResponse = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret={$secretKey}&response={$captchaResponse}");

        // APIレスポンス確認
        $responseData = json_decode($verifyResponse);
        if ($responseData->success) {
            $validated = $request->validate([
                'email' => 'email:rfc,dns|required|unique:users',
            ]);
    
            $user = new User;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();

            Auth::guard('web')->login($user);

            // ユーザ登録通知
            // Mail::to($user->email)->send(new Signup($user->auth_hash));
            
            // return redirect('signup/complete?email='.$user->email);
            // return redirect('mypage/setting/step01');
            return redirect('mypage/setting/add_stripe');
        }else{
            return redirect('/');
        }
    }

    public function signup_complete(Request $request) {
        $this_email = $request->get('email'); 
        return view('user.auth.signup_complete', compact('this_email'));
    }



    

    public function line(Request $request) {
        return view('user.auth.line');
    }

    public function line_post(Request $request) {
        $validated = $request->validate([
            'email' => 'required|unique:users',
        ]);

        $line_information = $request->session()->get('line_information');
        $request->session()->forget('line_information');
        
        $user = new User;
        $user->email = $request->get('email');
        $user->line_user_id = $line_information[0];
        $user->line_display_name = $line_information[1];
        $user->line_picture_url = $line_information[2];

        $user->auth_hash = md5(uniqid(rand(), true));
        $user->auth_expire_date = date('Y-m-d H:i:s', strtotime('+10 minute'));
        $user->save();
        
        // ユーザ登録通知
        Mail::to($user->email)->send(new Signup($user->auth_hash));

        return redirect('signup/complete?email='.$user->email);

    }

    public function official_registration(string $hash) {
        $this_user = User::where('auth_flag', false)
            ->where('auth_hash', $hash)
            ->where('auth_expire_date', '>', date('Y-m-d H:i:s'))
            ->first();

        if($this_user == NULL) {
            // 無効のURLです。
            $this_user = User::where('auth_flag', false)
                ->where('auth_hash', $hash)
                ->delete();
                return redirect('signup')->with('error','有効期限が切れています。再度登録をやり直してください');
        }else{
            // 本登録
            $this_user->auth_flag = true;
            $this_user->auth_hash = NULL;
            $this_user->save();

            return redirect('login')->with('logout-success', '本登録が完了しました。登録した情報でログインしてください');
        }
    }

    public function forgot_password(Request $request)
    {
        if(UserFunctions::checkLogin()){
            return redirect('mypage');
        }
        return view('user.auth.forgot_password');
    }

    public function forgot_password_post(Request $request) {
        $this_user = User::where('email', $request->email)
            ->first();

        if($this_user === NULL) {
            // ユーザがない
            return redirect('/forgot_password')->with('error', 'メールアドレスが見つかりませんでした。');
        }

        // 再発行用URLを記載したメールを送信
        $this_user->republish_hash = md5(uniqid(rand(), true));
        $this_user->save();

        Mail::to($this_user->email)->send(new ForgotPassword($this_user->republish_hash));

        return redirect('login')->with('logout-success', 'パスワード再発行のURLを送信しました。');
    }

    public function re_generate_password($republish_hash) {
        $this_user = User::where('republish_hash', $republish_hash)->first();
        if($this_user === NULL) {
            return redirect('/login')->with('error', '無効なアクセスです。');
        }

        if(UserFunctions::checkLogin()){
            return redirect('mypage');
        }
        return view('user.auth.re_generate_password', compact('republish_hash'));
    }

    public function re_generate_password_post($republish_hash, Request $request) {
        $this_user = User::where('republish_hash', $republish_hash)->first();
        if($this_user === NULL) {
            return redirect('/login')->with('error', '無効なアクセスです。');
        }

        $this_user->password = Hash::make($request->password);
        $this_user->republish_hash = null;
        $this_user->save();
        return redirect('login')->with('logout-success', 'パスワードを再発行しました。');
        
    }


}
?>
