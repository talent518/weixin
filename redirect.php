<?php
require './WeixinChat.php';
$weixin = new WeixinChat('wx27ee3c1eb97bf28e', '699375c9eb11e5bbad86d43e75bfcc62', 'weixin');

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