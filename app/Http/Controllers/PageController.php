<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

  public function index()
  {
    return view('page/index');
  }

  public function tokushoho()
  {
    return view('page/tokushoho/index');
  }

  public function termsOfService()
  {
    return view('page/terms-of-service/index');
  }

  public function privacy()
  {
    return view('page/privacy/index');
  }

}
