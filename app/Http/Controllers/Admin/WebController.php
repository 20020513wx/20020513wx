<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Web;
use Validator;
class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //展示视图
        $where=[];
        $web_name=request()->web_name;
        if($web_name){
            $where[]=['web_name','like',"%$web_name%"];
        }
        $page=config('app.pageSize');
        $webInfo=Web::where($where)->paginate($page);
        return view('admin.web.web',['webInfo'=>$webInfo,'web_name'=>$web_name]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //添加视图
        return view('admin.web.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //添加执行
        $data=request()->except('_token');
        $validator=Validator::make($data,[
            'web_name'=>'required|unique:web|regex:/^[\x{4e00}-\x{9fa5}\w]{1,}$/u',
            'web_dizhi'=>'required',
        ],[
            'web_name.required'=>"网站名称必填",
            'web_name.unique'=>"网站名称重复",
            'web_name.regex'=>"网站名称为中文字母数字下划线组成",
            'web_dizhi.required'=>"网站地址必填",
            //'web_dizhi.regex'=>"网站地址格式有误",
        ]);
        if($validator->fails()){
            return redirect('web/create')->withErrors($validator)->withInput();;
        }
        //检测文件是否有信息
        if(request()->hasFile('web_logo')){
            $data['web_logo']=upload('web_logo');
        }
        $res=Web::insert($data);
        if($res){
            return redirect('/web');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //修改视图
        $res=Web::find($id);
        return view('admin.web.edit',['res'=>$res]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //修改执行
        $data=request()->except('_token');
        if(request()->hasFile('web_logo')){
            $data['web_logo']=upload('web_logo');
        }
        $res=Web::where('web_id',$id)->update($data);
        if($res!==false){
            return redirect('/web');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除方法
        $res=Web::destroy($id);
        if($res){
            return redirect('/web');
        }
    }
}
