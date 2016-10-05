<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>登录</title>
<script src="sdk/jquery-1.11.1.js"></script>
<script src="js/bmob-min.js"></script>
<script src="js/Bmob.Config.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
	<style>
		body{
			background-repeat: no-repeat;
			background-image: url(images/bg600.jpg);
		}
	</style>
</head>
<body  onload="init()" onunload="queit()">
	<h1 id="topInfo" align="center"></h1>
		<table class="login">
			<tr>
				<td>用户名：</td>
				<td><input id="name" class="textInputStyle" type="text" name="username"
					placeholder="请输入用户名"></td>
			</tr>
			<tr>
				<td>密&nbsp;码：</td>
				<td><input id="pwd" class="textInputStyle" type="password" name="password"
					placeholder="请输入密码"></td>
			</tr>
			<tr>
				<td colspan="2"><input id="login" class="buttonStyle" type="submit" value="登录">
				</td>
			</tr>
		</table>
	<script type="text/javascript">
		BmobInit();
		var init = function(){
				if(Bmob.User.current()){

				}else{
					$("#topInfo").text("请登录！");
				}
		};

		var queit = function(){
				// if(Bmob.User.current()){
				// 	Bmob.User.logOut();	
				// }
		};

		var login = function(){
			Bmob.User.logIn($("#name").val(), $("#pwd").val(), {
		 	success: function(user) {
			    window.location.href="main.php?username="+$("#name").val()+"&id="+user.id+"&w="+$("#pwd").val();
			  },
			  error: function(user, error) {
			   alert("登录失败！");
			  }
			});
		};
		$("#login").click(function(){
			login();
		});

		$(document).keyup(function(event) {
		    if (event.keyCode == "13") {
		       login();
		    }
		});    
	</script>
</body>
</html>

