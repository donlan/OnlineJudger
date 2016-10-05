<?php
define('TOKEN', 'DOOZE');

$accese = new Weixin();
if(isset($_GET['echostr']))
{
	$accese->checkSignature();
}
else
{
	$accese->receive();
}
class Weixin{

	public function checkSignature()
	{
	    $signature = $_GET["signature"]; //数字签名
	    $timestamp = $_GET["timestamp"]; //时间戳
		$nonce = $_GET["nonce"];	     //随机数
	        		
		$token = TOKEN; 
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr, SORT_STRING);
		$tmpStr = implode( $tmpArr ); //将数组转换成字符串
		$tmpStr = sha1( $tmpStr );
		
		if( $tmpStr == $signature ){
			echo $_GET['echostr'];
		}else{
			return false;
		}
	}

	public function receive()
	{
		$data =$GLOBALS['HTTP_RAW_POST_DATA'];
		$post = simplexml_load_string($data,'SimpleXMLElement',LIBXML_NOCDATA);
		$this->logger("接收：\n".$data);
		if(!empty($post)){
			switch ($post->MsgType) {
				case 'text':
					$this->receiveText($post);
					break;
				case 'image':

				break;
				case 'voice':

				break;
				case 'video':

				break;
				case 'music':

				break;

				default:
					# code...
					break;
			}
		}
	}


	private function replyVoice($post)
	{
		
	} 
	private function receiveText($post)
	{
		/*
		接受到的文本信息格式
		<xml>
		 <ToUserName><![CDATA[toUser]]></ToUserName>
		 <FromUserName><![CDATA[fromUser]]></FromUserName> 
		 <CreateTime>1348831860</CreateTime>
		 <MsgType><![CDATA[text]]></MsgType>
		 <Content><![CDATA[this is a test]]></Content>
		 <MsgId>1234567890123456</MsgId>
		 </xml>
		*/
		 /*
			
		 */
		$content = trim($post->Content);
		
		$to = $post->FromUserName;
		$from = $post->ToUserName;

		switch (substr($content,0,6)) {
			case '周一':
			$text='3.嵌入式操作系统_01(本部教学西区15302H)	 4.JAVA EE_01(本部教学西区15109H)';
			$result=$this->handlerText($to,$from,$text);
				if(!empty($result))
				{
					echo $result;
				}
				break;
			case '周二':
			$text='2.微机原理及接口技术_01(本部教学西区15310H)	3.硬件设计实例_01(本部教学西区15310H)	4.单片机原理及应用_01(本部教学西区07202H)';
			$result=$this->handlerText($to,$from,$text);
				if(!empty($result))
				{
					echo $result;
				}
				break;
			case '周三':
			$text=' 2.专业外语_01(本部教学西区03211H)	3.嵌入式应用开发技术_01(本部教学西区02101H) 	4.编译原理_01(本部教学西区08101H)';
			$result=$this->handlerText($to,$from,$text);
				if(!empty($result))
				{
					echo $result;
				}
				break;
			case '周四':
			$text='2.微机原理及接口技术_01(本部教学西区15310H)	3.嵌入式体系结构_01(本部教学西区03211H)';
			$result=$this->handlerText($to,$from,$text);
				if(!empty($result))
				{
					echo $result;
				}
				break;
			case '周五':
			$text='1.编译原理_01(本部教学西区08101H)	2.单片机原理及应用_01(本部教学西区07202H) 4.计算机前沿动态_01(本部教学西区07101H)';
			$result=$this->handlerText($to,$from,$text);
				if(!empty($result))
				{
					echo $result;
				}
				break;
			case 'news':
				$this->replyNews($post);
			break;
			case '天气':
				$result=$this->handlerText($to,$from,$this->getWeateher(substr($content, 6)));
				if(!empty($result))
				{
					echo substr($content, 6).'天气  : '.$result;
				}
				break;
			case '笑话':
				$result=$this->handlerText($to,$from,$this->getJoke());
				if(!empty($result))
				{
					echo $result;
				}
				break;
			default:
				echo $this->handlerText($to,$from,'没发现这个功能。。。');
				break;
		}
	}

