<?php
namespace App\Libraries;

use Auth;
use App\Models\User;

class UserFunctions
{
  // public static function userComplete($request) 
  // { 
  //   // ユーザ本登録
  //   $user = Auth::guard('web')->user();
  //   $user->auth_flag = true;
  //   $user->tutorial_flag = true;
  //   $user->anquate_rate = $request->star;
  //   $user->anquate_message = $request->message;
  //   $user->save();
  // } 

  public static function checkLogin() {
    if(Auth::guard('web')->check()) {
      return true;
    }else{
      return false;
    }
  }
  
}

?>