<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
























































































































































































//MH
//前台首页
//use Illuminate\Routing\Route;

//use Illuminate\Routing\Route;

Route::get('/', ['uses'=>'Home\IndexController@index']);
//{return view('Home/Index/index');
//qq
Route::get('/Index/callback',['uses'=>'Home\IndexController@callback']);
Route::get('/Index/getAccessTokenByCode',['uses'=>'Home\IndexController@getAccessTokenByCode']);
Route::get('/Index/getOpenIdByAccessToken',['uses'=>'Home\IndexController@getOpenIdByAccessToken']);
//前台
//发邮件的路由
Route::group(['prefix'=>'Mail/'],function (){
   Route::any('/sendText',['uses'=>'MailController@sendText']);
   //验证邮箱码
   Route::any('/checkEmail',['uses'=>'MailController@checkEmail']);
});
//Route::group(['prefix'=>'Home','middleware'=>'HomeLogin'],function (){
Route::group(['prefix'=>'Home'],function (){
    Route::group(['prefix' => 'Index'],
        function () {
            Route::any('/djs', ['uses' => 'Home\IndexController@djs']);
            //注册
            Route::any('/register', ['uses' => 'Home\IndexController@register']);
            //登录
            Route::any('/login', ['uses' => 'Home\IndexController@login']);
            //登录处理页面
            Route::any('/loginAction', 'Home\IndexController@loginAction');
            //退出处理
            Route::any('/loginOut', ['uses' => 'Home\IndexController@loginOut']);

            //记住密码
            Route::any('/returnpass', ['uses' => 'Home\IndexController@returnpass']);
            //邮箱找回密码处理
            Route::any('/returnpassAction', ['uses' => 'Home\IndexController@returnpassAction']);
            //手机找回密码处理
            Route::any('/phoneAction', ['uses' => 'Home\IndexController@phoneAction']);
            //qq绑定
            Route::any('/qqBangDing', ['uses' => 'Home\IndexController@qqBangDing']);
            //qq绑定处理
            Route::any('/qqAction', ['uses' => 'Home\IndexController@qqAction']);

            //邮箱注册处理
            Route::any('/registerAction1', ['uses' => 'Home\IndexController@registerAction1']);
            Route::any('/ajax_checkEmail', ['uses' => 'Home\IndexController@ajax_checkEmail']);
            Route::any('/checkEmail', ['uses' => 'Home\IndexController@checkEmail']);
            //检验手机号
            Route::any('/checkphone', ['uses' => 'Home\IndexController@checkphone']);
            //手机号注册处理
            Route::any('/reg', ['uses' => 'Home\IndexController@reg']);
            //验证码处理
            Route::any('/checkVerify', ['uses' => 'Home\IndexController@checkVerify']);
            //ajax注册手机号到数据库
            Route::any('/regphone', ['uses' => 'Home\IndexController@regphone']);
            Route::any('/activeMember', ['uses' => 'Home\IndexController@activeMember']);
            Route::any('/juhecurl1', ['uses' => 'Home\IndexController@juhecurl1']);

        });
    Route::group(['prefix'=>'Infor'],function () {
        //个人中心
        Route::any('/information', ['uses' => 'Home\InforController@information']);
        Route::any('/saveEditAction', ['uses' => 'Home\InforController@saveEditAction']);
        Route::any('/uploadPic', ['uses' => 'Home\InforController@uploadPic']);
        Route::any('/touxiang', ['uses' => 'Home\InforController@touxiang']);
        //安全设置
        Route::any('/safety', ['uses' => 'Home\InforController@safety']);
        Route::get('/ajax_checkPassword', ['uses' => 'Home\InforController@ajax_checkPassword']);
        //密码修改处理
        Route::any('/safetyAction', ['uses' => 'Home\InforController@safetyAction']);


    });
});
 //后台
Route::group(['prefix'=>'Admin'],function () {
    // 后台模块
    Route::group(['prefix' => '/Index'], function () {
        // 后台首页
        Route::get('/index', ['uses' => 'Admin\IndexController@index']);
        Route::get('/top', ['uses' => 'Admin\IndexController@top']);
        Route::get('/left', ['uses' => 'Admin\IndexController@left']);
        Route::get('/main', ['uses' => 'Admin\IndexController@main']);
        Route::get('/login', ['uses' => 'Admin\IndexController@login']);
        // zxh 登录的处理程序
        Route::post('/loginAction', ['uses' => 'Admin\IndexController@loginAction']);
        Route::get('/loginOut', ['uses' => 'Admin\IndexController@loginOut']);
    });
});
////管理员模块
//Route::group(['prefix'=>'/Manger'],function (){
//   //管理员首页
//    Route::any('/managerList',['uses'=>'Admin\ManagerController@mamagerList']);
//});
