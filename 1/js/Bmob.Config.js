/**
 * 
 */
Bmob.config={
	ID:'e9046775580b7727b8d75c13dbdcae3e',
	KEY:'dbeb59b2bb42ce7e1efc46245b3840cc '
};

var BmobInit =  function()
{
	Bmob.initialize('e9046775580b7727b8d75c13dbdcae3e','dbeb59b2bb42ce7e1efc46245b3840cc ');
}

var BmobNoteInit = function(){
	Bmob.initialize('03d2a14db425e979034b43b5d661af19','4b9885bff3d810c9f5de75590dd8d07a ');
}
//获取URL参数
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