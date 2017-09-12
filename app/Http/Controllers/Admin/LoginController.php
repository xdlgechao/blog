<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\common\code\code;
use App\model\Users;
use Crypt;



class LoginController extends Controller
{
	//首页
	public function index()
	{
		return view('Admin.index',['title'=>'微博首页']);
	}
    //显示登录页面
    public function login()
    {

    	return view('Admin.login',['title'=>'个人博客']);
    }

    //显示验证码
    public function yzm()
    {
    	$code = new \Code();
    	$code->make();

    }
    //登录操作
    public function dologin(Request $request)
    {
    	// dd('123');
    	//$data = $request->except(['_token']);
    	//dd($data);
    	//1.判断是否是post方法提交的表单
    	if($request->isMethod('post')){
    		 $data = $request->except(['_token']);
    		 // dd($data);
    		 if(!($data['username']&&$data['password']&&$data['code'])){
    		 	return back()->with('msg','用户名密码验证码不能为空');
    		 }else{
    		 	//echo 123;
    		 	//判断验证码
    		 	$code = new \Code();
    		 	if(strtoupper($data['code']) != $code->get()){//获取验证码类中的验证码
    		 		return back()->with('msg','验证码错误');
    		 	}else{
    		 		$user = Users::where('user_name',$data['username'])->first();
                    if(!$user){
                        return back()->with('msg','此用户不存在');
                    }
    		 		if($data['password'] != decrypt($user['user_pass'])){
    		 			return back()->with('msg','密码不正确');
    		 		}

                    session(['user'=>$user]);

                    return redirect('admin/index');
    		 		// dd($user['user_name']);
    		 		
    		 	}
    		 }
    	}
    }

    public function crypt()
    {
    	return view('Admin.test');

    }

    //密码加密
    public function docrypt(Request $request)
    {
    	$data = $request->except(['_token']);
    	$name = $data['user_name'];
    	//dd($data['user_name']);
    	$pass = Crypt::encrypt($data['user_pass']);

    	$users = new Users;

    	$users->user_name = $data['user_name'];
    	$users->user_pass = $pass;

    	 $user = $users->save();
    	 if($user){
    	 	return redirect('admin/login');
    	 }
    }

  

}
