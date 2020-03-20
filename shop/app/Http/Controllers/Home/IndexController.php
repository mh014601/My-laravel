<?php

namespace App\Http\Controllers\Home;
error_reporting( E_ALL&~E_NOTICE );
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Input;
use DB;
use Session;
use Mail;

class IndexController extends Controller
{
    const APP_ID = '101511175';
    const APP_KEY = 'ae61e6840ff3c11e2b06b7d2d9109c21';
    public function index(){
        return view('Home/Index/index');
    }
    public function djs(){
        return view('Home/Index/djs');
    }
    //注册
   public function register(){
       return view('Home/Index/register');
   }
   public function login(){
       $returnUrl = urldecode(Input::get('returnUrl','/'));
       $url = urlencode("http://www.shop.com/Index/callback");
       return view('Home/Index/login',['url'=>$url,'returnUrl'=>$returnUrl]);
   }
    //登陆处理页面
    public function loginAction(Request $request){
        $returnUrl = Input::get('returnUrl','/');
        $user = $request->get('user');
        $upass = md5(md5($request->get('upass')));
        $sss = $request->get('hidd');
        $rows = DB::table('users')->where($sss,$user)->where('password',$upass)->first();
//      dd($rows);
        if (!empty($rows)){
            //存session
           Session::put('uid',$rows->id);
           Session::put('user',$user);
//           Session::put('sss',$sss);
            //登陆成功  跳转到首页
//            return redirect('/');
            return redirect($returnUrl);

        }else{
            //登录失败  跳转到登录页面
            return redirect('Home/Index/login');

        }

    }
    //退出
    public function loginOut(){
        //清楚session
        Session::forget('uid');
        Session::forget('user');
        Session::forget('id');
        Session::forget('ud');
        //跳转登陆页面
        return redirect(url('Home/Index/login'));
    }


    //邮箱找回密码处理
    public function returnpassAction(){
        $password = md5(md5(Input::get('password')));
        $email = Input::get('email');
        $data = compact('password');
        $row = DB::table('users')->where(['email'=>$email])->first();
        if($row){
            $reg = DB::table('users')->where(['email'=>$email])->update($data);
            if($reg){
                //找回密码成功
                $data['status']=0;
            }else{
                //找回密码失败
                $data['status']=1;
            }
        }else{
            //邮箱不存在
            $data['status'] =2;
        }
        return response()->json($data);
    }


    //手机找回密码处理
    public function phoneAction(){
        $password = md5(md5(Input::get('password1')));
        $phone = Input::get('phone');
        $data = compact('password');
       $row = DB::table('users')->where(['phone'=>$phone])->update($data);
       if($row){
           //找回密码成功
           $data['status']=1;
       }else{
           //找回密码失败
           $data['status']=2;
       }
        return response()->json($data);
    }

    //邮箱注册
    public function checkEmail(){
        $email = Input::get('email');
        $row =  DB::table('users')->where('email',$email)->first();
        if($row){
            $data['status'] =1;
        }else{
            $data['status'] =2;

        }
        return response()->json($data);
    }


