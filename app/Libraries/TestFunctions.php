<?php
namespace App\Libraries;

use Auth;

class TestFunctions
{
  public static function CheckAnswer($request) 
  { 
    // テストの答え合わせ
    // return true or false
    /**
     * →本当のテストみたいな感じで、合格のボーダーラインを60問中、50問正解で合格みたいな感じにしたいらしい。。
     * かつ正解した項目と不正解がわかって簡単に復習できるみたいにしたいらしい。。。。
     */
    $answers = [
      $request->answer01,
      $request->answer02,
      $request->answer03,
      $request->answer04,
      $request->answer05,
      $request->answer06,
      $request->answer07,
      $request->answer08,
      $request->answer09,
      $request->answer10,
      $request->answer11,
      $request->answer12,
      $request->answer13,
      $request->answer14,
      $request->answer15,
      $request->answer16,
      // $request->answer17,
      // $request->answer18,
      // $request->answer19,
      // $request->answer20,
    ];

    // 再利用しそうな気がするからセッションに格納
    $request->session()->put('answers', $answers);

    $current_answers = [
      '2',
      '2',
      '3',
      '4',
      '4',
      '4',
      '2',
      '3',
      '4',
      '4',
      '4',
      '2',
      '4',
      '2',
      '1',
      '2',
    ];

    $count = 0;
    for ($i=0; $i < count($answers); $i++) { 
      if($answers[$i] == $current_answers[$i]) {
        $count++;
      }
    }
    $border_line = 11;
    if($border_line <= $count) {
      // ユーザのテスト合格flag更新
      $user = Auth::guard('web')->user();
      $user->test_flag = true;
      $user->test_pass_date = date('Y-m-d H:i:s');
      $user->data = json_encode(array(
        'answers' => $answers
      ),true);
      $user->save();
      return true;
    }else{
      return false;
    }

  } 

}