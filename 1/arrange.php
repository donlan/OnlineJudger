<!DOCTYPE html>
<?php
$name = @$_GET['username'];
$entry = @$_GET['id'];
$TAG = false;
if (strlen($name) == 0 || strlen($entry) == 0) {
	die('<h1 align="center">请重新登录 ！！！</h1>');
}
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>
			编排组
		</title>
		<script type="text/javascript" src="js/bmob-min.js">
		</script>
		<script type="text/javascript" src="js/Bmob.Config.js">
		</script>
		<script src="sdk/jquery-1.11.1.js">
		</script>
		<script type="text/javascript" src="js/tableExport.js">
		</script>
		<script type="text/javascript" src="js/jquery.base64.js">
		</script>
		<script type="text/javascript" src="dtGrid/dependents/bootstrap/js/bootstrap.min.js">
		</script>
		<link rel="stylesheet" type="text/css" href="dtGrid/dependents/bootstrap/css/bootstrap.min.css" />
		<!--[if lt IE 9]>
		<script src="dtGrid/dependents/bootstrap/plugins/ie/html5shiv.js"></script>
		<script src="dtGrid/dependents/bootstrap/plugins/ie/respond.js"></script>
		<![endif]-->
		<!--[if lt IE 8]>
		<script src="dtGrid/dependents/bootstrap/plugins/ie/json2.js"></script>
		<![endif]-->
		<!-- font-awesome -->
		<script type="text/javascript" src="js/pageQuery.js" ></script>
		<link rel="stylesheet" type="text/css" href="dtGrid/dependents/fontAwesome/css/font-awesome.min.css" media="all" />
		<!-- dtGrid -->
		<script type="text/javascript" src="dtGrid/jquery.dtGrid.js">
		</script>
		<script type="text/javascript" src="dtGrid/i18n/zh-cn.js">
		</script>
		<link rel="stylesheet" type="text/css" href="dtGrid/jquery.dtGrid.css" />
		<script type="text/javascript" src="dtGrid/dependents/datePicker/WdatePicker.js" defer="defer">
		</script>
		<script type="text/javascript" src="js/underscore-min.js"></script>
		<script type="text/javascript" src="js/Backbone.js"></script>
		<script type="text/javascript" src="js/controller/dt_grid.js" ></script>
		<link rel="stylesheet" type="text/css" href="dtGrid/dependents/datePicker/skin/WdatePicker.css" />
		<link rel="stylesheet" type="text/css" href="dtGrid/dependents/datePicker/skin/default/datepicker.css" />
		<style type="text/css">button {
	background-color: #FF0000;
	color: #F5F5DC;
	border: none;
	width: 100%;
	height: 60px;
	font-size: x-large;
	border: none;
}

.tab{
	background-color:#FF7400;
}
.regBlock {
	font-size: large;
}

.regBlock td {
	text-align: left;
}

td {
	text-align: center;
}

.Th {
	text-align: center;
	color: #FFFAF0;
	background-color: forestgreen;
	padding: 8px;
}

#newRegisterUI {
	border-style: solid;
	border-width: 1dp;
	border-color: #F7ECB5;
	border-radius: 20px;
	background-color: #F5F5DC;
	margin: 20px auto;
	width: 50%;
	min-height: 350px;
	text-align: center;
}

.normalInput {
	font-size: large;
	height: 35px;
	min-width: 100px;
	border: solid #06CB45;
	border-width: 1px;
	padding-left: 10px;
	padding-right: 10px;
	background-color: #F8EFC0;
	margin-top: 20px;
	border-radius: 4px;
}

