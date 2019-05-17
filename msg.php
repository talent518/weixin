<pre><?php
require './WeixinChat.php';

$weixin = new WeixinChat();
$weixin->sendCustomMessage($_GET['openid'], $_GET['msg']);
