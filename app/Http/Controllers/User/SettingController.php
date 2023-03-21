<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Storage;

use App\Libraries\UserFunctions;

class SettingController extends Controller
{
  public function __construct()
  {
  }

  public function step00() {
    // LINE ログイン時にstripeアカウントが必要なため、emailを入力させる
    return view('user.setting.step00');
  }

  public function step00_post(Request $request) {
    $validated = $request->validate([
      'email' => 'email:rfc,dns|required|unique:users',
    ]);
    $user = Auth::guard('web')->user();
    $user->email = $request->email;
    $user->save();
    return redirect('mypage/setting/add_stripe');
  }


  public function add_stripe() {
    // stripeに顧客登録、完了したらsetting step01へ
    $user = Auth::guard('web')->user();

    $stripe = new \Stripe\StripeClient(
        config('services.stripe.secret')
    );
    $res = $stripe->customers->create([
        'preferred_locales' => ['ja'],
        'email' => $user->email,
    ]);

    // stripe idの取得
    $stripe_id = $res->id;

    $user->stripe_id = $stripe_id;
    $user->save();

    return redirect('mypage/setting/step01');
  }
  // metaに格納
  public function step01() {
    $user = Auth::guard('web')->user();
    $user_meta = $user->meta;
    if($user_meta == NULL) {
      // 初期セッティング
      $user_meta = array(
        'name' => '',
        'name_kana' => '',
        'name_en' => '',
        'department' => '',
        'company' => '',
        'address' => '',
        'tel' => '',
        'youtube' => '',
        'instagram' => '',
        'twitter' => '',
        'tiktok' => '',
        'facebook' => '',
        'line' => '',
        'profile' => '',
        'job' => '',
        'catch_copy' => '',
        'sub_catch_copy' => '',
        'message_title' => '',
        'message_body' => '',
      );
      $user->meta = json_encode($user_meta, true);
      $user->save();
    }else{
      $user_meta = json_decode($user_meta, true);
    }
    return view('user.setting.step01', compact('user_meta'));
  }

  public function step01_post(Request $request) {
    $user = Auth::guard('web')->user();
    $user_meta = json_decode($user->meta, true);
    if($user_meta == NULL) $user_meta = array();

    $user_meta['name'] = $request->name;
    $user_meta['name_kana'] = $request->name_kana;
    $user_meta['name_en'] = $request->name_en;
    $user_meta['department'] = $request->department;
    $user_meta['company'] = $request->company;
    $user_meta['address'] = $request->address;
    $user_meta['tel'] = $request->tel;
    $user->meta = json_encode($user_meta, true);
    $user->save();

    return redirect('mypage/setting/step02');
  }

  public function step02() {
    $user_meta = json_decode(Auth::guard('web')->user()->meta, true);
    if($user_meta == NULL) $user_meta = array();
    return view('user.setting.step02', compact('user_meta'));
  }

  public function step02_post(Request $request) {
    $user = Auth::guard('web')->user();
    $user_meta = json_decode($user->meta, true);
    if($user_meta == NULL) $user_meta = array();

    $user_meta['youtube'] = $request->youtube;
    $user_meta['instagram'] = $request->instagram;
    $user_meta['twitter'] = $request->twitter;
    $user_meta['tiktok'] = $request->tiktok;
    $user_meta['facebook'] = $request->facebook;
    $user_meta['line'] = $request->line;
    $user->meta = json_encode($user_meta, true);
    $user->save();

    return redirect('mypage/setting/step03');

  }

  public function step03() {
    $user_meta = json_decode(Auth::guard('web')->user()->meta, true);
    if($user_meta == NULL) $user_meta = array();
    return view('user.setting.step03', compact('user_meta'));
  }

  public function step03_post(Request $request) {
    $user = Auth::guard('web')->user();
    $user_meta = json_decode($user->meta, true);
    if($user_meta == NULL) $user_meta = array();

    if($request->has('photo')) {
      $file = $request->file('photo');
      $org_ex = $file->getClientOriginalExtension();
      $org_name = md5(date('YmdHis')).'_'.md5(rand(1000000000,9999999999)).'.'.$org_ex;
      $save_path = storage_path('app/public/profile/'.$user->id.'/'.$org_name);
      if(!\File::exists(storage_path('app/public/profile/'.$user->id))) {
          \File::makeDirectory(storage_path('app/public/profile/'.$user->id),0755,true);
      }
      if ( move_uploaded_file($file->path() , $save_path )) {
          // echo $filename . "をアップロードしました。";
      } else {
          abort(503);
      }

      // upload pathを返す
      $save_path = preg_replace('/.*storage\/app\/public/', '/storage', $save_path);
      $user_meta['profile'] = $save_path;
    }
    $user_meta['job'] = $request->job;
    $user->meta = json_encode($user_meta, true);
    $user->save();

    return redirect('mypage/setting/step04');
  }

  public function step04() {
    $user_meta = json_decode(Auth::guard('web')->user()->meta, true);
    if($user_meta == NULL) $user_meta = array();
    return view('user.setting.step04', compact('user_meta'));
  }

  public function step04_post(Request $request) {
    $user = Auth::guard('web')->user();
    $user_meta = json_decode($user->meta, true);
    if($user_meta == NULL) $user_meta = array();
    $user->url = $request->url;
    $user_meta['catch_copy'] = $request->catch_copy;
    $user_meta['sub_catch_copy'] = $request->sub_catch_copy;
    $user_meta['message_title'] = $request->message_title;
    $user_meta['message_body'] = $request->message_body;
    $user->meta = json_encode($user_meta, true);
    $user->save();
    if($user->first_setting_flag) {
      return redirect('mypage')->with('success', '更新が完了しました');
    }else{
      return redirect('mypage/setting/complete');
    }
  }


  public function complete() {
    $user = Auth::guard('web')->user();
    $stripe_id = $user->stripe_id;


    // --------------- テスト決済 --------------- 
    // $stripe = new \Stripe\StripeClient(
    //   config('services.stripe.test_secret')
    // );
    // $checkoutSession = $stripe->checkout->sessions->create([
    //   'customer' => $stripe_id, // 顧客IDを指定
    //   'payment_method_types' => ['card'],
    //   'line_items' => [[
    //     'price' => 'price_1MmUFlG3eqDpKf1LOXamr6Q0',
    //     'quantity' => 1,
    //   ]],
    //   'mode' => 'subscription',
    //   'success_url' => url('mypage/setting/card_complete'),
    //   'cancel_url' => url('mypage/setting/complete'),
    // --------------- テスト決済 --------------- 

    // --------------- 本番決済 --------------- 
    $stripe = new \Stripe\StripeClient(
      config('services.stripe.secret')
    );
    $checkoutSession = $stripe->checkout->sessions->create([
      'customer' => $stripe_id, // 顧客IDを指定
      'payment_method_types' => ['card'],
      'line_items' => [[
        'price' => 'price_1MoCIGG3eqDpKf1LqhQzkbmo',
        'quantity' => 1,
      ]],
      'mode' => 'subscription',
      'success_url' => url('mypage/setting/card_complete'),
      'cancel_url' => url('mypage/setting/complete'),
    ]);
    // --------------- 本番決済 --------------- 


    return view('user.setting.complete', compact('checkoutSession'));
  }

  public function card_complete() {
    $user = Auth::guard('web')->user();
    $user->first_setting_flag = true;
    $user->save();

    return view('user.setting.card_complete');
  }


  public function template() {
    $user_meta = json_decode(Auth::guard('web')->user()->meta, true);
    if($user_meta == NULL) $user_meta = array();
    return view('user.setting.template', compact('user_meta'));
  }


}
?>