.import_rect {
	margin: 10px;
	float: right;
	padding: 30px;
	width: 300px;
	border-radius: 8px;
	border: gainsboro solid;
	border-width: 2px;
	background-color: whitesmoke;
}
#selectBtn{
	position: absolute;
	width: 119px;
	height: 27px;
	font-size: 20px;
	text-align: center;
	line-height: 40px;
}
#selectAddBtn{
	position: absolute;
	top: 220px;
	width: 119px;
	height: 27px;
	font-size: 20px;
	text-align: center;
	line-height: 40px;
}
#selectAddNoTeamBtn{
	position: absolute;
	top: 300px;
	height: 27px;
	font-size: 20px;
	text-align: center;
	line-height: 40px;
}
.rmReg {}

.rmRang {}

.rmAll {}</style>
	</head>
	<body onload="init()">
		<table align="center" width="100%" frame="void" cellspacing="0px"
		cellpadding="0px">
			<tr>
				<td>
					<button class="tab" id="newReg">
						新建报名
					</button>
				</td>
				<td>
					<button class="tab" id="regTable">
						报名表
					</button>
				</td>
				<td>
					<button class="tab" id="export">
						比赛选手信息
					</button>
				</td>
				<td>
					<button class="tab" id="improt_rank">
						导入编排表
					</button>
				</td>
			</tr>
		</table>
		
		<div id="importUI" class="import_rect" >
			<form name="uploadXml" action="importRang.php" method="post" enctype="multipart/form-data">
				<a id="selectBtn" href="javascript:void(0);" onclick="document.getElementById(&#39;input&#39;).click();">选择报名表</a>
				<input type="file" name="file" id="input" style="visibility: hidden;" onchange="appendText(this.files)"/>
				<input class="buttonStyle" id="s1" name="1" type="submit" id="A" style=" font-size: large;margin-top: 20px;" value="导入报名表">
			</form>
			<hr />
			<form name="playerAdd" action="importPlayer.php" method="post" enctype="multipart/form-data">
				<a id="selectAddBtn" href="javascript:void(0);" onclick="document.getElementById(&#39;inputAdd&#39;).click();">选择录入表</a>
				<input type="file" name="file" id="inputAdd" style="visibility: hidden;" onchange="appendText(this.files)"/>
				<input class="buttonStyle"  name="add" type="submit"  style=" font-size: large;margin-top: 20px;" value="添加报名表">
			</form>
			
			<form name="playerAddNoTeam" action="importPlayerNoTeam.php" method="post" enctype="multipart/form-data">
				<a id="selectAddNoTeamBtn" href="javascript:void(0);" onclick="document.getElementById(&#39;inputAddNoTeam&#39;).click();">选择录入表(无代表队ID)</a>
				<input type="file" name="file" id="inputAddNoTeam" style="visibility: hidden;" onchange="appendText(this.files)"/>
				<input class="buttonStyle"  name="addNoTeam" type="submit"  style=" font-size: large;margin-top: 40px;" value="添加报名表（无ID）">
			</form>
		</div>
		<div id="newRegisterUI">
			<span id="regClose" style="float: right;">
				<img src="images/close.png" />
			</span>
			<h2 align="center">
				添加新的报名信息
			</h2>
			<p align="center">
				添加新的报名信息只需要填写比赛名，确认添加后会生成报名链接，复制给报名单位即可！
			</p>
			<table align="center" class="regBlock">
				<tr>
					<td align="right">
						比赛的名称：
					</td>
					<td>
						<input style="min-width: 200px;" id="newRegName" class="normalInput" />
					</td>
				</tr>
				<tr>
					<td align="right">
						比赛的编号：
					</td>
					<td>
						<input style="min-width: 200px;"
						id="newRegNo" class="normalInput" />
					</td>
				</tr>
				<tr>
					<td align="right">
						比赛的描述信息：
					</td>
					<td>
						<textarea cols="10"style="min-width: 200px;min-height: 60px;" id="newRegDes" class="normalInput"></textarea>
					</td>
				</tr>
				<tr>
					<td align="right">
						每个场地裁判员的数量：
					</td>
					<td align="left">
						<input type="radio" name="judCount" value="3">
						3 &nbsp;
						<input type="radio" name="judCount" value="4">
						4 &nbsp;
						<input type="radio" name="judCount" value="5" checked="checked">
						5
					</td>
				</tr>
				<tr>
					<td colspan="2" align="center">
						<button id="regClick" class="buttonStyle"
						style="margin-top: 20px;  background-color: #F89406;">
							生成报名链接
						</button>
					</td>
				</tr>
				
				<p align="center" id="regLink"
						style="margin-top: 50px; font-size: x-large;">
				</p>
			</table>
		</div>
		<div id="regTabelUI">
			<span>
				<input style="min-width: 400px; margin: 10px;"
				id="queryRegInput" class="normalInput" placeholder="输入比赛号筛选指定报名表" />
				<button id="queryRegClick" class="normalInput"
				style="margin: 10px; width: 100px; background-color: #FF7400;">
					查看
				</button>
			</span>
			<div class="import_rect" style="float: left;" onclick="$(this).hide()">
				<ul>
					<li>输入需要查看的报名表的比赛编号，点击查看</li>
					<li>查询得到报名表后点击表格底部的导出按钮</li>
					<li>导出的表格中的ID ，比赛ID，代表队不允许修改</li>
					<li>一般只需要设置比赛编号，场地号即可</li>
					<li>表格在电脑用WPS 或者 Excel编辑好后，点击右上角导入编排表</li>
					<li style="font-size: large;">务必保证选手编号格式为：大写字母开头，后面跟上至少一个数字</li>
				</ul>
			</div>
			<h2 id="tableRegTittle" align="center">
			</h2>
			<div id="regToolBarContainer">
			</div>
			<div id="regContainer">
			</div>
		</div>
		<div id="exportUI">
			<button id="exportProjectTeamScore" style="background-color:#7F0055;width: 300px;">查看团体总分表(大类组别)</button>
			<div id="teamScoreUI">
				<span id="teamScoreClose" style="float: right;">
				<img src="images/close.png" />
				</span>
				<div id="teamScoreToolBarContainer"></div>			
				<div id="teamScoreContainer"></div>
			</div>
			<h2 id="tableAllTittle" align="center">
				比赛
			</h2>
			<input style="min-width: 200px; margin: 10px;" id="exportQueInput"
			class="normalInput" placeholder="输入比赛号筛选制定报名表" />
			<button id="exportQueClick" class="normalInput"
			style="margin: 10px; width: 100px; background-color: #EEA236;">
				查找
			</button>
			
			<span>
				<label style="font-size: large;margin-left: 80px;">将选中的选手的场地号修改为：</label>
				<input style="min-width: 200px; margin: 10px;"
				id="newCourseNoInput" class="normalInput" placeholder="新的场地号" />
				<button id="doReset" class="normalInput"
				style="margin: 10px; width: 100px; background-color:#008200;">
					修改
				</button>
			</span>
			<div id="allToolBarContainer">
			</div>
			<div id="allContainer" >
			</div>
		</div>
		<script>var username = null;
