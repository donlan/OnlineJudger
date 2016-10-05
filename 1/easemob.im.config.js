Easemob.im.config = {
	xmppURL : 'im-api.easemob.com',
	apiURL : 'https://a1.easemob.com',
	appkey : 'dooze#onlinejudge',
	https : true
};

CMD={
	Start:'1',
	JudgeCommit:'2',
	Next:'3',
	MainCommit:'4',
	SendScreen:'5',
	Pause:'6',
	ModifyScore:'7',
	JudgeReady:'8'
};

// 异常情况下的处理方法
var handleError = function(conn, e) {
	e && e.upload;
	if (curUserId == null) {
		alert(e.msg + ",请重新登录");
	} else {
		var msg = e.msg;
		if (e.type == EASEMOB_IM_CONNCTION_SERVER_CLOSE_ERROR) {
			if (msg == "" || msg == 'unknown') {
				alert("服务器断开连接,可能是因为在别处登录");
			} else {
				alert("服务器断开连接");
			}
		} else if (e.type === EASEMOB_IM_CONNCTION_SERVER_ERROR) {
			if (msg.toLowerCase().indexOf("user removed") != -1) {
				alert("用户已经在管理后台删除");
			}
		} else if (msg != undefined) {
			alert(msg);
		}
	}
	conn.stopHeartBeat(conn);
};
var login = function(conn,user, pass) {
	// 根据用户名密码登录系统
	conn.open({
		apiUrl : 'https://a1.easemob.com',
		user : user,
		pwd : pass,
		appKey : 'dooze#onlinejudge'
	});
	return true;
};
var handleConfig = function() {
	if (Easemob.im.Helper.getIEVersion() < 10) {
		Easemob.im.config.https = location.protocol == 'https:' ? true : false;
		if (!Easemob.im.config.https) {
			if (Easemob.im.config.xmppURL.indexOf('https') == 0) {
				Easemob.im.config.xmppURL = Easemob.im.config.xmppURL.replace(
						/^https/, 'http');
			}
			if (Easemob.im.config.apiURL.indexOf('https') == 0) {
				Easemob.im.config.apiURL = Easemob.im.config.apiURL.replace(
						/^https/, 'http');
			}
		} else {
			if (Easemob.im.config.xmppURL.indexOf('https') != 0) {
				Easemob.im.config.xmppURL = Easemob.im.config.xmppURL.replace(
						/^http/, 'https');
			}
			if (Easemob.im.config.apiURL.indexOf('https') != 0) {
				Easemob.im.config.apiURL = Easemob.im.config.apiURL.replace(
						/^http/, 'https');
			}
		}
	}
};

var sendText = function(conn, msg, to) {
	if(to==null)
	{
		alert("同步服务器失败，请重新登录！");
		return;
	}
	var options = {
		to : to,
		msg : msg,
		type : 'groupchat'
	};
	console.log('Send: ');
	console.log(options);
	conn.sendTextMessage(options);
};

