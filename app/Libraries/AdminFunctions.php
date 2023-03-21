<?php
namespace App\Libraries;

use Auth;
use App\Models\Admin;

class AdminFunctions
{
  public static function checkLogin() {
    if(Auth::guard('admin')->check()) {
      return true;
    }else{
      return false;
    }
  }
}