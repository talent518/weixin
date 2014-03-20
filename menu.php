<?php
require './WeixinChat.php';

$weixin = new WeixinChat('wx27ee3c1eb97bf28e', '699375c9eb11e5bbad86d43e75bfcc62', 'weixin');

function getRedirectUrl ( $url, $scope = 0 ) {
	global $weixin;
	
	return $weixin->getOauthCode('http://tw.we-ideas.com/redirect.php?redirectUrl=' . urlencode($url), $scope);
}

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
					"type" => "view", 
					"name" => "考试", 
					"url" => getRedirectUrl('exam.php', 1)
				), 
				array(
					"type" => "view", 
					"name" => "投票", 
					"url" => getRedirectUrl('vote.php', 1)
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