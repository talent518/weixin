<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta content="telephone=no" name="format-detection" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<title>二维码测试</title>
</head>
<body><?php
	require './WeixinChat.php';

	$weixin = new WeixinChat();

	$json = $weixin->createQrcode($rnd = rand());

	if(isset($json['ticket'])) {
		echo '<img src="', $weixin->getQrcodeUrl($json['ticket']), '"/>', $rnd;
	} else {
		echo 'createQrcode ERROR';
	}
?></body></html>