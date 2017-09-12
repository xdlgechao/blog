<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
		<form action="/admin/docrypt" method="post">
			{{csrf_field()}}
			用户名<input type="text" name="user_name"><br><br>
			密码<input type="password" name="user_pass"><br><br>
			<input type="submit" value="提交">
		</form>
</body>
</html>