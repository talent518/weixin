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
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta content="telephone=no" name="format-detection" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<title>【考试】内向者如何转身变社交达人</title>
<script type="text/javascript" src="jquery.min.js"></script>
<style type="text/css">
body{font-size:14px;line-height:20px;}
h2{font-size:18px;font-weight:bold;}
form {
	line-height: 30px;
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
form{width:100%;}
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
.fright{float:right;}
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
		<div><span class="fright">当前第<?php echo $_GET['index']+1;?>题</span>共<?php echo count($list);?>题</div>
			<h2><?php echo $question['title'];?></h2>
		<?php foreach($question['options'] as $i=>$title):?>
			<p>
				<input id="answer-<?php echo $i;?>" name="answers" type="radio" value="<?php echo $prefix,$i;?>" />
				<label for="answer-<?php echo $i;?>"><?php echo $title;?></label>
			</p>
		<?php endforeach;?>
			<button type="submit"><?php echo $_GET['index']+1==count($list)?'答题完毕，交卷':'下一题';?></button>
		</form>
		<script type="text/javascript">
		var $p=$('form p');
		$('form input').click(function(){
			$p.removeClass('selected');
			$(this).parent().addClass('selected');
			$('button').show();
		});
		</script>
	 <?php else :?>
	 	<div class="result">
	 		<h2>【考试】内向者如何转身变社交达人</h2>
	 		<?php
	 		$count=0;
	 		foreach(explode(',', $_POST['answers']) as $key=>$val):
	 			if($list[$key]['answer']==$val+1):
	 				$count++;
	 			endif;
	 		endforeach;
	 		?>
	 		<p>共<?php echo count($list);?>题,答对<?php echo $count;?>题。</p>
	 	</div>
	<?php endif;
 else :
	?>
	<h2>【考试】内向者如何转身变社交达人</h2>
	<p>2013-12-10&nbsp;&nbsp;</p>
	<img src="http://news.xinhuanet.com/politics/2014-03/18/119829558_13951512652051n.jpg" width="100%" height="80"/>
	<div class="btn-begin">
		<a href="exam.php?index=0">开始答题</a>
		<p>练习时间</p>
		<span>2014-3-1 ~ 2014-12-31</span>
	</div>
	<p>规则说明：</p>
	<p>本次练习内容为金融类测试，请遵守以上规则：</p>
	<div style="padding-left:2em;">
		<p>1、答题时请保持安静；</p>
		<p>2、答题完毕后，请根据答题完提示一下题的操作。</p>
	</div>
<?php endif;?>
</body>
</html>