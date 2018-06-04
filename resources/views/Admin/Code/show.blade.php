<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>验证码</h1>
	<!-- /code/store -->
	<form action="/code/store" method="post">
	{{ csrf_field() }}
		<img src="/code" onclick="rand(this)" title="点击切换验证码">
		<br><br>
		验证码：<input type="text" name="code" value="">
		<br><br>
		<input type="submit" value="提交">
	</form>
	<script type="text/javascript">
	function rand(obj){
		//为验证码加上随机数实现无刷新点击切换验证码
		obj.src = '/code?a='+Math.random();
	}
	</script>
</body>
</html>