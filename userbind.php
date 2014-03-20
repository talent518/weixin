<?php
require './WeixinChat.php';
$username = $password = null;
extract($_POST, EXTR_OVERWRITE);

$message = '';
if ( $_POST ) {
	if ( $username === 'test' && $password === '123456' ) {
		$message = '<p class="success">绑定帐户已成功！</p>';
	} else {
		$message = '<p class="error">绑定帐户失败，用户名或密码不正确！</p>';
	}
}

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
<title>帐户绑定</title>
<style type="text/css">
form {
	line-height: 30px;
	font-size: 14px;
}

label {
	display: inline-block;
	width: 5em;
	text-align: right;
}
</style>
</head>
<body>
	<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="post">
		<p>
			<label>微信昵称：</label><span><?php echo $userInfo['nickname'];?></span>
		</p>
		<p>
			<label for="username">用户名：</label><input name="username" type="text" value="<?php echo $username;?>" />
		</p>
		<p>
			<label for="password">密&nbsp;&nbsp;码：</label><input name="password" type="password" value="<?php echo $password;?>" />
		</p>
		<center>
			<button type="button">取消绑定</button>
			<button type="submit">绑定帐户</button>
		</center>
		<?php echo $message;?>
	</form>
</body>
</html>