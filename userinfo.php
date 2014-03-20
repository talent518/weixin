<?php
require './WeixinChat.php';

$weixin = new WeixinChat('wx27ee3c1eb97bf28e', '699375c9eb11e5bbad86d43e75bfcc62', 'weixin');

$userInfo = $weixin->getUserInfo($_GET['openId']);

?>
<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=3.0" />
<meta content="telephone=no" name="format-detection" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<title>帐户信息</title>
<style type="text/css">
th {
	width: 20%;
	white-space:nowrap;
	text-align: right;
}
img{max-width:100%;}
</style>
</head>
<body>
	<table width="100%">
		<tr>
			<th>微信号：</th>
			<td style="word-wrap:break-word;word-break:break-all;"><?php echo $_GET['openId']?></td>
		</tr>
		<tr>
			<th>昵称：</th>
			<td><?php echo $userInfo['nickname'];?></td>
		</tr>
		<tr>
			<th>头像：</th>
			<td><img src="<?php echo $userInfo['headimgurl'];?>"/></td>
		</tr>
		<tr>
			<th>性别：</th>
			<td><?php echo $userInfo['sex']==1?'男':($userInfo['sex']==2?'女':'未知');?></td>
		</tr>
		<tr>
			<th>语言：</th>
			<td><?php echo $userInfo['language'];?></td>
		</tr>
		<tr>
			<th>地址：</th>
			<td><?php echo $userInfo['country'],'-',$userInfo['province'],'-',$userInfo['city'];?></td>
		</tr>
	</table>
</body>
</html>