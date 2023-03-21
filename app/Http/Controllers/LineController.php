<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class LineController extends Controller
{
    public function __construct()
    {
    }


    public function getAccessToken($req)
    {
  
      $headers = [ 'Content-Type: application/x-www-form-urlencoded' ];
      $post_data = array(
        'grant_type'    => 'authorization_code',
        'code'          => $req['code'],
        'redirect_uri'  => config('services.line.redirect'),
        'client_id'     =>  config('services.line.client_id'),
        'client_secret' => config('services.line.client_secret'),
      );
      $url = 'https://api.line.me/oauth2/v2.1/token';
  
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
      curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
      curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($post_data));
  
      $res = curl_exec($curl);
      curl_close($curl); 
      $json = json_decode($res);
      if(isset($json->access_token)) {
        $accessToken = $json->access_token;
        return $accessToken;
      }else{
        return false;
      }

    }
 

    public function getProfile($at)
    {
  
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Bearer ' . $at));
      curl_setopt($curl, CURLOPT_URL, 'https://api.line.me/v2/profile');
      curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'GET');
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  
      $res = curl_exec($curl);
      curl_close($curl);
  
      $json = json_decode($res);
  
      return $json;
  
    }


    public function callback(Request $request) {
        $accessToken = $this->getAccessToken($request);
        if($accessToken === false) {
          return redirect('signup');
        }
        $profile = $this->getProfile($accessToken);

        // userチェック
        $this_user = User::where('line_user_id', $profile->userId)
            ->first();
        if($this_user == NULL) {

          $user = new User;
          $user->line_user_id = $profile->userId;
          $user->line_display_name = $profile->displayName;
          $user->line_picture_url = $profile->pictureUrl;
          $user->save();
          Auth::guard('web')->login($user, true);

          return redirect('mypage/setting/step00');
        }else{
          // ログイン
          Auth::guard('web')->login($this_user, true);
          return redirect('mypage');
        }
    }
}