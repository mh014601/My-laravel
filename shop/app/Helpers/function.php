<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/10/21
 * Time: 11:06
 */

// 无限级分类
function gettree($arr)
{
    $tree = array();
    foreach ($arr as $val) {
        if (isset($arr[$val->pid])){
            $arr[$val->pid]->son[] = &$arr[$val->id]; //非顶级分类
        } else {
            $tree[] = &$arr[$val->id];
        }
    }
    return $tree;
}
// 处理数组 让数组的键就是数组id
function preArr($arr){
    $temp = [];
    foreach ($arr as $k=>$v){
        $temp[$v->id] = $v;// $temp_arr[1] = ['id'=>1,'cate_name'=>'服装','pid'=>0,'path'=>'1']
    }
    return $temp;
}
// 获取所有的商品分类
function getAllCateList(){
    return   DB::table('category')->orderBy('path','asc')->get();

}

// 上传图片
function uploadPic($request){
    $old_name =  $request-> file('user_pic')->getClientOriginalName();
    $ext =  $request-> file('user_pic')->getClientOriginalExtension();

    $filename = $old_name.time().mt_rand(1000,9999).'.'.$ext;
    $bool =  $request->file('user_pic')->move("./upload/",$filename);
    if($bool){
        return $filename;
    }else{
        return false;
    }

}
function getSonsIdById($id)
{
    static $arr = [];
    // 1.获取孩子的id
    $rows = DB::table('category')->where('pid',$id)->get();
    if ($rows) {
        // 说明还有孩子 继续查询
        foreach ($rows as $v) {
            $id = $v->id;  // 4   5  6
            $arr[] = $id;
            getSonsIdById($id);// 4
        }
    }

    return $arr;
}

// 1. app 目录下 新建 目录Helpers(自定义目录,目录名任意)
// 2. Helpers 目录下 新建php文件 functions.php(自定义文件,文件名任意)
// 3. composer.json 文件 添加 "files":["app/Helpers/functions.php" ]
//"autoload": {
//    "classmap": [
//        "database/seeds",
//        "database/factories"
//    ],
//        "psr-4": {
//        "App\\": "app/"
//        },
//        "files":[
//        "app/Helpers/functions.php"
//    ]
//    },
//
//// 4. 执行命令 composer dump-auto 重新加载 composer.json 配置文件 生效