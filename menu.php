<?php

function getRedirectUrl ( $url, $scope = 0 ) {
	global $weixin;
	
	return $weixin->getOauthCode('http://tw.we-ideas.com/redirect.php?redirectUrl=' . urlencode($url), $scope);
}

require './WeixinChat.php';

$weixin = new WeixinChat('wx27ee3c1eb97bf28e', '699375c9eb11e5bbad86d43e75bfcc62', 'weixin');

$data = array(
	"button" => array(
		array(
			"type" => "click", 
			"name" => "个人中心", 
			"sub_button" => array(
				array(
					"type" => "view", 
					"name" => "账号绑定", 
					"url" => getRedirectUrl('userbind.php', 1)
				), 
				array(
					"type" => "view", 
					"name" => "个人信息", 
					"url" => getRedirectUrl('userinfo.php', 1)
				)
			), 
			"key" => "ucenter"
		), 
		array(
			"type" => "click", 
			"name" => "资讯", 
			"key" => "news"
		), 
		array(
			"type" => "click", 
			"name" => "培训", 
			"sub_button" => array(
				array(
					"type" => "view", 
					"name" => "现场签到", 
					"url" => "http://www.soso.com/"
				), 
				array(
					"type" => "click", 
					"name" => "考试", 
					"key" => "exam"
				), 
				array(
					"type" => "click", 
					"name" => "投票", 
					"key" => "vote"
				), 
				array(
					"type" => "view", 
					"name" => "抽奖", 
					"url" => "http://www.soso.com/"
				)
			), 
			"key" => "train"
		)
	)
);
echo $weixin->createMenu($data) ? 'Success' : 'Error';