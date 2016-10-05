<!DOCTYPE html>
<?php
$username = @$_GET['username'];
$id = @$_GET['id'];
$password = @$_GET['w'];
if (strlen($username) <= 0 && strlen($id) <= 0) {
    echo '登录失效！<br/>3秒后跳转到登录界面';
    echo "<meta http-equiv=\"Refresh\" content=\"3;url=index.php\">";
}
?>
<html>
<head>
<meta charset="UTF-8">
<title>主界面</title>
<script src="sdk/jquery-1.11.1.js"></script>
<script src="js/bmob-min.js"></script>
<script src="js/Bmob.Config.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<style>
table {
	margin-top: 40px;
	text-align: center;
	margin-left: auto;
	margin-right: auto;
	font-size: inherit;
}

.box {
	color: #ffffff;
	text-align: center;
	height: 200px;
	text-align: center;
	font-size:xx-large;
}
</style>
</head>
<body background="images/bg600.jpg" onclose="clear()" onload="hide(0)">
	<table id="mainUI" cellspacing="0px" frame="void" width="80%">
		<tr>
			<td  class="box" bgcolor="#00BE32" onclick="jump(1)">总裁判长</td>
			<td  class="box" bgcolor="#009E8E" onclick="jump(2)">副总裁判长</td>
			<td  class="box" bgcolor="#FFBC40" onclick="jump(3)">裁判长</td>
		</tr>
		<tr>
			<td   class="box" bgcolor="#2D56D7" onclick="jump(4)">裁判员</td>
			<td ></td>
			<td   class="box" bgcolor="#2DD767" onclick="jump(6)">大屏幕</td>
		</tr>
		<tr>
			<td   class="box" bgcolor="#FFBA35" onclick="jump(7)">系统设置</td>
			<td   class="box" bgcolor="#8EE530" onclick="jump(8)">编排组</td>
			<td   class="box" bgcolor="#FF4C35" onclick="jump(9)">退出登录</td>
		</tr>
	</table>
	<div id="loginUI" class="loginUI">
		<span
			style="float: right; background-color: #f3c; border-radius: 20px; color: #fff; font-size: 18px; padding-left: 8px; padding-right: 8px;"
			onclick="hide(0)">关闭</span>
		<h4 align="center" id='loginTittle'>裁判或者评委账号登陆</h4>
		<table>
			<tr>
				<td>用户名：</td>
				<td><input class="textInputStyle" type="text" name="username"
					id="username" placeholder="请输入用户名"></td>
			</tr>
			<tr>
				<td>密码：</td>
				<td><input class="textInputStyle" type="password" name="password"
					id="password" placeholder="请输入密码"></td>
			</tr>
			<tr>
				<td>比赛号：</td>
				<td><input class="textInputStyle" type="text" name="gameno"
					id="gameno" placeholder="请输入比赛号"></td>
			</tr>
			<tr id="courseUI">
				<td>场地号：</td>
				<td><input class="textInputStyle" type="text" name="courseno"
					id="courseno" placeholder="请输入场地号"></td>
			</tr>
			<tr id="seqUI">
				<td colspan="2">
				<span>裁判员座位序号：</span>
				<input type="radio" name="judgeNo" value="1" checked="checked">1
				<input type="radio" name="judgeNo" value="2">2
				<input type="radio" name="judgeNo" value="3">3
				<input type="radio" name="judgeNo" value="4">4
				<input type="radio" name="judgeNo" value="5">5
				</td>
			</tr>
			<tr>
				<td colspan="2"><input class="buttonStyle" type="submit" value="登录" id="login"></td>
			</tr>
		</table>
	</div>
	<p align="center">技术服务：电话：18777552223 QQ: 760625325</p>
	<script>
	var key;
	BmobInit();
	$(".box").hover(function(){
		$(this).animate({
			fontSize:'42px',
			opacity:"0.7",
			zIndex:'2',
			borderWidth:"10px"
		},"normal");
	},
	function(){
		$(this).animate({
			fontSize:'36px',
			opacity:"1",
			zIndex:'1',
			borderWidth:"0px"
		},"normal");
	});
    	var hide = function(tag)
    	{
        	if(tag==0)
        	{
        		$('#username').val('');
        		$('#password').val('');
        		$('#gameno').val('');
        		$('#courseno').val('');
        		$("#mainUI").show();
        		$("#loginUI").hide();
        	}else{
        		$("#loginUI").show();
        		$("#mainUI").hide();
        		//$('#login').click(null);
            	switch(tag)
            	{
            	case 1:
            		$('#loginTittle').text('总裁判长/仲裁登陆');
            		$("#seqUI").hide();
            		$('#courseUI').hide();
            		$('#login').click(function(){
                		login(1);
            		});
                	break;
            	case 2:
            		$('#loginTittle').text('副总裁判长登陆');
            		$("#seqUI").hide();
            		$('#courseUI').hide();
            		$('#login').click(function(){
                		login(2);
            		});
                	break;
            	case 3:
            		$('#loginTittle').text('裁判长登陆');
            		$("#seqUI").hide();
            		$('#courseUI').show();
            		$('#login').click(function(){
                		login(3);
            		});
                	break;
            	case 4:
            		$('#loginTittle').text('裁判员登陆');
            		$("#seqUI").show();
            		$('#courseUI').show();
            		$('#login').click(function(){
                		login(4);
            		});
                	break;
            	}
        	}
    	}
        function setCookie(c_name,value,expiredays)
			{
            var exdate=new Date()
            exdate.setDate(exdate.getDate()+expiredays)
            document.cookie=c_name+ "=" +escape(value)+
            ((expiredays==null) ? "" : ";expires="+exdate.toGMTString())
            }
			var clear= function()
			{
				setCookie('username', '', 0);
				setCookie('id', '', 0);
			}
			var login = function(no)
			{
				var name = $("#username").val();
				var pwd = $("#password").val();
				var gameNo = $("#gameno").val();
				var courseNo = $("#courseno").val();

				if(name.length=='' || pwd.length=='' ||gameNo=='' || (courseNo=='' && no >2))
				{
					alert('用户名，密码，比赛编号，场地号 不能为空！！');
					return;
				}
				var user = Bmob.Object.extend('subUser');
				var query = new Bmob.Query(user);
				query.equalTo('name',name);
				query.equalTo('password',pwd);
				query.find({
					success:function(res)
					{
						if(res.length<1)
						{
							alert('用户名或者密码错误！');
						}else
						{
							if(res[0].get('type')==no)
							{
								switch(no){
								case 1:
									document.location.href='endJudge.html?name='+name+'&w='+pwd+'&gameNo='+gameNo+'&id='+'<?php echo $id;?>';
									break;
								case 2:
									document.location.href='finalJudge.html?name='+name+'&w='+pwd+'&gameNo='+gameNo;
									break;
								case 3:
									document.location.href='mainJudge.html?name='+name+'&w='+pwd+'&gameNo='+gameNo+'&courseNo='+courseNo;
									break;
								case 4:
									index = $(":checked").val();
									document.location.href='judge.html?name='+name+'&w='+pwd+'&tag='+res[0].id+'&gameNo='+gameNo+'&courseNo='+courseNo+'&seq='+$(":checked").val();
									break;
								}			
							}else
							{
								alert('您登录的账号类型与您选择登录的类型不一致！');
							}
						}
					},
					error:function(e){
						alert('登录失败！！');
					}
					});
			}
			
			function jump(tag)
			{
				switch(tag)
				{
					case 1:
						hide(tag);
					break;
					case 2:
						hide(tag);
					break;
					case 3:
						hide(tag);
					break;
					case 4:
						hide(tag);
					break;
					case 6:
						window.location.href="screen.php?name=<?php echo $username;?>&id=<?php echo $id;?>&w=<?php echo $password;?>";
					break;
					case 7:
						var code = prompt("请输入管理员密码！",'');
						if(code==null)
						{
							alert("进入系统设置需要管理员密码！");return;
						}
						if(Bmob.User.current()){
							if(code == Bmob.User.current().get('admin')){
									window.location.href="usermanager.php?name=<?php echo $username;?>&id=<?php echo $id;?>";
								}
								else{
									alert('管理员密码不正确！');
								}
						}else{
							alert("登录失效。请重新登录");
							document.location.href='index.php';
						}
						
					break;
					case 8:
						var key = '<?php echo $id;?>';
						var code = prompt("请输入安全码！",'');
						if(code==null)
						{
							alert("进入编排组需要安全码！");return;
						}
						if(Bmob.User.current()){
							if(code == Bmob.User.current().get('key')){
									window.location.href="arrange.php?username=<?php echo $username;?>&id="+key;
								}
								else{
									alert('验证安全码不正确！');
								}
						}else{
							alert("登录失效。请重新登录");
							document.location.href='index.php';
						}
						
					break;
					case 9:
						var a = confirm('你确定要退出吗？');
						if(a)
						{
							clear();
							if(Bmob.User.current()){
							Bmob.User.logOut();	
							}
							document.location.href='index.php';
						}
					break;
					
				}
			}
		</script>
</body>
</html>
