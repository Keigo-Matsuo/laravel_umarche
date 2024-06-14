<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LifeCycleTestController extends Controller
{
    public function showServiceProviderTest()
    {
        $sample = app()->make('serviceProviderTest');

        $encrypt = app()->make('encrypter');
        $password = $encrypt->encrypt('password'); // 引数の文字列を暗号化
        dd($sample, $password, $encrypt->decrypt($password)); // 暗号化した文字列を復号化
    }

    public function showServiceContainerTest()
    {
        // サービスコンテナへの登録
        app()->bind('lifeCycleTest', function(){
            return 'ライフサイクルテスト';
        });
        // サービスコンテナから取り出す
        $test = app()->make('lifeCycleTest');
        // サービスコンテナの中身を確認
        // dd($test, app());

        // サービスコンテナなしのパターン
        $message = new Message();
        $sample = new Sample($message);
        $sample->run();

        // サービスコンテナありのパターン
        app()->bind('sample', Sample::class);
        $sample = app()->make('sample');
        $sample->run();
    }
}

class Sample
{
    public $message;
    public function __construct(Message $message){
        $this->message = $message;
    }
    public function run(){
        $this->message->send();
    }
}

class Message
{
    public function send(){
        echo('メッセージ表示');
    }
}