<pre><?php
require './WeixinChat.php';

$weixin = new WeixinChat ();

var_dump($weixin->getCallbackIP());