var userID = null;
var canXLS = false;
var regfirst = true;
var allfirst = true;
var judgeCount = 0;
var GAME=null;
var GAME_NO =null;
var gameChange =-1;

$("#importUI").hide();
$("#regTable").removeClass('tab');
$("#A").click(function() {
	$("rangUserTable").remove();
	$("#regUserTable").hide(50);
});
$("#B").click(function() {});
$("#addGame").click(function() {
	close();
	$("td button").addClass('tab');
	$("#importUI").hide(100);
	$(this).removeClass('tab');
});
$("#newReg").click(function() {
	$("#newRegisterUI").show(200);
	$("#importUI").hide(100);
	$("td button").addClass('tab');
	$(this).removeClass('tab');
});
$("#regTable").click(function() {
	$("#exportUI").hide(200);
	$("#regTabelUI").show(200);
	$("#importUI").hide(100);
	$("td button").addClass('tab');
	$(this).removeClass('tab');
});

$("#improt_rank").click(function() {
	$("#exportUI").hide(200);
	$("#regTabelUI").hide(200);
	$("#importUI").show(100);
	$("td button").addClass('tab');
	$(this).removeClass('tab');
});
$("#export").click(function() {
	$("td button").addClass('tab');
	$(this).removeClass('tab');
	$("#regTabelUI").hide(200);
	$("#exportUI").show(200);
	$("#importUI").hide(100);
	if (canXLS)
		$("#exportXLS").show();
	else
		$("#exportXLS").hide();
});

