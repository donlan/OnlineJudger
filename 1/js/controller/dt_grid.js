var Team_Score =new Array(7,5,4,3,2,1);

var regGrid = null;
var allGrid = null;
var resetGrid = null;
var teamRankGrid = null;
var gameChange = false;
var resetCourseDatas = new Array();
var regDatas = new Array();
var allDatas = new Array();
var teamScoreDatas = new Array();
var tempData = [];
var pData = [];
//团体总分的表单项


var teamColumn=[
{id: 'projectName',
	title: '项目名',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	hide: true,
	resolution:function(value, record, column, grid, dataNo, columnNo){
	           return '<p style="background:#FF6C3B;padding:6px 10px;color:white;">'+value+'</p>';
	    }
}, 
{
	id: 'rank',
	title: '名次',
	type: 'number',
	columnClass: 'table_column',
	headerClass: "table_header",
	hide: false,
	resolution:function(value, record, column, grid, dataNo, columnNo){
	        if(record.totalScore==0){
	        	return '0';
	        }
	        
	        if(value<=3){
	            return '<span style="background:#FF6C3B;padding:2px 10px;color:white;">'+value+'</span>';
	        }else{
	        	return value;
	        }
	    }
}, 
{
	id: 'from',
	title: '单位',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	hide: false
}, 
{
	id: 'count',
	title: '参赛人数',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: false,
	hide: false
}, 
{
	id: 'totalScore',
	title: '总分',
	type: 'number',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: false,
	hide: false
},
];

var teamScoreOption = {
	lang: 'zh-cn',
	ajaxLoad: false,
	exportFileName: '比赛报名表',
	datas: teamScoreDatas,
	columns: teamColumn,
	gridContainer: 'teamScoreContainer',
	toolbarContainer: 'teamScoreToolBarContainer',
	tools: 'refresh|faseQuery|advanceQuery|export[excel,csv,pdf,txt]|print',
	pageSize: 1000,
	pageSizeLimit: [10, 20, 50,100,200,500,1000]
};


//比赛选手注册的表单数据项

var regColumns = [
{
	id: 'seq',
	title: '报名次序',
	type: 'number',
	columnClass: 'table_column',
	headerClass: "table_header",
	hide: false,
	resolution:function(value, record, column, grid, dataNo, columnNo){
	        var content = '';
	        if(dataNo<=2){
	            content += '<span style="background:#FF6C3B;padding:2px 10px;color:white;">'+(dataNo+1)+'</span>';
	        }else{
	        	content+=(dataNo+1);
	        }
	        return content;
	    }
},
{
	id: 'id',
	title: '报名ID',
	type: 'text',
	columnClass: 'table_column',
	headerClass: "table_header"
}, {
	id: 'no',
	title: '编号',
	type: 'number',
	columnClass: 'table_column',
	headerClass: "table_header"
}, {
	id: 'name',
	title: '姓名',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}, {
	id: 'age',
	title: '年龄',
	type: 'number',
	columnClass: 'table_column',
	headerClass: "table_header"
}, {
	id: 'sex',
	title: '性别',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}, {
	id: 'project',
	title: '项目',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}, {
	id: 'level',
	title: '组别',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}, {
	id: 'from',
	title: '单位',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
},{
	id: 'team',
	title: '代表队',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}, {
	id: 'phone',
	title: '电话',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header"
}, {
	id: 'idCard',
	title: '身份证',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
},{
	id: 'vipId',
	title: '武协号',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
},
 {
	id: 'courseNo',
	title: '场地编号',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQueryType: 'lk'
},
{
	id: 'gameId',
	title: '比赛ID',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
},
{
	id: 'head',
	title: '选手头像',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	resolution:function(value, record, column, grid, dataNo, columnNo){
	        var content = '';
	        if(value==''){
	            content += '<img src="/images/close.png" style="width:80px;height:80px;"/>';
	        }else{
	        	content += '<img src="'+value+'" style="width:80px;height:80px;"/>';
	        }
	        return content;
	    }
}];
var updatePlayer = function(no){
	Tip(regDatas[no].name);
}
var deletePlayer = function(record,dataNo){
	var f = confirm("你确定删除 "+record.name+" ID:("+record.id+") 的报名信息信息？");
							if(f){
								var query = new Bmob.Query(Bmob.Object.extend('player1'));
								query.get(record.id,{success:function(player){
									player.destroy({
									  success: function(player) {
									  	Notifier.notify("已删除");
									  	delete regDatas[dataNo];
									  },
									  error: function(player, error) {
									  	Notifier.notify("删除失败");
									  }
									});
								},error:function(object, error){
									Notifier.notify("删除失败");
								}});
							}
}

