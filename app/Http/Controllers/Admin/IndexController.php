<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //显示首页
    public function index()
    {
    	return view('Admin.index');
    }

    //
    public function info()
    {
    	return view('Admin.info');
    }

    //添加用户
    public function add()
    {
    	return view('Admin.add',['title'=>'用户添加']);
    }

    //执行添加
    public function doadd(Request $request)
    {
    	echo 123;
    	// dd($request->all());
    }

    //退出
    public function logout()
    {
        // echo 123;die;
        session(['user'=>null]);
        return redirect('admin/login');
    }
}