$("#exportProjectTeamScore").click(function(){
	if(allDatas==null ||　allDatas.length<=0)
		{
			show('请先查询到所需要比赛的全部比赛成绩');
			return;
		}
		teamColumn[0].hide = false;
		if(gameChange!=0){
			getProjetTeamRank();
			if(!teamRankGrid){
				teamRankGrid = $.fn.DtGrid.init(teamScoreOption);
				teamRankGrid.load();
			}else{
				teamRankGrid.refresh(true);
			}
		}
			gameChange = 0;
	$("#teamScoreUI").show(200);
});

$("#exportTeamLevelScore").click(function(){
	if(allDatas==null ||　allDatas.length<=0)
		{
			show('请先查询到所需要比赛的全部比赛成绩');
			return;
		}
		teamColumn[0].hide = true;
		if(gameChange!=1){
			getTeamRank(allDatas);
			if(!teamRankGrid){
				teamRankGrid = $.fn.DtGrid.init(teamScoreOption);
				teamRankGrid.load();
			}else{
				teamRankGrid.refresh(true);
			}
		}
			gameChange = 1;
	$("#teamScoreUI").show(200);
});


$("#exportTeamFormerScore").click(function(){
	if(allDatas==null ||　allDatas.length<=0)
		{
			show('请先查询到所需要比赛的全部比赛成绩');
			return;
		}
		teamColumn[0].hide = true;
		if(gameChange!=2){
			filterTeamRank(filterByProjectFormer(allDatas)[1]);
			if(!teamRankGrid){
				teamRankGrid = $.fn.DtGrid.init(teamScoreOption);
				teamRankGrid.load();
			}else{
				teamRankGrid.refresh(true);
			}
		}
			gameChange =2;
	$("#teamScoreUI").show(200);
});


$("#exportTeamFullScore").click(function(){
	if(allDatas==null ||　allDatas.length<=0)
		{
			show('请先查询到所需要比赛的全部比赛成绩');
			return;
		}
		teamColumn[0].hide = true;
		if(gameChange!=3){
			filterTeamRank(filterByProject(allDatas)[1]);
			if(!teamRankGrid){
				teamRankGrid = $.fn.DtGrid.init(teamScoreOption);
				teamRankGrid.load();
			}else{
				teamRankGrid.refresh(true);
			}
		}
			gameChange =3;
	$("#teamScoreUI").show(200);
});
$("#regClose").click(function() {
	$("#newRegisterUI").hide(200);
	$("#newRegName").val("");
	$("#newRegNo").val("");
	$("#newRegDes").val("");
});
$("#teamScoreClose").click(function(){
	$("#teamScoreUI").hide(200);
});