// 报名表的配置
var regOption = {
	lang: 'zh-cn',
	ajaxLoad: false,
	exportFileName: '比赛报名表',
	datas: regDatas,
	columns: regColumns,
	gridContainer: 'regContainer',
	toolbarContainer: 'regToolBarContainer',
	tools: 'refresh|faseQuery|advanceQuery|export[excel,csv,pdf,txt]|print',
	onRowDblClick : function(value, record, column, grid, dataNo, columnNo, cell, row, extraCell, e){
							
					   },
	pageSize: 1000,
	pageSizeLimit: [10,50,100,200, 500,1000,2000]
	};


//所有选手的表单项
var allColumns = [{
	id: 'id',
	title: 'ID',
	type: 'number',
	columnClass: 'table_column',
	headerClass: "table_header",
	hide: true
}, {
	id: 'rank',
	title: '排名',
	type: 'number',
	columnClass: 'table_column',
	headerClass: "table_header",
	resolution:function(value, record, column, grid, dataNo, columnNo){
	        var content = '';
	        if(value==1){
	            content += '<span style="background:#FF6C3B;padding:2px 10px;color:white;">'+value+'</span>';
	        }else{
	        	content+=value;
	        }
	        return content;
	    }
}, {
	id: 'name',
	title: '姓名',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}, {
	id: 'age',
	title: '编号',
	type: 'number',
	columnClass: 'table_column',
	headerClass: "table_header"
}, {
	id: 'courseNo',
	title: '场地号',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}, {
	id: 'sex',
	title: '性别',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header"
}, {
	id: 'project',
	title: '项目',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}, {
	id: 'level',
	title: '组别',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}, {
	id: 'from',
	title: '单位',
	type: 'string',
	columnClass: 'table_column',
	headerClass: "table_header",
	fastQuery: true,
	fastQueryType: 'lk'
}];


//所有选手的表单配置

var allOption = {
	lang: 'zh-cn',
	ajaxLoad: false,
	check : true,
	exportFileName: '比赛成绩表',
	datas: allDatas,
	columns: allColumns,
	gridContainer: 'allContainer',
	toolbarContainer: 'allToolBarContainer',
	tools: 'refresh|faseQuery|advanceQuery|export[excel,csv,pdf,txt]|print',
	pageSize: 1000,
	pageSizeLimit: [10,50,100,200, 500,1000,2000]
};

/*
 * var user = new Object();
user.id = p.id;
user.name = p.get("name");
user.rank = (i + 1);
user.from = p.get("from");
user.project = p.get("project");
user.level = p.get("level");
user.age = p.get("no");
user.sex = p.get("sex");
for (var j = 1; j <= judgeCount; j++) {
	user['score' + j] = p.get('score' + j);
}
user.alertScore = Number(p.get("endScore")-p.get("score")).toFixed(2);
user.score = p.get("score");
user.endScore = p.get("endScore");
 */
