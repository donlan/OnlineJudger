<! doctype html>
<?php 
$name = @$_GET['name'];
$ower= @$_GET['id'];
$password = @$_GET['w'];

if(strlen($name)<=0 || strlen($password)<=0)
{
	die('<h1 align="center">请重新登录</h1>');
}
?>
<html>
<head>
<meta charset="utf-8">
<script src="sdk/jquery-1.11.1.js"></script>
<script src="sdk/strophe.js"></script>
<script src="sdk/json2.js"></script>
<script src="sdk/easemob.im-1.1.js"></script>
<script src="sdk/easemob.im-1.1.shim.js"></script>
<script src="easemob.im.config.js"></script>
<script src="bootstrap.js"></script>
<script type="text/javascript" src="js/bmob-min.js"></script>
<script type="text/javascript" src="js/Bmob.Config.js"></script>
<link href="css/style.css" rel="stylesheet" type="text/css">
<!--[if lte IE 9]>
<script src="sdk/jplayer/jquery.jplayer.min.js"></script>
<script src="sdk/swfupload/swfupload.js"></script>
<![endif]-->
<style type="text/css">
td {
	text-align: center;
	background-color: #FFFAF0;
	padding: 12px;
	margin:20px;
	border-style: solid;
	border-width: 5px;
	border-color: #F0AD4E;
	width: 48%;
	height: 48%;
	color: #F90000;
	border-style: solid;
}

h1 {
	text-align: center;
}

h2 {
	text-align: center;
	font-size: 80px;
}
.big {
	font-weight: 600;
	color: #F90000;
	text-align: center;
	font-size: 80px;
}
h3 {
	text-align: center;
	font-size: 30px;
}
</style>
</head>
<body>   

<div id="screen">
			<h2 style="color:cadetblue" id="gameInfo"></h2>
			<table id="screenTable" width="100%" frame="void" cellspacing="20px">

			</table>
</div>

<script type="text/javascript">
	
			
			var gameNo = null;
			var ower = null;
			var user;
			var pass;
			var gameNo = null;
			var gameID = null;
			var curUserId = null;
			var conn = null;
			var roomid = null;
			var players = [];
			var judgeCount = 0;

			var initGame = function() {
				var query = new Bmob.Query(Bmob.Object.extend('game1'));
				query.equalTo('no', gameNo);
				query.equalTo('ower', ower);
				query.find({
					success: function(res) {
						if(res.length<=0)
						{
							alert("沒有此比賽的信息,請從新刷新");
							return;
						}
						gameID = res[0].id;
						judgeCount = res[0].get("judgeCount");
						$("#gameInfo").text(res[0].get("name"));
						initScreen(gameID);
					},
					error: function(e) {
						alert("初始化比赛信息失败，请重新刷新！");
						return null;
					}
				});
			};
				

			var freshScreen = function(v) {
			var no = v.courseNo;
			var score = v.score.split(",");
			var p = Number(score[judgeCount + 1] - score[judgeCount]).toFixed(2);
			var extra = '';
			if (p >= 0) {
				extra = '应得分：' + score[judgeCount] + ' 裁判长加小分：' + p;
			} else {
				extra = '应得分：' + score[judgeCount] + ' 裁判长减小分：' + p;
			}
			var scoreInfo='';
			for(var i = 0;i<judgeCount;i++)
			{
				scoreInfo+=' 裁判员 '+(i+1)+'：'+score[i];
			}
			$("#judgerScore"+no).text(scoreInfo);
			$("#score" + no).text(score[judgeCount + 1]);
			$("#extraScore" + no).text(extra);
			$("#info" + no).text("●姓名：" + v.name + ' ●项目：' + v.project + ' ●组别：' + v.level + ' ●单位：' + v.from);
			};
			
			var handleTextMessage = function(message) {
				var from = message.from; //发送者
				var type = message.type; //类型
				var data = message.data; //消息体
				if (type == 'groupchat') {
					try{
						var v = jQuery.parseJSON(data);
							if(v.gameNo==gameNo)
							{
							switch (v.cmd) {
								case CMD.SendScreen:
									freshScreen(v);
									break;
										  }
							}
					}
					catch(SyntaxError){
						console.log(SyntaxError);
					}
				}
			
			}


			var index = 0;
			var initScreen = function(id) {
				if (id == null) {
					alert('这个比赛没有选手！！！');
					return;
				}
				var query = new Bmob.Query(Bmob.Object.extend('player1'));
				query.equalTo('game', id);
				query.find({
					success: function(res) {
						if (res.length <= 0) {
							alert('没有场地信息');
							return;
						}
						//players = res;
						var course = [];
						for (var i = 0; i < res.length; i++) {
							players[res[i].id]=res[i];
							course[res[i].get('courseNo')] = res[i].get('courseNo');
						}
						
						
						var index = 0;
						for (var i in course) {
							index++;
							$("#screenTable").append('<tr id="c' + index + '"></tr>');
							var no = i;
							$("#c" + index).append('<td class="screen" id="cin' + no + '"></td>');
							$("#cin" + no).append('<h1>场地 ' + no + ' </h1><h3 id="info' + no + '"></h3><span class="big" >最后得分：</span><span class="big" id="score' + no + '">无</span><h1 id="extraScore' + no + '"></h1>');
							$("#cin" + no).append('<h3 id="judgerScore'+no+'"></h3>');
						}
					},
					error: function(e) {
						alert('获取比赛选手信息失败！');
					}
				});
			};

			
    </script>
    
    <script type="text/javascript" src="js/im_base.js" ></script>
    </body>
</html>