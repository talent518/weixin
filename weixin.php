<?php
define("TOKEN", "weixin");
$wechatObj = new wechat();
$wechatObj->responseMsg();
class wechat {
	public function valid() {
		$echoStr = $_GET["echostr"];
		if($this->checkSignature()){
			echo $echoStr;
			exit;
		}
	}                   

	private function checkSignature() {
		$signature = $_GET["signature"];
		$timestamp = $_GET["timestamp"];
		$nonce = $_GET["nonce"];
		$token = TOKEN;
		$tmpArr = array($token, $timestamp, $nonce);
		sort($tmpArr);
		$tmpStr = implode( $tmpArr );
		$tmpStr = sha1( $tmpStr );
		if( $tmpStr == $signature ) {
			return true;
		} else {
			return false;
		}
	}
	
	public function responseMsg() {
	
		//---------- 接 收 数 据 ---------- //
	
		$postStr = $GLOBALS["HTTP_RAW_POST_DATA"]; //获取POST数据
	
		//用SimpleXML解析POST过来的XML数据
		$postObj = simplexml_load_string($postStr,'SimpleXMLElement',LIBXML_NOCDATA);
	
		$fromUsername = $postObj->FromUserName; //获取发送方帐号（OpenID）
		$toUsername = $postObj->ToUserName; //获取接收方账号
		$keyword = trim($postObj->Content); //获取消息内容
		$time = time(); //获取当前时间戳
	
		header('Content-Type: text/xml; charset=UTF-8');
		//图文消息
		$imgtpl="<xml>
		<ToUserName><![CDATA[toUser]]></ToUserName>
		<FromUserName><![CDATA[fromUser]]></FromUserName>
		<CreateTime>12345678</CreateTime>
		<MsgType><![CDATA[news]]></MsgType>
		<ArticleCount>2</ArticleCount>
		<Articles>
		<item>
		<Title><![CDATA[图片]]></Title>
		<Description><![CDATA[返回一个图片]]></Description>
		<PicUrl><![CDATA[http://www.baidu.com/img/bdlogo.gif]]></PicUrl>
		<Url><![CDATA[http://www.baidu.com]]></Url>
		</item>
		</Articles>
		</xml>";
		
		//格式化模板
		$resultStr = sprintf($imgtpl,$fromUsername,$toUsername,
				$time);
		echo $resultStr; //输出结果
	}
}
?>