var cmp = function(a,b){
	
	if(a.get('project')>b.get('project'))
		return 1;
	else if(a.get('project')<b.get('project') )
		return -1;
	if(a.get('level')>b.get('level'))
		return 1;
	else if(a.get('level') < b.get('level') )
		return -1;
	if((a.get('endScore')!==undefined && b.get("endScore")===undefined) || Number(a.get('endScore')) > Number(b.get("endScore")))
	{
		return -1;
	}else if((a.get('endScore')===undefined && b.get("endScore")!==undefined)||Number(a.get('endScore')) < Number(b.get("endScore")))
	{
		return 1;
	}else{
		
		if(a.get('endScore')===undefined && b.get("endScore")===undefined || judgeCount<=3)
			return 0;
			
		var arr1=[];
		var arr2=[];
		for(var i =1;i<=judgeCount;i++)
		{
			arr1.push(Number(a.get('score'+i)));
			arr2.push(Number(b.get('score'+i)));
		}
		arr1.sort(function(a,b){
			if(a > b)
				return 1;
			if(a<b)
				return -1;
			return 0;
		});
		arr2.sort(function(a,b){
			if(a > b)
				return 1;
			if(a<b)
				return -1;
			return 0;
		});
//		console.log(arr1);
//		console.log(arr2);
		var as1 = arr1.shift();
		var as2 = arr1.pop();
		var as = Number(a.get("score"));
		var avg = (as1+as2)/2;
		var bs1 = arr2.shift();
		var bs2 = arr2.pop();
		var bs = Number(b.get("score"));
		var bvg = (bs1+bs2)/2;
//		console.log(a.get('name')+":"+as1+","+as2+","+as+","+avg);
//		console.log(b.get('name')+":"+bs1+","+bs2+","+bs+","+bvg);
		if(Math.abs(avg - as) > Math.abs(bvg - bs))
			return 1;
		else if(Math.abs(avg - as) < Math.abs(bvg - bs))
			return -1;
		else{
			if(avg>bvg)
				return -1;
			else if(avg < bvg)
				return 1;
			else{
				if(as1 > bs1)
					return -1;
				else if(as1 < bs1)
					return 1;
				else
				{
					if(a.get('level') === b.get('level') && a.get('project') === b.get('project')){
//						a.set('flag',a.get('endScore'));
//						b.set('flag',b.get('endScore'));
						a.set('flag',true);
						b.set('flag',true);
//						console.log(a.get('name')+"___"+b.get('name'));
					}
					return 0;
				}
			}
		}
	}
};

var dataCmp = function(a,b){
	if(a.endScore > b.endScore)
	{
		return -1;
	}else if(a.endScore<b.endScore)
	{
		return 1;
	}else{
		if(judgeCount<=3)
		{
			return 0;
		}
		var arr1=[];
		var arr2=[];
		for(var i =1;i<=judgeCount;i++)
		{
			arr1.push(a['score'+i]);
			arr2.push(b['score'+i]);
		}
		arr1.sort();
		arr2.sort();
		var as1 = arr1.shift();
		var as2 = arr1.pop();
		var as = a["score"];
		var avg = (as1+as2)/2;
		var bs1 = arr2.shift();
		var bs2 = arr2.pop();
		var bs = b["score"];
		var bvg = (bs1+bs2)/2;
		
		if(Math.abs(avg - as) > Math.abs(bvg - bs))
			return 1;
		else if(Math.abs(avg - as) < Math.abs(bvg - bs))
			return -1;
		else{
			if(avg>bvg)
				return 1;
			else if(avg < bvg)
				return -1;
			else{
				if(as1 >bs1)
					return 1;
				else if(as1 < bs1)
					return -1;
				else
					return 0;
			}
		}
	}
};

var convertSort =function(res){
	res.sort(cmp);
	delete pData;
	pData = [];
	
	delete tempData;
	tempData = [];
	
	allDatas.length=0;
	for (var i = 0; i < res.length; i++) {
		var p = res[i];
		var user = new Object();
		user.id = p.id;
		user.flag = p.get('flag');
		user.name = p.get("name");
		user.rank = (i + 1);
		user.tag = p.get('tag');
		user.from = p.get("from");
		user.courseNo = p.get('courseNo');
		user.project = p.get("project");
		user.level = p.get("level");
		user.age = p.get("no");
		user.sex = p.get("sex");
		for (var j = 1; j <= judgeCount; j++) {
			user['score' + j] = p.get('score' + j);
		}
		user.alertScore = Number(p.get("endScore")-p.get("score")).toFixed(2);
		user.score = p.get("score");
		user.endScore = p.get("endScore");
		if(!tempData[user.project]){
			tempData[user.project] = [];
		}
		if(!tempData[user.project][user.level]){
			tempData[user.project][user.level] = [];
		}
		tempData[user.project][user.level].push(user);
		
		var pStr = user.project.split(' ')[0];
		if(!pData[pStr]){
			pData[pStr] = [];
		}
		if(!pData[pStr][user.from]){
			pData[pStr][user.from] =[];
		}
		pData[pStr][user.from].push(user);
	}
	for(var p in tempData){
		tempData[p].sort(levelSortFunc);
		for(var l in tempData[p]){
			var i = 1;
			var tag = 0;
			var pre=null;
			var first =true;
			for(var d in tempData[p][l]){
				if(pre==null)
					pre = tempData[p][l][d].endScore;
				if(tempData[p][l][d].flag){
					tag = 1;
					if(pre!=tempData[p][l][d].endScore  && !first)
						i++;
					first =false;
					tempData[p][l][d].rank = i;
					console.log(tempData[p][l][d]);
				}else{
					if(tag==1){
						i++;
					}
					tag=2 ;
					tempData[p][l][d].rank = i++;
				}
				pre = tempData[p][l][d].endScore;
				allDatas.push(tempData[p][l][d]);
			}
		}
	}
}

