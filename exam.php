<?php
$list = array(
	array(
		'title' => '问题1答案3', 
		'options' => array(
			'问题1选项1', 
			'问题1选项2', 
			'问题1选项3'
		), 
		'answer' => 3
	), 
	array(
		'title' => '问题2答案1', 
		'options' => array(
			'问题2选项1', 
			'问题2选项2', 
			'问题2选项3'
		), 
		'answer' => 1
	), 
	array(
		'title' => '问题3答案2', 
		'options' => array(
			'问题2选项1', 
			'问题2选项2', 
			'问题2选项3'
		), 
		'answer' => 2
	)
);
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
<title>【考试】内向者如何转身变社交达人</title>
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

.image {
	font-size: 30px;
	padding: 20px 0;
	text-align: center;
	background: #ccc;
}

.btn-begin {
	
}

.btn-begin a {
	float: right;
	height: 45px;
	padding: 0 20px;
	border-radius: 5px;
	background: #06c;
	line-height: 45px;
	color: white;
	font-size: 20px;
	font-weight: bold;
	text-decoration: none;
}

.btn-begin p {
	font-size: 16px;
	line-hegiht: 30px;
}

.btn-begin span {
	display: block;
	font-size: 12px;
	line-height: 15px;
}
</style>
</head>
<body>
<?php

if ( isset($_GET['index']) ) :
	if ( isset($list[$_GET['index']]) ) :
		$question = $list[$_GET['index']];
		$prefix=isset($_POST['answers'])?$_POST['answers'].',':null;
		?>
		<form action="exam.php?index=<?php echo $_GET['index']+1;?>" method="post">
		<h2><?php echo $question['title'];?></h2>
		<?php foreach($question['options'] as $i=>$title):?>
		<p>
			<input name="answers" type="radio" value="<?php echo $prefix,$i;?>" />
			 <label><?php echo $title;?></label>
		</p>
		<?php endforeach;?>
		</form>
		
	 <?php else :?>
	 
	<?php endif;
 else :
	?>
	<h2>【考试】内向者如何转身变社交达人</h2>
	<p>2013-12-10&nbsp;&nbsp;</p>
	<p class="image">1+1=?</p>
	<div class="btn-begin">
		<a href="exam.php?index=0">开始答题</a>
		<p>练习时间</p>
		<span>2014-3-1 ~ 2014-12-31</span>
	</div>
	<p>
		规则说明：<br />本次练习内容为金融类测试，请遵守以上规则：<br />1、答题时请保持安静；<br />2.答题完毕后，请根据答题完提示一下题的操作。
	</p>
<?php endif;?>
</body>
</html>