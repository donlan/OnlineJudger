var judgeCount = 0;

var sort = function(res,count)
{
	judgeCount = count;
	res.sort(cmp);
};
var projectLevelSortFunc = function(a,b){
	if(a.project>b.project)
		return 1;
	else if(a.project < b.project )
		return -1;
	if(a.level>b.level)
		return 1;
	else if(a.level < b.level )
		return -1;
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

var dataSort = function(res,count)
{
	judgeCount = count;
	res.sort(dataCmp);
	
	for(var i=0;i<res.length;i++)
	{
		res[i].user_rank = (i+1);
	}
};
var dataCmp = function(a,b){
	if(a.user_endScore>b.user_endScore)
	{
		return -1;
	}else if(a.user_endScore<b.user_endScore)
	{
		return 1;
	}else{
		if(judgeCount<=3)
		return 0;
		
		var arr1=[];
		var arr2=[];
		for(var i =1;i<=judgeCount;i++)
		{
			arr1.push(a['user_score'+i]);
			arr2.push(b['user_score'+i]);
		}
		
		
		arr1.sort();
		arr2.sort();
		var as1 = arr1.shift();
		var as2 = arr1.pop();
		var as = a["user_score"];
		var avg = (as1+as2)/2;
		var bs1 = arr2.shift();
		var bs2 = arr2.pop();
		var bs = b["user_score"];
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
var cmp = function(a,b){
	if((a.get('endScore')!=undefined && b.get("endScore")==undefined)||a.get('endScore')>b.get("endScore"))
	{
		return -1;
	}else if((a.get('endScore')==undefined && b.get("endScore")!=undefined)||a.get('endScore')<b.get("endScore"))
	{
		return 1;
	}else{
		
		if(a.get('endScore')==undefined && b.get("endScore")==undefined)
			return 0;
		if(judgeCount<=3)
			return 0;
		
		var arr1=[];
		var arr2=[];
		for(var i =1;i<=judgeCount;i++)
		{
			arr1.push(Number(a.get('score'+i)));
			arr2.push(Number(b.get('score'+i)));
		}
		arr1.sort();
		arr2.sort();
		var as1 = arr1.shift();
		var as2 = arr1.pop();
		var as = Number(a.get("score"));
		var avg = (as1+as2)/2;
		var bs1 = arr2.shift();
		var bs2 = arr2.pop();
		var bs = Number(b.get("score"));
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