var appendText = function(files){
	$("#importUI").append("导入的文件名 ："+files[0].name);
}
$("#regClick").click(function() {
	if ($("#newRegName").val() == "") {
		show("比赛名必须填写");
		return;
	}
	if ($("#newRegNo").val() == "") {
		show("比赛名必须填写");
		return;
	}
	
	var newGameID = null;
	var Game = Bmob.Object.extend("game1");
	var game = new Game();
	
	if(!Bmob.User.current()){
		show("登录失效请重新登录");
		window.location.href="onjudge.applinzi.com";
		return;
	}
	var noQuery = new Bmob.Query(Bmob.Object.extend('game1'));
	var nameQuery = new Bmob.Query(Bmob.Object.extend('game1'));
	noQuery.equalTo('no',$("#newRegNo").val());
	nameQuery.equalTo('name',$("#newRegName").val());
	var query = Bmob.Query.or(noQuery, nameQuery);
	query.find({
		success:function(res){
			if(res.length>0){
				show("此比赛号与比赛名已被注册报名！请更换！");
			}else{
				game.set("ower", Bmob.User.current());
				game.set("no", $("#newRegNo").val());
				game.set("name", $("#newRegName").val());
				game.set("des", $("#newRegDes").text());
				game.set("judgeCount", Number($(":checked").val()));
				game.save(null, {
					success: function(game) {
						newGameID = game.id;
						$("#regLink").text('http://onjudge.applinzi.com/enroll.html?id=' + newGameID);
					},
					error: function(game, e) {
						console.log(e);
						show("连接出错，请重新登录后再试"+e.message);
					}
				});
			}
		},
		error:function(e){
			show(e);
		}
	});
});
$("#queryRegClick").click(function() {
	//报名表查询
	GAME_NO = $("#queryRegInput").val();
	if (GAME_NO == "") {
		show("比赛号不能为空");
		return;
	}
	var query = new Bmob.Query(Bmob.Object.extend("game1"));
	query.equalTo("no", GAME_NO);
	query.find({
		success: function(res) {
			if (res.length <= 0) {
				show("找不到次比赛编号的比赛信息");
			} else {
				//查找对应的报名表
				$('#tableRegTittle').text(res[0].get('name'));
				var query = new Bmob.Query(Bmob.Object.extend("player1"));
				query.equalTo("game", res[0].id);
				query.equalTo("tag",0);
				
				_queryCount(query,query,initRegGrid);				
			}
		},
		error: function(e) {
			show("无法查询报名信息，稍后再试")
		}
	});
});

var initRegGrid= function(res){
	$("#regUserTable").show();
	$("#rangUserTable").hide();
	regDatas.length = 0;
	res.sort(BmobprojectLevelSortFunc);
	for (var i = 0; i < res.length; i++) {
		var user = new Object();
		user.seq = (i+1);
		user.id = res[i].id;
		user.no = '请设置';
		user.name = res[i].get("name");
		user.sex = res[i].get("sex");
		user.age = res[i].get("age");
		user.project = res[i].get("project");
		user.from = res[i].get("from");
		user.level = res[i].get("level");
		user.idCard = res[i].get("idCard");
		user.phone = res[i].get("phone");
		user.gameId = res[i].get('game').id;
		user.vipId = res[i].get('vip_id');
		var teamName = res[i].get('team').get('teamName');
		user.team = teamName ==undefined ? res[i].get('from'):teamName;;
		user.courseNo = '请设置';
		user.head = res[i].get('head');
		regDatas.push(user);
	}
	
	gameChange = -1;
	if (regfirst) {
		regGrid = $.fn.DtGrid.init(regOption);
		regGrid.load();
		regfirst = false;
	} else {
		regGrid.refresh(true);
	}
}
$("#exportQueClick").click(function() {
	GAME_NO = $("#exportQueInput").val();
	if (GAME_NO == "") {
		show("比赛号不能为空！");
		canXLS = false;
		return;
	}
	var query = new Bmob.Query(Bmob.Object.extend("game1"));
	query.equalTo("no", $("#exportQueInput").val().trim());
	query.find({
		success: function(res) {
			if (res.length <= 0) {
				show("找不到此比赛编号的比赛信息");
				canXLS = false;
			} else {
				$('#tableAllTittle').text(res[0].get('name'));
				judgeCount = res[0].get("judgeCount");
				for (var i = 1; i <= judgeCount; i++) {
				var col = {
					id: 'score' + i,
					title: '裁判员 ' + i,
					type: 'number',
					columnClass: 'table_column',
					headerClass: "table_header"
				};
				allColumns.push(col);
				}
				allColumns.push({
					id: 'score',
					title: '平均得分',
					type: 'number',
					columnClass: 'table_column',
					headerClass: "table_header",
					fastQuery: true,
					fastQueryType: 'eq',
					resolution:function(value, record, column, grid, dataNo, columnNo){
				        return Number(value).toFixed(2);
				    }
				});
				allColumns.push({
					id: 'alertScore',
					title: '加减分',
					type: 'string',
					columnClass: 'table_column',
					headerClass: "table_header",
					fastQuery: true,
					fastQueryType: 'eq',
					resolution:function(value, record, column, grid, dataNo, columnNo){
				        return Number(value).toFixed(2);
				    }
				});
				allColumns.push({
					id: 'endScore',
					title: '最后得分',
					type: 'number',
					columnClass: 'table_column',
					headerClass: "table_header",
					fastQuery: true,
					fastQueryType: 'eq',
					resolution:function(value, record, column, grid, dataNo, columnNo){
				        return Number(value).toFixed(2);
				    }
				});
				var game = res[0];
				var q = new Bmob.Query(Bmob.Object.extend("player1"));
				q.equalTo("game", game.id);
				q.notEqualTo("tag",0);
				q.descending("endScore");
				_queryCount(q,q,initGrid);
			}
		},
		error: function(e) {
			show("无法查询报名信息，稍后再试");
		}
	});
});


