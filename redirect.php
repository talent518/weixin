<?php
require './WeixinChat.php';
$weixin = new WeixinChat();

$url=$_GET['redirectUrl'];

if(isset($_GET['code'])) {
	$token = $weixin->getSnsAccessToken($_GET['code']);
	
	if($token) {
		$url.=(strpos($url,'?')!==false?'&':'?');
		$url.='openId='.$token['openid'];
		redirect($url);
	} else {
		echo 'Error!';
	}
} else {
	redirect($url);
}