var projectLevelSortFunc = function(a,b){
	if(a.project>b.project)
		return 1;
	else if(a.project < b.project )
		return -1;
	if(a.level>b.level)
		return -1;
	else if(a.level < b.level )
		return 1;
	return 0;
}
var noPatt=new RegExp("^[A-Z][0-9]+");
var BmobprojectLevelSortFunc = function(a,b){
	if(noPatt.test(a.get('no'))&&noPatt.test(b.get('no'))){
		if(Number(a.get('no').substr(1)) > Number(b.get('no').substr(1)))
			return 1;
		else if(Number(a.get('no').substr(1)) < Number(b.get('no').substr(1)))
			return -1;
		return 0;
	}
	if(a.get('project')>b.get('project'))
		return 1;
	else if(a.get('project')<b.get('project') )
		return -1;
	if(a.get('level')>b.get('level'))
		return 1;
	else if(a.get('level') < b.get('level') )
		return -1;
	if(a.createdAt > b.createdAt){
		return 1;
	}else if(a.createdAt < b.createdAt)
	{
		return -1;
	}
	return 0;
}
var projectSortFunc =function(a,b){

	if(a.project>b.project)
		return 1;
	else if(a.project < b.project )
		return -1;
	return 0;
}
var levelSortFunc =function(a,b){
	if(a.level>b.level)
		return 1;
	else if(a.level < b.level )
		return -1;
	return 0;
}


//根据项目组别筛选团体
var filterByProjectLevel = function(allData){
	
}

//根据项目以及单位分类
var filterByProject = function(allData){
	var data = new Array();
	var project =new Array();
	var team = new Array();
	for(var u in allData){
		u = allData[u];
		if(!project[u.project])
		{
			project[u.project] = new Array(u);
		}
		else{
			project[u.project].push(u);
		}
		
		if(!team[u.from])
		{
			team[u.from] = new Array(u);
		}
		else{
			team[u.from].push(u);
		}
	}
	filterTeamScore(project);
	data.push(project);
	data.push(team);
	return data;
}
var filterByProjectFormer = function(allData){
	var data = new Array();
	var project =new Array();
	var team = new Array();
	for(var u in allData){
		u = allData[u];
		
		if(!project[u.project.split(' ')[0]])
		{
			project[u.project.split(' ')[0]] = new Array(u);
		}
		else{
			project[u.project.split(' ')[0]].push(u);
		}
		
		if(!team[u.from])
		{
			team[u.from] = new Array(u);
		}
		else{
			team[u.from].push(u);
		}
	}
	filterTeamScore(project);
	data.push(project);
	data.push(team);
	return data;
}

var filterTeamScore=function(projectData){
	
	for(var i in projectData){
		var x = 1;
		for(var j in projectData[i]){
			projectData[i][j].rank=x++;
		}
	}
}




var backupTeamScores = null;

