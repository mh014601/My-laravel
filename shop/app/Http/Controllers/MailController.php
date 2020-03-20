<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
// 引入邮件发送类
use Mail;
use Session;
use DB;
class MailController extends Controller
{
    //
    public $email;
    public $title;
//    public function sendText(){
////        $uname = Input::get('uname');
//        $email = Input::get('email');
//        $code = Input::get('code');
//        $this->email = $email;
//        $title = "欢迎您注册我们网站....";
//        $this->title = $title;
//        $flag = Mail::send('Home.mails.test',['email'=>$email,'code'=>$code],function($message){
//            $to = $this->email;
//            $message ->to($to)->subject($this->title);
//        });
//
//    }


    public function sendText(){

        $email = Input::get('email');
        $title = "欢迎您注册我们网站....";
        $this->title = $title;
        $activeCode = mt_rand(100000,999999);
        $content = "您好,请在30分钟内激活,激活码是:$activeCode";
        $info = Mail::raw($content, function ($message) {

            $to = $email = Input::get('email');
            $message ->to($to)->subject($this->title);
        });
    if($info){
        $data['status'] = 1;
        Session::put($email,$activeCode);
    }else{
        $data['status'] = 2;
        Session::put($email,$activeCode);
    }


    return response()->json($data);

    }
    public function checkEmail(Request $request){
        //获取前台传过来的值
        $verify = $request->get('verify');
        $email = $request->get('email');
        $verify1 = Session::get($email);
        if ($verify == $verify1) {
            $data1['mess1'] = "验证码正确";
        }else{
            $data1['mess1'] = "验证码不正确";
        }
        return response()->json($data1);
    }
}
