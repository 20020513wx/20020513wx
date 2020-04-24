<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use Illuminate\Support\Facades\Cookie;
class LoginController extends Controller
{
    //登录
    public function logindo(){
    	$data=request()->except('_token');
    	$adminInfo=Admin::where('admin_name',$data['admin_name'])->first();
        if(!empty($adminInfo)){
            if(decrypt($adminInfo->admin_pwd)!=$data['admin_pwd']){
                return redirect('/login')->with('msg','用户名或者密码不正确');
            }
            if($data['checks']=='1'){
                $arr=['admin_name'=>$data['admin_name'],'admin_pwd'=>$data['admin_pwd']];
                $arr=serialize($arr);
                Cookie::queue('names',$arr,1);
            }
        session(['adminInfo'=>$adminInfo]);
        return redirect('/goods');

        }else{
            return redirect('/login')->with('msg','用户名不存在');
        }
    	
    	
    }

    //测试
    public function test(){
        echo Cookie::get('names');
    }

    //退出
    // public function end(){
    // 	request()->session()->forget('adminInfo');
    //     Cookie::queue('names',null);
        
        
    // 	return redirect('/login');
    // }
    public function end(){
       Auth::logout();
       return redirect('/login');
    }
}
