<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class PersonalController extends Controller
{

  public function index($code)
  {
    $user = User::where('url', $code)->first();
    if($user == NULL) abort(404);
    $template_no = $user->template_no;
    $template_no = str_pad($template_no, 2, 0, STR_PAD_LEFT);
    $meta = json_decode($user->meta, true);
    // var_dump($meta);
    $meta['email'] = $user->email;
    return view('personal/'.$template_no.'.index', compact('template_no', 'meta'));
  }

}
