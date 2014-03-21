<?php
$options=array(
	'01.非常满意',
	'02.满意',
	'03.一般',
	'04.不太满意'
);
?><!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=3.0" />
<meta content="telephone=no" name="format-detection" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<title>【投票】您对新行员培训还满意吗？</title>
<script type="text/javascript" src="jquery.min.js"></script>
<style type="text/css">
h2{font-size:20px;}
form {
	line-height: 30px;
	font-size: 14px;
}
form button{
	display:none;
	height: 45px;
	padding: 0 20px;
	border-radius: 5px;
	background: #06c;
	line-height: 45px;
	color: white;
	font-size: 20px;
	font-weight: bold;
	text-decoration: none;
	border:none;
}
form p{border:1px white solid;}
form .selected{border-color:#06c;}
.result dd{margin:0px;position:relative;height:20px;line-height:20px;background:#ccc;}
.result dd span{position:absolute;left:0px;top:0px;height:100%;background:#06c;}
.result dd label{display:block;position:relative;text-align:center;}
</style>
</head>
<body>
	<h2>【投票】您对新行员培训还满意吗？</h2>
	<p>您还在等什么，赶快来参与吧，参与有奖哦！</p>
<?php if(isset($_POST['selected'])):?>
	<div class="result">
	<?php $max=100;$lastIndex=count($options)-1;?>
	<?php foreach ($options as $i=>$title):?>
		<?php $rnd=$lastIndex==$i?$max:($max?rand(0, $max):0);$max-=$rnd;?>
		<dl>
			<dt><?php echo $title;?></dt>
			<dd><span style="width:<?php echo $rnd;?>%"></span><label>%<?php echo $rnd;?></label></dd>
		</dl>
	<?php endforeach;?>
	</div>
<?php else:?>
	<form action="vote.php" method="post">
	<?php foreach($options as $i=>$title):?>
		<p>
			<input id="option-<?php echo $i;?>" name="selected" type="radio" value="<?php echo $i;?>" />
			<label for="option-<?php echo $i;?>"><?php echo $title;?></label>
		</p>
	<?php endforeach;?>
		<button type="submit">提交</button>
	</form>
	<script type="text/javascript">
	var $p=$('form p');
	$('form input').click(function(){
		$p.removeClass('selected');
		$(this).parent().addClass('selected');
		$('button').show();
	});
	</script>
<?php endif;?>
</body>
</html>