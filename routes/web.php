<?php

use Illuminate\Support\Facades\Route;

Route::get('', [App\Http\Controllers\PageController::class, 'index'])->name('top');
Route::get('tokushoho', [App\Http\Controllers\PageController::class, 'tokushoho'])->name('top');

Route::get('signup', [App\Http\Controllers\User\LoginController::class, 'signup'])->name('signup');
Route::post('signup', [App\Http\Controllers\User\LoginController::class, 'signup_post'])->name('signup');
Route::get('signup/complete', [App\Http\Controllers\User\LoginController::class, 'signup_complete'])->name('signup');
Route::get('signup/line', [App\Http\Controllers\User\LoginController::class, 'line'])->name('line');
Route::post('signup/line', [App\Http\Controllers\User\LoginController::class, 'line_post'])->name('line_post');

Route::get('login', [App\Http\Controllers\User\LoginController::class, 'login'])->name('login');
Route::post('login', [App\Http\Controllers\User\LoginController::class, 'login_post'])->name('login_post');

Route::get('forgot_password', [App\Http\Controllers\User\LoginController::class, 'forgot_password'])->name('user.login');
Route::post('forgot_password', [App\Http\Controllers\User\LoginController::class, 'forgot_password_post'])->name('forgot_password');

Route::get('re_generate_password/{republish_hash}', [App\Http\Controllers\User\LoginController::class, 're_generate_password'])->name('user.login');
Route::post('re_generate_password/{republish_hash}', [App\Http\Controllers\User\LoginController::class, 're_generate_password_post'])->name('re_generate_password');

Route::get('line_login/callback', [App\Http\Controllers\LineController::class, 'callback'])->name('callback');
Route::get('stripe-webhook', [App\Http\Controllers\StripeController::class, 'webhook'])->name('stripe_webhook');



Route::prefix('/mypage/')->middleware('auth:web')->group(function () {
  Route::get('', [App\Http\Controllers\User\MypageController::class, 'index'])->name('user.profile');

  Route::get('setting/step00', [App\Http\Controllers\User\SettingController::class, 'step00'])->name('user_setting');
  Route::post('setting/step00', [App\Http\Controllers\User\SettingController::class, 'step00_post'])->name('user_setting');

  Route::get('setting/add_stripe', [App\Http\Controllers\User\SettingController::class, 'add_stripe'])->name('user_setting');

  Route::get('setting/step01', [App\Http\Controllers\User\SettingController::class, 'step01'])->name('user_setting');
  Route::post('setting/step01', [App\Http\Controllers\User\SettingController::class, 'step01_post'])->name('user_setting');
  Route::get('setting/step02', [App\Http\Controllers\User\SettingController::class, 'step02'])->name('user_setting');
  Route::post('setting/step02', [App\Http\Controllers\User\SettingController::class, 'step02_post'])->name('user_setting');
  Route::get('setting/step03', [App\Http\Controllers\User\SettingController::class, 'step03'])->name('user_setting');
  Route::post('setting/step03', [App\Http\Controllers\User\SettingController::class, 'step03_post'])->name('user_setting');
  Route::get('setting/step04', [App\Http\Controllers\User\SettingController::class, 'step04'])->name('user_setting');
  Route::post('setting/step04', [App\Http\Controllers\User\SettingController::class, 'step04_post'])->name('user_setting');

  Route::get('setting/complete', [App\Http\Controllers\User\SettingController::class, 'complete'])->name('user_setting');
  Route::get('setting/card_complete', [App\Http\Controllers\User\SettingController::class, 'card_complete'])->name('user_setting_card_complete');
  
  Route::get('setting/template', [App\Http\Controllers\User\SettingController::class, 'template'])->name('user_template');

  Route::post('logout', [App\Http\Controllers\User\LoginController::class, 'logout'])->name('logout');
});



// personal page
Route::get('{code}', [App\Http\Controllers\PersonalController::class, 'index'])->name('lp');

?>