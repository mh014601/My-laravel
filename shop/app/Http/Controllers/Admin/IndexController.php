<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
class IndexController extends Controller
{
    //后台首页
    public function index(){

        return view('Admin/Index/index');
    }

    //top
    public function top(){
        $flag = Session::get('flag');
        $row = DB::table('manager')->where(['flag'=>$flag])->first();
        $admin_name = $row->admin_name;

        return view("Admin/Index/top",['admin_name'=>$admin_name]);
    }
    //left
    public function left(){
        return view("Admin/Index/left");
    }
    //main
    public function main(){
        $flag = Session::get('flag');
        $row = DB::table('manager')->where(['flag'=>$flag])->first();
        $admin_name = $row->admin_name;
        return view("Admin/Index/main",['admin_name'=>$admin_name]);
    }


    public function login(){
        return view("Admin/Index/login");
    }
    // 登录处理程序
    public function loginAction(){
        $admin_name = Input::get('admin_name');
        $admin_pass = md5(md5(Input::get("admin_pass")));

        $status = '1';
        $where = compact("admin_name","admin_pass","status");
//        $where = ['admin_name'=>$admin_name,'admin_pass'=>$admin_pass,"status"=>1];
        // 查询用户名密码是否正确并且不被禁用
//        DB::connection()->enableQueryLog();#开启执行日志
        $row  = DB::table('manager')->where($where)->first();
//        dump($row);
//        print_r(DB::getQueryLog());   //获取查询语句、参数和执行时间

        if($row){
            // 用户名,密码正确,并且不被禁用
            // 1.存session
            $flag = $row->flag;
            Session::put('flag',$flag);
            // 2.去首页
            return redirect(url("Admin/Index/index"));
        }else {
            return redirect(url("Admin/Index/login"));
        }
    }

    // 退出
    public function loginOut(){
        // 清除session
        Session::forget('flag');
        return redirect(url('Admin/Index/login'));
    }
}
