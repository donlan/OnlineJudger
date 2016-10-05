<!DOCTYPE html>
<?php
$username = @$_GET['username'];
$id = @$_GET['id'];

?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>系统管理</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<script type="text/javascript" src="js/jquery.min.js">
		</script>
		<link rel="stylesheet" href="css/bsgrid.all.min.css"/>
		<script type="text/javascript" src="js/grid.zh-CN.min.js">
		</script>
		<script type="text/javascript" src="js/bsgrid.all.min.js">
		</script>
		<script src="js/bmob-min.js">
		</script>
		<script src="js/Bmob.Config.js">
		</script>
		<style>
		body {
	font-family: "楷体", "黑体", "方正舒体", "方正兰亭超细黑简体", "方正等线", "微软雅黑", "新宋体", "隶书";
	font-size: 24px;
	background: "images/bg600.jpg";
	background-repeat: initial;
	margin: 0px;
	padding: 0px;
}

.bar {
	color: #FFFFFF;
	margin-left: auto;
	margin-right: auto;
}

.tab {
	width: 80%;
	margin-left: auto;
	margin-right: auto;
}

td {
	text-align: center;
	vertical-align: middle;
	height: 60px;
}

th {
	background-color: #FF8040;
	color: #FFFFFF;
}

a {
	text-decoration: none;
}</style>
	</head>
	<body onload="init()" background="images/bg600.jpg">
		<table id="bar" class="bar" frame="void" cellspacing="40px" width="80%"
		height="100px">
			<tr>
				<td bgcolor="#FF2B44" id="btnGame">
					我创建的比赛
				</td>
				<td bgcolor="#51A351" id="btnUser">
					我管理的用户
				</td>
				<td bgcolor="#D824B8" onclick="creditShow()">
					我的用户额度
				</td>
				<td bgcolor="#53DD25" onclick="upgradeCredit()">
					升级用户额度
				</td>
				
			</tr>
		</table>
		
		<div id="gameList">
			<table id="gameTable">
				<tr>
					<th w_index="ID">ID</th>
					<th w_index="no">编号</th>
					<th w_index="name">比赛名</th>
					<th w_index="des">描述信息</th>
					<th w_index="judgeCount">单场地裁判员数量</th>
					<th w_index="time">创建时间</th>
					<th w_render="operate">操作</th>
				</tr>
			</table>
		</div>
		<div id="userList">
				<table id="userTable">
					<tr>
						<th w_index="ID">账户ID</th>
						<th w_index="name">姓名</th>
						<th w_index="pwd">密码</th>
						<th w_index="type">类型</th>
						<th w_index="time">创建时间</th>
					</tr>
				</table>			
		</div>
		<script>
var index=0;
var ID=null;
var gameTag= false;
var userTag =false;
var USER = null;
var UserData = new Array();
var GameData = new Array();
var gameObj;
var userObj;


var init = function()
{
BmobInit();
ID = "<?php echo $id;?>";
initUser();
$('#userList').hide();
}

$("#btnGame").click(function(){
$('#gameList').show();
$('#userList').hide();	
});
$("#btnUser").click(function(){
	$('#gameList').hide();
	$('#userList').show();
});

var initGameList = function(){
	if(!USER)
	initUser();
	if(!gameTag){
		var query = new Bmob.Query(Bmob.Object.extend('game1'));
		query.equalTo('ower',USER);
		query.find({success:function(res){
			if(res.length<=0)
				alert("没有建立比赛");
			else{
				for(var i =0,l = res.length;i<l;i++){
					var g = new Object();
					g.ID = res[i].id;
					g.no = res[i].get('no');
					g.name = res[i].get('name');
					g.des = res[i].get('des');
					g.judgeCount = res[i].get('judgeCount');
					g.time = res[i].createdAt;
					GameData.push(g);
				}
				gameObj = $.fn.bsgrid.init('gameTable', {
				dataType:'json',
                localData:GameData,
                pageSizeSelect: true,
                pageSize: 10,
                displayBlankRows:false,
                stripeRows:true
            });
				gameTag = true;
			}
		},
		error:function(e){
			alert(e);
		}
		});
		
	}
	
}

var deleteGame = function(gameId){
	var tag = confirm("你确定删除该比赛的所有信息吗？包括该比赛下的所有选手的信息！");
	if(tag){
		var q = new Bmob.Query(Bmob.Object.extend('game1'));
		q.get(gameId,{
			success:function(res){
				var query = new Bmob.Query(Bmob.Object.extend('player1'));
				query.equalTo('game',res);
				query.destroyAll({
					success:function(){
						res.destroy({
							success:function(){
								alert("删除比赛成功");
							},
							error:function(e){
								alert(e.message);
							}
						});
						for(var i in GameData){
							if(GameData[i].ID == gameId){
								GameData.splice(i,1);
								gameObj.refreshPage();		
								break;
							}
						}
					},
					error:function(err){
						alert(err.message);
					}
				});
			},
			error:function(o,e){
				alert(e.message);
			}
		});
	}
}

function operate(record, rowIndex, colIndex, options) {
            return '<a href="#"  onclick="deleteGame(\''+record.ID + '\')">删除</a>';
        }

var initUserList = function(){
	if(!USER)
	initUser();
	if(!userTag){
		var query = new Bmob.Query(Bmob.Object.extend('subUser'));
		query.equalTo('ower',USER);
		query.find({success:function(res){
			if(res.length<=0)
			alert("没有建立子账户");
			else{
				for(var i =0,l = res.length;i<l;i++){
					var u = new Object();
					u.ID = res[i].id;
					u.name = res[i].get('name');
					u.pwd = res[i].get('password');
					u.type = getType(res[i].get('type'));
					u.time = res[i].createdAt;
					UserData.push(u);
				}
				gameObj = $.fn.bsgrid.init('userTable', {
				dataType:'json',
                localData:UserData,
                pageSizeSelect: true,
                pageSize: 10,
                displayBlankRows:false,
                stripeRows:true
            });
            userTag = true;
			}
		},
		error:function(e){}
		});
	}
	
}

var getType = function(type){
	if(type==1)
	return '总裁判长';
	if(type==2)
	return '副总裁判长';
	if(type==3)
	return '裁判长';
	if(type==4)
	return '裁判员';
	return '未知';
}

var initUser = function(){
	var query = new Bmob.Query(Bmob.Object.extend('_User'));
	query.get(ID,{
		success:function(user){
			USER = user;
			console.log(USER);
			initGameList();
			initUserList();
		},
		error:function(o,e){
			alert("获取登录用户信息失败，请重新登录");
		}
	});
	
}

var creditShow = function()
{
	var c = UserData.length;
	alert('已分配子账户 '+c+' 剩余 ：'+(100-c));
}
var upgradeCredit = function()
{
	alert('请联系 梁桂栋\n电话：18777552223 ');
}
</script>
	</body>
</html>