private function replyNews($post)
{
	$result = $this->handlerImageText($post->FromUserName,$post->ToUserName,'dong在里面','Fighting Forever','http://b161.photo.store.qq.com/psb?/ba0f0141-d46e-435d-b7f1-ee0c02c270ed/6YY69K*Ca7bSJW.htsURn.*h7O0d0duvrDrq7b8yABs!/b/dKEAAAAAAAAA&ek=1&kp=1&pt=0&bo=VAOAAgAAAAABAPI!&sce=0-12-12&rf=viewer_311','http://dooogo.github.io');
	if(!empty($result))
		{
			echo $result;
		}

}

private function getWeateher($city){
	$ch = curl_init();
    $url = 'http://apis.baidu.com/heweather/weather/free?city='.$city;
    $header = array(
        'apikey: c723501528e9a20b6076377ac0606c38',
    );
    // 添加apikey到header
    curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    // 执行HTTP请求
    curl_setopt($ch , CURLOPT_URL , $url);
    $res = curl_exec($ch);

	$res = substr_replace($res, 'HeWeather',2,strlen('HeWeather data service 3.0'));
	
	
	$data  =  json_decode($res);
	
	$data = $data->HeWeather;
	
	$resStr ='PM10：'.$data[0]->aqi->city->pm10;
	$resStr .='		PM25：'.$data[0]->aqi->city->pm25;
	$resStr .='		空氣質量：'.$data[0]->aqi->city->qlty;
	$resStr .='		城市：'.$data[0]->basic->city;
	$resStr .='		更新時間：'.$data[0]->basic->update->utc;
	$resStr .='		白天：'.$data[0]->daily_forecast[0]->cond->txt_d;
	$resStr .='		夜晚：'.$data[0]->daily_forecast[0]->cond->txt_n;
	$resStr .='		最高溫度：'.$data[0]->daily_forecast[0]->tmp->max;
	$resStr .='		最低溫度：'.$data[0]->daily_forecast[0]->tmp->min;
	$resStr .='		溫度：'.$data[0]->hourly_forecast[0]->tmp;
	$resStr .='		未來七天天氣：';
	for($i = 0 ;$i<7;$i++){
		$resStr .='		日期：'.$data[0]->daily_forecast[$i]->date;
		$resStr .='		白天：'.$data[0]->daily_forecast[$i]->cond->txt_d;
		$resStr .='		夜晚：'.$data[0]->daily_forecast[$i]->cond->txt_n;
		$resStr .='		最高溫度：'.$data[0]->daily_forecast[$i]->tmp->max;
		$resStr .='		最低溫度：'.$data[0]->daily_forecast[$i]->tmp->min;
	}
    return $resStr;
}

private function getJoke(){
$appkey = "aea08f88a61916061123c0c87717a9ef";
$url = "http://japi.juhe.cn/joke/content/text.from";
$params = array(
      "page" => "",
      "pagesize" => "5",
      "key" => $appkey,
);
$paramstring = http_build_query($params);
$content = juhecurl($url,$paramstring);
$result = json_decode($content,true);
if($result){
    if($result['error_code']=='0'){
		
		$res = $result['result']['data'];
		
		$str = $res[0]['content'];
		$str .= $res[0]['updatetime'];
		$str .= $res[1]['content'];
		$str .= $res[1]['updatetime'];
		$str .= $res[2]['content'];
		$str .= $res[2]['updatetime'];
		$str .= $res[3]['content'];
		$str .= $res[3]['updatetime'];
		$str .= $res[4]['content'];
		$str .= $res[4]['updatetime'];
		return $str;
    }else{
        return $result['error_code'].":".$result['reason'];
    }
}else{
    return "请求失败";
}
}


/**
 * 请求接口返回内容
 * @param  string $url [请求的URL地址]
 * @param  string $params [请求的参数]
 * @param  int $ipost [是否采用POST形式]
 * @return  string
 */