    //ajax 验证邮箱是否存在
    public function ajax_checkEmail(){
        $user_pic="upload/moren.jpg";
        $email = Input::get('email');
        $password = md5(md5(Input::get('password')));
        $code = md5(md5($email.$password));
        $data = compact('email','password','code','user_pic');

        // first 一条记录
        $row = DB::table('users')->where(['email'=>$email])->first();
        if($row){
            // 不能注册
            $data['status'] = 1;
            //            return redirect(Home/Index/register);
        }else{
            //$id = DB::table('users')->insert(['email'=>$email,'password'=>md5(md5($password))]);
            $id = DB::table('users')->insertGetId($data);
            if($id){
                //注册成功
//                $url = "http://www.shop.com/Mail/send?email=$email&code=$code";
//                $this->juhecurl($url);
                $data['status'] = 0;
            }else{
                //注册失败
                $data['status'] = 2;
//                dd('flse');
            }

        }
        return response()->json($data);
   }
    //注册手机发验证码处理页面
    public function reg(Request $request)
    {
        //获取前台的手机号
        $phone1  = $request->get('phone');
        header('content-type:text/html;charset=utf-8');
        $sendUrl = 'http://v.juhe.cn/sms/send'; //短信接口的URL
        //需要发送的验证码
        $math = mt_rand(100000, 999999);
        $smsConf = array(
            'key' => '5d7836ea393227bc2e03d0a20d493099', //您申请的APPKEY
            'mobile' => $phone1, //接受短信的用户手机号码
            'tpl_id' => '192607', //您申请的短信模板ID，根据实际情况修改
            'tpl_value' => "#code#=" . $math . "&#company#=聚合数据" //您设置的模板变量，根据实际情况修改
        );
        $content =  self::juhecurl($sendUrl,$smsConf,1); //请求发送短信
        if ($content) {
            $result = json_decode($content, true);
            $error_code = $result['error_code'];
            if ($error_code == 0) {
                //短信发送成功的时候将验证码存入session
                session()->put($phone1,$math);
                $data['statu'] = "0";
                $data['mess'] = "短信发送成功";
            } else {
                $data['mess'] = "短信发送失败";
                $data['statu'] = "1";
            }
        } else {

            $data['mess'] = "短信发送失败";
        }
        return response()->json($data);
    }
    //手机号发短信接口
    public static function juhecurl($url,$params=false,$ispost=0)
    {
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22');
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($ispost) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            curl_setopt($ch, CURLOPT_URL, $url);
        } else {
            if ($params) {
                curl_setopt($ch, CURLOPT_URL, $url . '?' . $params);
            } else {
                curl_setopt($ch, CURLOPT_URL, $url);
            }
        }
        $response = curl_exec($ch);
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $httpInfo = array_merge($httpInfo, curl_getinfo($ch));
        curl_close($ch);
        return $response;
    }

    //验证验证码的正确性
    public function checkVerify(Request $request){
        //获取前台传过来的值
        $verify = $request->get('verify');
        $phone2 = $request->get('phone2');
        //Session::get($phone2)和存的 session()->put($phone1,$math)一样，因为id都是一样的即值也一样
        $verify1 = Session::get($phone2);
        if ($verify == $verify1) {
            $data1['mess1'] = "验证码正确";
        }else{
            $data1['mess1'] = "验证码不正确";
        }
        return response()->json($data1);
    }
    //验证手机号是否已存在
    public function checkphone(Request $request){
        $phone = $request->get('phone');
//        $phone = 17803909058;
        $mable =  DB::table('users')->where('phone',$phone)->first();
        if($mable){
            $data['messphone'] = "该手机号已注册";
        }else{
            $data['messphone'] = "该手机号未注册";

        }
        return response()->json($data);

    }

    //ajax处理注册到数据库中
    public function regphone(Request $request){
        $user_pic="upload/moren.jpg";
        $ph = $request->get('phone3');
        $pass3 = $request->get('pass3');
        $pass4 = md5(md5($pass3));
        $row = DB::table('users')->insert(['phone'=>$ph,'password'=>$pass4,'user_pic'=>$user_pic]);
        if ($row){
            $data['mess'] = '用户注册成功';

        }else{
            $data['mess'] = '用户注册失败';
        }
        return response()->json($data);

    }
    //找回密码
    public function returnpass(){
        return view('Home/Index/returnpass');
    }
    //激活数据库用户状态
    public function activeMember(){
        $code = Input::get('code');
        // 修改 此code 对应的用户的status = 2
        DB::table('users')->where('code',$code)->update(['status'=>2]);
        return redirect(url('Home/Index/login'));
    }
    public function juhecurl1($url,$params=false,$ispost=0){
        $httpInfo = array();
        $ch = curl_init();
        curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
        curl_setopt( $ch, CURLOPT_USERAGENT , 'Mozilla/5.0 (Windows NT 5.1) AppleWebKit/537.22 (KHTML, like Gecko) Chrome/25.0.1364.172 Safari/537.22' );
        curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 30 );
        curl_setopt( $ch, CURLOPT_TIMEOUT , 30);
        curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
        if( $ispost )
        {
            curl_setopt( $ch , CURLOPT_POST , true );
            curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
            curl_setopt( $ch , CURLOPT_URL , $url );
        }
        else
        {
            if($params){
                curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
            }else{
                curl_setopt( $ch , CURLOPT_URL , $url);
            }
        }
        $response = curl_exec( $ch );
        if ($response === FALSE) {
            //echo "cURL Error: " . curl_error($ch);
            return false;
        }
        $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
        $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
        curl_close( $ch );
        return $response;
    }
    // qq登录的回调
    public function callback(){
        $code = Input::get('code');

        // 通过 code 获取access_Token
        $access_token = $this->getAccessTokenByCode($code);
        // 通过 access_Token 获取openid
        $openid = $this->getOpenIdByAccessToken($access_token);
        // 通过openid获取用户的基本信息
        $userinfo = $this->getUserInfoByOpenId($access_token,$openid);

        // 写数据库
        $data['openid'] = $openid;
        $nickname = $data['nickname'] = $userinfo->nickname;
        $data['sex'] = $userinfo->gender;
        $data['city'] = $userinfo->city;
        $data['age'] = $userinfo->year;
        //插入
         $id = $this->insertQQ($data);

        //存session
        if($id){
            Session::put('openid',$openid);
            Session::put('nickname',$nickname);
            return redirect(url('Home/Index/qqBangDing'));
        }
        $row =  DB::table('users')->where(['openid'=>$openid])->first();

        if($row) {
             Session::put('ud',$row->openid);

            $data1 = compact('row');

            return view('Home/Index/index', $data1);
        }
//                return redirect(url("/"));
    }
    //qq绑定
    public function qqBangDing(){
        return view('Home/Index/qqBangDing');
    }
    public function qqAction(){
        $user_pic="upload/moren.jpg";
    $name = Input::get('name');
    $sex = Input::get('sex');
    $birthday = Input::get('birthday');
    $phone = Input::get('phone');
    $email = Input::get('email');
    $password = md5(md5(Input::get('password')));
    $add_time = date("Y-m-d H:i:s",time());
    $username = Session::get('nickname');
    $openid = Session::get('openid');
    $data = compact('name','sex','birthday','phone','email','password','add_time','username','openid','user_pic');
    $id = DB::table('users')->insertGetId($data);
    if($id){
        $row = DB::table('qq_user')->where('openid',$openid)->update(['uid'=>$id]);
        if($row){
            Session::put('id',$id);
            $rows = DB::table('users')->where('id',$id)->first();
            $data1 = compact('rows');
            return view('/Home/Index/index',$data1);
        }
    }else{
        return redirect(url('Home/Index/qqBangDing'));
    }
    }
    // 通过 code 获取access_Token
    public function getAccessTokenByCode($code){
        $redirect_uri = urlencode("http://www.shop.com/Index/callback");
        // 2.通过code获取accessToken
        $url = "https://graph.qq.com/oauth2.0/token?grant_type=authorization_code&client_id=".self::APP_ID."&client_secret=".self::APP_KEY."&code={$code}&redirect_uri={$redirect_uri}";
        $res = file_get_contents($url);
        $r = explode("&",$res);
        $accessToken =  (explode("=",$r[0]))[1];
        return $accessToken;
    }
    // 通过 access_Token 获取openid
    public function  getOpenIdByAccessToken($accessToken){
        // 3.通过accessToken 获取openid
        $url = "https://graph.qq.com/oauth2.0/me?access_token=$accessToken";
        $res = file_get_contents($url);
        $str =  substr($res,strpos($res,'(')+1,strpos($res,")")-strpos($res,"(")-1);
        $obj = json_decode($str);
        return  $obj->openid;
    }
    // 通过openid获取用户的基本信息
    public function getUserInfoByOpenId($accessToken,$openid){
        // 4.根据openid(腾讯分配给网站的用户唯一标识,用于区分不同的用户身份)来获取用户信息
        $url = "https://graph.qq.com/user/get_user_info?access_token=$accessToken&oauth_consumer_key=".self::APP_ID."&openid={$openid}";
        $userinfo = file_get_contents($url);
//        var_dump($userinfo);
        $userinfo = json_decode($userinfo);
        return $userinfo;
    }
    public function checkQQIsExist($openid){
        $row =  DB::table('qq_user')->where(['openid'=>$openid])->first();
        if($row){
            return false;
        }else{
            return true;
        }
    }
        public function insertQQ($data){
        $openid = $data['openid'];
        if($this->checkQQIsExist($openid)){
            $id =  DB::table('qq_user')->insertGetId($data);
        return $id;
        }


    }



}
