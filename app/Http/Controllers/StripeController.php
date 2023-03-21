<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class StripeController extends Controller
{
    public function __construct()
    {
    }


    public function webhook()
    {

    }
}