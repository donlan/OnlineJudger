var conn =null;
var curUserId = null;
var judge=false; 
var userId=null;
var user;
var pass;
var conn = null;
var roomid=null;
var gameNo;
var courseNo;
var ower;
var seq=null;
var tag ;
        
$(document).ready(function(){
	if(typeof BmobInit === 'function' )
	{
		BmobInit();
		console.log("BmobInit");
	}
	user = getUrlKey('name');
    pass = getUrlKey('w');
	gameNo=getUrlKey('gameNo');
    courseNo =getUrlKey('courseNo');
    seq = getUrlKey('seq');
    tag = getUrlKey('tag');
	ower = getUrlKey('id');
	
	if(typeof initGame === 'function'){
		initGame();
		console.log("initGame");
	}
	if( typeof initGameID === 'function'){
		initGameID();
		$("#allUI").show();
		$("#queryUI").hide();
		$("#screen").hide();
		console.log("initGameID");
	}
	if(typeof queryUsers === 'function')
	{
		queryUsers(gameNo, courseNo);
		console.log("queryUsers");
	}
	if(typeof initCourse === 'function'){
		task = [];
		initCourse();
		console.log("initCourse");
	}
	
	conn = new Easemob.im.Connection({
		multiResources: Easemob.im.config.multiResources,
		https : Easemob.im.config.https,
		url: Easemob.im.config.xmppURL
	});
	conn.listen({
		onOpened : function() {
			handleOpen(conn);
		},
		onClosed : function() {
			console.log("onClosed");
			handleClosed();
		},
		onTextMessage : function(message) {
			console.log(message);
			if(typeof handleTextMessage === 'function')
			handleTextMessage(message);
			else{
				alert("NO handleTextMessage");
			}
		},
		onError: function(message) {
			handleError(message);
		}
	});	
	
	login(conn,user,pass);
});
$(document).unload(function(){
	console.log("unload");
	logout(conn);
});
var handleOpen = function(conn) {
	curUserId = conn.context.userId;
	conn.getRoster({
		success : function(roster) {
			var curroster;
			//获取当前登录人的群组列表
			conn.listRooms({
				success : function(rooms) {
					console.log("listRooms:");
					roomid = rooms[0].roomId;
					console.log(roomid);
					conn.setPresence();//设置用户上线状态，必须调用
				},
				error : function(e) {
					show(e);
					conn.setPresence();//设置用户上线状态，必须调用
				}
			});
		}
	});
	//启动心跳
	if (conn.isOpened()) {
		conn.heartBeat(conn);
		console.log("heartBeat");
	}else{
		alert("未能与服务器进行连接，请检查网络是否通畅后重新登陆");
	}
};

//异常情况下的处理方法
var handleError = function(e) {
	curChatRoomId = null;
	if (curUserId == null) {
		alert(e.msg + ",请重新登录");
	} else {
		var msg = e.msg;
		if (e.type == EASEMOB_IM_CONNCTION_SERVER_CLOSE_ERROR) {
			if (msg == "" || msg == 'unknown' ) {
				alert("服务器断开连接,可能是因为在别处登录");
			} else {
				alert("服务器断开连接");
			}
		} else if (e.type === EASEMOB_IM_CONNCTION_SERVER_ERROR) {
			if (msg.toLowerCase().indexOf("user removed") != -1) {
				alert("用户已经在管理后台删除");
			}
		} else {
			alert(msg);
		}
	}
	conn.stopHeartBeat(conn);
};

//连接中断时的处理，主要是对页面进行处理
var handleClosed = function() {
	curUserId = null;
	roomid = null;
};

//登录系统时的操作方法
var login = function(conn,user,pass) {
	console.log("login:"+user);
conn.open({
	apiUrl : Easemob.im.config.apiURL,
	user : user,
	pwd : pass,
	appKey : Easemob.im.config.appkey,
	error:function(){
		show("登陆失败！");
	}
});         
};

var logout = function(conn) {
	conn.stopHeartBeat(conn);
	conn.close();
	console.log("logout");
};	


var sendText= function(message){
	if(conn ==null || roomid == null || roomid==undefined){
		alert("未登录成功，导致与服务器连接失败，请重新登录");
		return;
	}
conn.sendTextMessage({
    to : roomid, 
    type : 'groupchat',
    success:function(){
    	if(Tip!=undefined){
    		Tip("发送成功");
    	}
    },
    error:function(){
    	alert("消息发送失败！请检查是否登录成功！否则请重新登录");
    },
    msg :message
});
console.log(message);
}


var getUrlKey = function(name) { 
	var reg = new RegExp('(^|&)' + name + '=([^&]*)(&|$)', 'i'); 
	var r = window.location.search.substr(1).match(reg); 
	if (r != null) {
	return unescape(r[2]); 
	}
	return null; 
}

var show =function(text,okText,time){
	var w = $(window).width()/2-120;
	$("#toast").remove();
	if(okText==undefined)
		okText ="确定";
	$("body").append('<div id="toast" style="background-color: #fff;position: fixed;top:0px;left:'+w+'px;margin:auto auto; z-index: 1000;min-height: 100px;min-width: 160px;font-size: large;border: solid floralwhite; border-width: 1px;border-radius: 4px;"><p id="text" align="center" style=" margin: 80px 80px;"></p><p id="ok" style="margin:0 0;padding:0 0;line-height: 40px;bottom: 0px; height: 40px;font-size: large;color: #fff;background-color: #008200;" align="center">'+okText+'</p></div>');
	$("div:not(#toast)").fadeTo("slow",0.4);
	$("#text").text(text);
	$("#toast").click(function(){
		$(this).remove();
		$("div:not(#toast)").fadeTo("slow",1);
	});
	if(time!=undefined){
		setTimeout(function(){
			$("#toast").remove();
			$("div:not(#toast)").fadeTo("slow",1);
		},time);
	}
}
