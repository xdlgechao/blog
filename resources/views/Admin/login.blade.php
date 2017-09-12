<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/admins/style/css/ch-ui.admin.css">
	<link rel="stylesheet" href="/admins/style/font/css/font-awesome.min.css">
	<title>{{$title}}</title>
</head>
<body style="background:#F3F3F4;">
	<div class="login_box">
		<h1>Blog</h1>
		<h2>欢迎使用博客管理平台</h2>
		<div class="form">
			@if(session('msg'))
			<p style="color:red">{{session('msg')}}</p>
			@endif
			<form action="/admin/dologin" method="post">
				{{csrf_field()}}
				<ul>
					<li>
					<input type="text" name="username" class="text" placeholder="请输入用户名"/>
						<span><i class="fa fa-user"></i></span>
					</li>
					<li>
						<input type="password" name="password" class="text"  placeholder="请输入密码"/>
						<span><i class="fa fa-lock"></i></span>
					</li>
					<li>
						<input type="text" class="code" name="code"/>
						<span><i class="fa fa-check-square-o"></i></span>
						<!-- 防止浏览器兼容问题 -->
						<!-- <img src="{{url('admin/code')}}" alt="" onclick="this.src='{{url('/admin/code')}}?'+Math.random()"> -->
						<img src="{{url('/admin/yzm')}}" onclick="this.src='{{url('/admin/yzm')}}'" alt="">
					</li>
					<li>
						<input type="submit" value="立即登陆"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by</p>
		</div>
	</div>
</body>
</html>