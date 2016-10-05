Easemob.im.config = {
    /*
        The global value set for xmpp server
        ws://im-api.easemob.com/ws/
        wss://im-api.easemob.com/ws/
        http://im-api.easemob.com/http-bind/
        https://im-api.easemob.com/http-bind/
    */
    xmppURL: 'wss://im-api.easemob.com/ws/',
    /*
        The global value set for Easemob backend REST API
        http://a1.easemob.com
    */
    apiURL:'https://a1.easemob.com',
    /*
        连接时提供appkey
    */
    appkey: 'dooze#onlinejudge',
    https : true
}
//异常情况下的处理方法
var handleError = function(conn,e) {
    e && e.upload && $('#fileModal').modal('hide');
    if (curUserId == null) {
        hiddenWaitLoginedUI();
        alert(e.msg + ",请重新登录");
        showLoginUI();
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
        } else if(msg!=undefined){
            alert(msg);
        }
    }
    conn.stopHeartBeat(conn);
};

var login = function(user,pass) {
    //根据用户名密码登录系统
    conn.open({
    	apiUrl : 'https://a1.easemob.com',
        user : user,
        pwd : pass,
        appKey : 'dooze#onlinejudge'
    });         
return true;
};

var handleConfig = function() { 
                if(Easemob.im.Helper.getIEVersion() < 10) { 
                         Easemob.im.config.https = location.protocol == 'https:' ? true : false; 
                         if(!Easemob.im.config.https) { 
                             if(Easemob.im.config.xmppURL.indexOf('https') == 0) { 
                                 Easemob.im.config.xmppURL = Easemob.im.config.xmppURL.replace(/^https/, 'http'); 
                            } 
                             if(Easemob.im.config.apiURL.indexOf('https') == 0) { 
                                Easemob.im.config.apiURL = Easemob.im.config.apiURL.replace(/^https/, 'http'); 
                             } 
                         } else { 
                             if(Easemob.im.config.xmppURL.indexOf('https') != 0) { 
                                 Easemob.im.config.xmppURL = Easemob.im.config.xmppURL.replace(/^http/, 'https'); 
                             } 
                             if(Easemob.im.config.apiURL.indexOf('https') != 0) { 
                                 Easemob.im.config.apiURL = Easemob.im.config.apiURL.replace(/^http/, 'https'); 
                             } 
                         } 
                     } 
                 };

var sendText = function(conn,msg,to)
        {
            var options={
                to:to,
                msg:msg,
                type:'groupchat'
            };
            console.log('Send: ');
            console.log(options);
            conn.sendTextMessage(options);
        };