function juhecurl($url,$params=false,$ispost=0){
    $httpInfo = array();
    $ch = curl_init();
 
    curl_setopt( $ch, CURLOPT_HTTP_VERSION , CURL_HTTP_VERSION_1_1 );
    curl_setopt( $ch, CURLOPT_USERAGENT , 'JuheData' );
    curl_setopt( $ch, CURLOPT_CONNECTTIMEOUT , 60 );
    curl_setopt( $ch, CURLOPT_TIMEOUT , 60);
    curl_setopt( $ch, CURLOPT_RETURNTRANSFER , true );
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    if( $ispost )
    {
        curl_setopt( $ch , CURLOPT_POST , true );
        curl_setopt( $ch , CURLOPT_POSTFIELDS , $params );
        curl_setopt( $ch , CURLOPT_URL , $url );
    }
    else
    {
        if($params){
            curl_setopt( $ch , CURLOPT_URL , $url.'?'.$params );
        }else{
            curl_setopt( $ch , CURLOPT_URL , $url);
        }
    }
    $response = curl_exec( $ch );
    if ($response === FALSE) {
        //echo "cURL Error: " . curl_error($ch);
        return false;
    }
    $httpCode = curl_getinfo( $ch , CURLINFO_HTTP_CODE );
    $httpInfo = array_merge( $httpInfo , curl_getinfo( $ch ) );
    curl_close( $ch );
    return $response;
}

private function handlerImageOrVoice($to,$from,$imgId,$type)
{
$image=<<<img
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[%s]]></MsgType>
img;
if ($type==image) {
	$image.'<Image>
<MediaId><![CDATA[%s]]></MediaId>
</Image>
</xml>';
}else
{
$image.'<Voice>
<MediaId><![CDATA[%s]]></MediaId>
</Voice>
</xml>';
}
return sprintf($image,$to,$from,$time=time(),$type,$imgId);	
}

private function handlerVideo($to,$from,$tittle,$des,$id)
{
$video=<<<xml
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[video]]></MsgType>
<Video>
<MediaId><![CDATA[%s]]></MediaId>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
</Video> 
</xml>
xml;
return sprintf($video,$to,$from,$time=time(),$id,$tittle,$des);
}

private function handlerMusic($to,$from,$tittle,$des,$url,$hurl,$id)
{
$music=<<<xml
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[music]]></MsgType>
<Music>
<Title><![CDATA[%s]]></Title>
<Description><![CDATA[%s]]></Description>
<MusicUrl><![CDATA[%s]]></MusicUrl>
<HQMusicUrl><![CDATA[%s]]></HQMusicUrl>
<ThumbMediaId><![CDATA[%s]]></ThumbMediaId>
</Music>
</xml>
xml;
return sprintf($music,$to,$from,$time=time(),$tittle,$des,$url,$hurl,$id);
}

private function handlerImageText($to,$from,$tittle,$des,$PicUrl,$Url)
{
$news=<<<xml
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[news]]></MsgType>
<ArticleCount>1</ArticleCount>
<Articles>
<item>
<Title><![CDATA[%s]]></Title> 
<Description><![CDATA[%s]]></Description>
<PicUrl><![CDATA[%s]]></PicUrl>
<Url><![CDATA[%s]]></Url>
</item>
</Articles>
</xml>	
xml;
return sprintf($news,$to,$from,$time=time(),$tittle,$des,$PicUrl,$Url);
}

private function handlerText($to,$from,$text)
{
$reply=<<<xml
<xml>
<ToUserName><![CDATA[%s]]></ToUserName>
<FromUserName><![CDATA[%s]]></FromUserName>
<CreateTime>%s</CreateTime>
<MsgType><![CDATA[text]]></MsgType>
<Content><![CDATA[%s]]></Content>
</xml>
xml;
return sprintf($reply,$to,$from,$time=time(),$text);
}
	private function logger($content){
		$logSize=1000000;
		$logFile='log.txt';
		if(file_exists($logFile) && filesize($logFile)>$logSize)
		{
			unlink($logFile);
		}
		file_put_contents($logFile,date('Y-m-d H:i:s').' '.$content."\n",FILE_APPEND );
	}
}





?>