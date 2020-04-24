<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
    	return view('index',['name'=>'问问']);
    }

    public function addDo(){
    	$post=request()->all();
    	dd($post);
    }

    public function goods($id,$name='dd'){
    	echo $id;
    	dd($name);
    }

    //设置cookie
    public function setcookie(){
        return response('设置cookie')->cookie('nameInfo','乐柠',1);
    }

    //获取存入的cookie
    public function getcookie(){
        echo request()->cookie('nameInfo');
    }
    
}
