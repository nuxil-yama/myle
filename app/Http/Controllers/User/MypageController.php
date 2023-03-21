<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Auth;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Storage;

use App\Libraries\UserFunctions;

class MypageController extends Controller
{
  public function __construct()
  {
  }

  public function index() {
    $first_setting_flag = Auth::guard('web')->user()->first_setting_flag;
    if(!$first_setting_flag) {
      // settingへ
      return redirect('mypage/setting/step01');
    }else{
      return view('user.mypage.index');
    }
  }
}
?>
