<?php
$judgeNum = @$_POST['judgeNum'];
$name = 'judge1';
$password = '123';
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>裁判员</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script src="sdk/jquery-1.11.1.js"></script>
<script src="sdk/strophe.js"></script>
<script src="sdk/json2.js"></script>
<script src="sdk/easemob.im-1.0.7.js"></script>
<script src="easemob.im.config.js"></script>
<script src="bootstrap.js"></script>
<!--[if lte IE 9]>
<script src="sdk/jplayer/jquery.jplayer.min.js"></script>
<script src="sdk/swfupload/swfupload.js"></script>
<![endif]-->
</head>
<body onload="init()">
	<div class="topBar">
		<h2>编号：0003 姓名：张宇 项目：武术 单位：中北大学</h2>
	</div>
	<div
		style="margin-left: auto; margin-right: auto; margin-top: 50px; width: 80%; text-align: center;">
		<input class="countTime" type="submit" value="00:00:00" /><input
			class="inputScore" id="score" placeholder="打分处" oninput="verify()" />
	</div>
	<div
		style="margin-left: auto; margin-right: auto; width: 80%; text-align: center;">
		<button class="circle" type="button" onClick="submitScore()">提交打分</button>
	</div>
	<input type="hidden" name="judgeNum" value="<?php echo $judgeNum?>" />



	<script>
   



    	var user;
		var pass;
		var gameNo;
		var courseNo;
		var curUserId = null;
	    var curChatUserId = null;
	    var conn = null;
	    var roomid=null;
	    var count=0;
	    var index=0;

	    var submitScore = function(){
	    	 var d = new Date();
	    	 var text = '{"name":"doo","age":21}';                       
		     sendText(conn,text,roomid);
	    }

	    
	    
	    var init = function()
		{
			user = '<?php echo $name;?>';
	        pass = '<?php echo $password;?>';
// 	      	if (user == '' || pass == '') {
// 	      		alert("密码或用户名出错，返回前一页！");
// 	            window.history.back();
// 	           return;
// 	      	}
// 	      	if (gameNo == '' || courseNo == '') {
// 	      		alert("比赛编号或比赛场地号为空，返回前一页！");
// 	            window.history.back();
// 	           return;
// 	      	}
	        	handleConfig();
				conn = new Easemob.im.Connection();
				conn.init({
					https :Easemob.im.config.https,
				    url : Easemob.im.config.xmppURL,
				    onOpened : function() {
				        curUserId = conn.context.userId;
				        conn.getRoster(function(){});
		                conn.listRooms({
		                    success : function(rooms) {
		                        if (rooms && rooms.length > 0) {
			                        console.log(rooms);
		                            roomid=rooms[0].roomId;
									
		                        }
		                        
		                    },
		                    error : function(e) {
			                    alert('链接出现异常请重新刷新！');
		                    }
		                });
				    	conn.setPresence();
			            if (conn.isOpened()) {
			                conn.heartBeat(conn);
			            }
				    },
				    onClosed : function() {
				    	conn.stopHeartBeat(conn);
				    	conn.clear();
						conn.onClosed();
				    },
				    onTextMessage : function(message) {
				        handleTextMessage(message);
				    },
				    onError : function(e) {
				    	handleError(conn,e.msg);
				    }
				});

				login(user,pass);
		}

		
		var handleTextMessage = function(message)
		{
			
	    	
	    	var from = message.from;//发送者
	    	var type = message.type;//类型
	    	var data = message.data;//消息体
	    	if(type=='groupchat')
	    	{
		    	console.log('Receive: ');
	    		console.log(message);
	    		var v = jQuery.parseJSON(data);
	        	alert(v.name+v.age);
	    	}
		
		}

		
		
            
    </script>
</body>
</html>