var initGrid = function(res){
	convertSort(res);
	gameChange = -1;
	if (allfirst) {
		allGrid = $.fn.DtGrid.init(allOption);
		allGrid.load();
		allfirst = false;
	} else {
		allGrid.refresh(true);
	}
}
var selectDatas = null;
var data=[];
$("#doReset").click(function(){
	var no = $("#newCourseNoInput").val().trim();
	if(no==""){
		show("请先输入需要修改成的场地号");
		return ;
	}
	if(allGrid==null || allDatas.length==0)
	{
		show("请先查找出需要的比赛选手信息");
		return ;
	}
	selectDatas = allGrid.getCheckedRecords();
	if(selectDatas==null || selectDatas.length==0){
		show("请先选中需要修改的选手信息");
		return ;
	}
	
	for(var i =0,s = selectDatas.length;i<s;i++){
		data[selectDatas[i].id] = selectDatas[i];
	}
	
	for(var i =0,s = selectDatas.length;i<s;i++){
		var query = new Bmob.Query(Bmob.Object.extend("player1"));
		query.get(selectDatas[i].id,{
			success:function(res){
				res.set("courseNo",no);
				data[res.id].courseNo = no;
				res.save();
			},
			error:function(o,e){
				show("与服务器通讯失败！");
			}
		});
	}
	show("修改完毕",undefined,1000);
	allGrid.reload(true);
});




var show =function(text,okText,time){
	var w = $(window).width()/2-120;
	$("#toast").remove();
	if(okText==undefined)
		okText ="确定";
	$("body").append('<div id="toast" style="background-color: #fff;position: fixed;top:0px;left:'+w+'px;margin:auto auto; z-index: 1000;min-height: 100px;min-width: 160px;font-size: large;border: solid floralwhite; border-width: 1px;border-radius: 4px;"><p id="text" align="center" style=" margin: 80px 80px;"></p><p id="ok" style="margin:0 0;padding:0 0;line-height: 40px;bottom: 0px; height: 40px;font-size: large;color: #fff;background-color: #008200;" align="center">'+okText+'</p></div>');
	$("#text").text(text);
	$("#toast").click(function(){
		$(this).remove();
	});
	if(time!=undefined){
		setTimeout(function(){
			$("#toast").remove();
		},time);
	}
}



var init = function() {
	$("#newRegisterUI").hide();
	$("#exportUI").hide(200);
	$("#regTabelUI").show(200);
	$("#regUserTable").show();
	$("#rangUserTable").hide();
	$("#teamScoreUI").hide();
	BmobInit();
	GAME_NO = getUrlKey('gameNo');
}</script>
	</body>
</html>
