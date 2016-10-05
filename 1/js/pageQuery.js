var _skip =0;
var _limit=500;
var _tag=0;
var _results =[];
var _concatArr = [];
var _count =0;
var _reset =function(){
	_tag = 0;
	_results.length = 0;
	_count =0;
};
var _queryCount = function(countQuery,loopQuery,action){
	_reset();
countQuery.count({
	success:function(c){
		_count = Number(c / _limit+0.5).toFixed(0);
		for(var i =1 ;i<=_count;i++){
			_skip = _limit*(i-1);
			_loopQuery(loopQuery,action);
		}
	},
	error:function(e){
		console.log(e.message);
	}
});
};
var _loopQuery = function(q,action){
	q.limit(_limit);
	q.skip(_skip);
	q.find({
		success:function(res){
			if(res<0){
				alert("空数据");
				return;
			}
			_tag ++;
			_results = _concatArr.concat(_results,res);
			if(_count == _tag){
				action(_results);
			}
		},
		error:function(e){
			console.log(e.message);
		}
	});
};

