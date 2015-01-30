<pre><?php
require './WeixinChat.php';

$weixin = new WeixinChat ();

echo 'upload file:', PHP_EOL;
$result = $weixin->uploadMedia ( './upload.jpg' );

var_dump ( $result );

if (isset ( $result ['media_id'] ))
{
	echo PHP_EOL, 'download file:', PHP_EOL;
	var_dump ( $weixin->downloadMedia ( './download.jpg', $result ['media_id'] ) );
}