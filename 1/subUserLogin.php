<!doctype html>
<?php
$name = @$_GET['name'];
$password = @$_GET['w'];
$type = @$_GET['tag'];
$gameNo=@$_GET['gameNo'];
$courseNo = @$_GET['courseNo'];
?>
<html>
<head>
<meta charset="utf-8">
<script src="sdk/jquery-1.11.1.js"></script>
<script src="sdk/strophe.js"></script>
<script src="sdk/json2.js"></script>
<script src="sdk/easemob.im-1.0.7.js"></script>
<script src="easemob.im.config.js"></script>
<script src="bootstrap.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]>
<script src="sdk/jplayer/jquery.jplayer.min.js"></script>
<script src="sdk/swfupload/swfupload.js"></script>
<![endif]-->
<style type="text/css">
.circle {
	width: 100px;
	height: 100px;
	color: #fff;
	background-color: #06CB45;
	border-radius: 100px;
	border-color: #F3FB67;
	padding: 8px;
	text-align: center;
	line-height: 40px;
	margin-left: 50px;
	margin-right: 50px;
	border-style: outset;
	cursor: pointer;
	line-height: 40px;
}
</style>
</head>
<body onload="init()">
	<div class="topBar">
		<h2>选手信息</h2>
	</div>
	<div
		style="margin-left: auto; margin-right: auto; margin-top: 50px; width: 80%; text-align: center;">
		<input style="width: 300px; font-size: 50px; text-align: center;"
			class="countTime" type="submit" value="00:00:00" /><input
			class="inputScore" id="score" placeholder="打分处" oninput="verify()" />
	</div>
	<div
		style="margin-left: auto; margin-right: auto; width: 80%; text-align: center;">
		<button onclick="submitScore()" class="circle" type="button" style="font-size: 30px">提交打分</button>
	</div>

</body>
<script>
	var user;
	var pass;
	var gameNo;
	var courseNo;
	var curUserId = null;
    var curChatUserId = null;
    var conn = null;
    var roomid=null;

    function submitScore()
	{
		var s = verify();
		if(s = false)
		{
			alert('未打分');
			return;
		}
		var msg = 'A'+gameNo+','+courseNo+','+s;
		sendText(msg, roomid);
		alert(msg);		               
	}

    
	var init = function()
	{
		user = '<?php echo $name;?>';
        pass = '<?php echo $password;?>';
        gameNo='<?php echo $gameNo;?>';
        courseNo='<?php echo $courseNo;?>';
      	if (user == '' || pass == '') {
      		alert("密码或用户名出错，返回前一页！");
            window.history.back();
           return;
      	}else{
			conn = new Easemob.im.Connection();
			conn.init({
			    https : true,//非必填，url值未设置时有效，优先采用url配置的参数。默认采用http连接，地址为‘http://im-api.easemob.com/http-bind/’，启用https时传递此值，地址为：‘https://im-api.easemob.com/http-bind/’
			    url : 'http://im-api.easemob.com/http-bind/',//非必填，默认聊天服务器地址，
			    onOpened : function() {
			        curUserId = conn.context.userId;
			        //查询好友列表
			        conn.getRoster(function(){});
				      //获取当前登录人的群组列表
	                conn.listRooms({
	                    success : function(rooms) {
	                        if (rooms && rooms.length > 0) {
	                            if (curChatUserId == null) {
	                                    roomid=rooms[0].roomId;
	                                    alert(roomid);
	                            }
	                        }
	                        conn.setPresence();//设置用户上线状态，必须调用
	                    },
	                    error : function(e) {
		                    alert('链接出现异常请重新刷新！');
	                    }
	                });
			    	conn.setPresence();
			    	//启动心跳
		            if (conn.isOpened()) {
		                conn.heartBeat(conn);
		            }
			    },
			    onClosed : function() {
			        //处理登出事件
			    	conn.clear();
					conn.onClosed();
			    },
			    onTextMessage : function(message) {
			        handleTextMessage(message);
			    },
			    onError : function(e) {
			        //异常处理
			        alert(e.msg);
			    }
			});

			login();
		}
	}

	var sendText = function(msg,to)
	{
		var options={
			to:to,
			masg:msg,
			type:'groupchat'
		}
		conn.sendTextMessage(options);
	}
	var handleTextMessage = function(message)
	{
		/**处理文本消息，消息格式为：
        {	type :'chat',//群聊为“groupchat”
            from : from,
            to : too,
            data : { "type":"txt",
                "msg":"hello from test2"
            }
        }
    	*/
    	console.log(message);
    	var from = message.from;//发送者
    	var type = message.type;//类型
    	var data = message.data;//消息体
    	if(type=='groupchat')
    	{
        	alert('groupchat');
    	}else{
    		alert('chat');
    	}
	
	}
	var login = function() {
            //根据用户名密码登录系统
            conn.open({
                user : user,
                pwd : pass,
                appKey:'dooze#onlinejudge'
            });         
        return true;
    };

    
    
    function verify()
	{
		var str =document.getElementById('score').value;
		if(str.length>3)
		{
			alert('有效的分数是小于等于10的 整数或者一位小数. 例如 9 ，9.8！');
			return false;
		}
		var s = Number(str).toFixed(1);
		if('NaN'==s)
		{
			alert('有效的分数是小于等于10的 整数或者一位小数！');
			return false;
		}else if(s>10 || s<= 0)
		{
			alert('有效的分数是小于等于10的 整数或者一位小数！');
			return false;
		}else
		{
			return s;
		}
	}
	
</script>

</html>