var getProjetTeamRank = function(){
	teamScoreDatas.length =0;
	for(var p in pData){
		for(var f in pData[p]){
			var team = new Object();
			team.projectName = p;
			team.from = f;
			team.rank =1;
			var score = 0;
			team.count = pData[p][f].length;
			team.loop=0;
			for(var t in pData[p][f]){
					var u = pData[p][f][t];
					if(u.endScore > 0  && u.rank<=Team_Score.length){
						score=score+Team_Score[u.rank-1];
						team.loop++;
					}
			}
			team.totalScore = score;
			teamScoreDatas.push(team);
		}
	}
	teamScoreDatas.sort(function(a,b){
		if(a.projectName >　b.projectName){
			return 1;
		}else if(a.projectName <　b.projectName)
			return -1;
		else{
			if(a.totalScore > b.totalScore)
				return -1;
			if(a.totalScore < b.totalScore)
				return 1;
			if(a.loop > b.loop)
				return -1;
			if(a.loop < b.loop)
				return 1;
			if(a.projectName ===　b.projectName){
				a.rank = -1;
				b.rank = -1;
			}
			return 0;
		}
	});
	var x = 1;
	var tag =0;
	var flag = "";
	var first = true;
	var pre = null;
	for(var i in teamScoreDatas){
		if(teamScoreDatas[i].projectName!==flag){
			flag = teamScoreDatas[i].projectName;
			x = 1;
			pre = null;
			first = true;
		}
		if(teamScoreDatas[i].rank==-1){
			if(pre!=tempData[p][l][d].endScore  && !first)
				x++;
			first =false;
			teamScoreDatas[i].rank  = x;
			tag = 1;
		}else{
			if(tag==1){
				x++;
			}
			teamScoreDatas[i].rank  = x++;
			tag = 2;
		}
		console.log(x);
	}
	console.log(teamScoreDatas);
}
var getTeamRank = function(allData){
	teamScoreDatas.length =0;	
	if(backupTeamScores == null){
		backupTeamScores = [];
		var teamArr = [];
		var projectArr = [];
		for(var t in allData){
			if(!teamArr[allData[t].from]){
				teamArr[allData[t].from] = [];
			}
			var p = allData[t].project;
			if(!projectArr[p])
				{
					projectArr[p] = [];	
				}
				projectArr[p].push(allData[t]);
				teamArr[allData[t].from].push(allData[t]);
		}
		
			for(var i in teamArr){
				var team = new Object();
				team.from = i;
				team.rank =1;
				var score = 0;
				team.count = teamArr[i].length;
				team.loop=0;	
				for(var t in teamArr[i]){
					var u = teamArr[i][t];
					if(u.endScore > 0  && u.rank<=Team_Score.length){
						score=score+Team_Score[u.rank-1];
						team.loop++;
					}
				}
				team.totalScore = score;
				teamScoreDatas.push(team);
				backupTeamScores.push(team);
			}
	}else{
		for(var b in backupTeamScores){
			teamScoreDatas.push(backupTeamScores[b]);
		}
	}
	teamScoreDatas.sort(function(a,b){
		if(a.totalScore > b.totalScore)
			return -1;
		if(a.totalScore > b.totalScore)
			return 1;
		if(a.loop > b.loop)
			return -1;
		if(a.loop < b.loop)
			return 1;
		a.rank = -1;
		b.rank = -1;
		return 0;
	});
	var x = 1;
	var tag = 0;
	for(var i in teamScoreDatas){
		if(teamScoreDatas[i].rank==-1){
			teamScoreDatas[i].rank  = x;
			tag = 1;
		}else{
			if(tag==1){
				{
					x++;
				}
			teamScoreDatas[i].rank  =x++;
			tag = 2;
		}
		}
	}
}

var filterTeamRank = function(teamData){
	teamScoreDatas.length = 0;
	for(var t in teamData){
		var team = new Object();
		team.from = t;
		t = teamData[t];
		team.rank =1;
		var score = 0;
		team.count = t.length;
		team.loop=0;
		for(var i=0,s=t.length;i<s; i++){
			var u = t[i];
			if(u.endScore > 0  && u.rank<=Team_Score.length){
				score=score+Team_Score[u.rank-1];
				team.loop++;
			}
		}
		team.totalScore = score;
		teamScoreDatas.push(team);
	}
	teamScoreDatas.sort(function(a,b){
		if(a.totalScore > b.totalScore)
			return -1;
		if(a.totalScore > b.totalScore)
			return 1;
		if(a.loop > b.loop)
			return -1;
		if(a.loop < b.loop)
			return 1;
		a.rank = -1;
		b.rank = -1;
		return 0;
	});
	var x = 1;
	for(var i in teamScoreDatas){
		if(teamScoreDatas[i].rank==-1){
			teamScoreDatas[i].rank  = x;
			tag = 1;
		}else{
			if(tag==1){
				{
					x++;
				}
			teamScoreDatas[i].rank  =x++;
			tag = 2;
		}
	}
	console.log(teamScoreDatas);
	return teamScoreDatas;
}
}
