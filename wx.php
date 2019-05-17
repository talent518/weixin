<?php
require './WeixinChat.php';

$weixin = new WeixinChat();
$weixin->valid();
$weixin->getRev();

$revEvent = $weixin->getRevEvent();

if ( $revEvent ) {
	$event = $key = null;
	extract($revEvent, EXTR_OVERWRITE);
	switch ( $event ) {
		case 'click':
			switch ( $key ) {
				case 'news':
					$data = array(
						array(
							'title' => '习近平：干部要把焦裕禄精神作镜子照照自己', 
							'description' => '新华网郑州3月18日电  中共中央总书记、国家主席、中央军委主席习近平近日在河南省兰考县调研指导党的群众路线教育实践活动时强调，要准确把握第二批教育实践活动的总体要求、实践载体、重点对象、组织指导原则、特点规律，大力学习弘扬焦裕禄精神，坚持高标准严要求，在对标立规中查找差距，在上下互动中解决问题，在攻坚克难中提振信心，在思考辨析中把握规律，确保每个层级每个单位都真正取得实效。', 
							'picUrl' => 'http://news.xinhuanet.com/politics/2014-03/18/119829558_13951512652051n.jpg', 
							'url' => 'http://news.xinhuanet.com/politics/2014-03/18/c_119829558.htm'
						), 
						array(
							'title' => '马官方：机长副机长曾飞过北边走廊地带航线', 
							'description' => '中新网3月18日电 马来西亚方面18日就失去联系已10多天的MH370航班事件进展举行新一轮发布会，要点如下：一、空中搜索力量加大，得到多国卫星协助；二、搜索范围巨大，行动复杂，失联客机位于南北“走廊地带”某处可能性大；三、失联客机通信寻址系统很可能被人为关闭，凌晨1点半之前失去联系；四、搜救行动超越党派，政治放一边；五、否认马来成为恐怖主义袭击目标，机长副机长飞过北部“走廊地带”航线；六、泰国此前所测飞机与失联航班无关。', 
							'picUrl' => 'http://i2.sinaimg.cn/dy/w/2014-03-18/1395139116_Qi7ZeV.jpg', 
							'url' => 'http://news.sina.com.cn/w/2014-03-18/183629737102.shtml'
						), 
						array(
							'title' => '深度分析：京东零售O2O的潜在风险', 
							'description' => '京东做零售O2O的逻辑：以线上流量+物流配送+信息技术为切入口，采取O2O获取线下流量，和线下门店合作分成实现渠道下沉。其可能面临的困难包括：利益冲突（用户争夺、平台自营之争）；照顾不同业态门店的利益；移动、支付环节弱势。', 
							'picUrl' => 'http://d.hiphotos.baidu.com/news/crop%3D0%2C0%2C480%2C288%3Bw%3D638/sign=beeee4c622a446236a85ff22a5125e3e/203fb80e7bec54e7e51d84a2bb389b504ec26a9d.jpg', 
							'url' => 'http://huangyuanpu.baijia.baidu.com/article/7904'
						)
					);
					shuffle($data);
					$weixin->news($data);
					break;
				case 'vote':
					$data = array(
						array(
							'title' => '【投票】您对新行员培训还满意吗？', 
							'description' => '您还在等什么，赶快来参与吧，参与有奖哦！', 
							'picUrl' => 'http://news.xinhuanet.com/politics/2014-03/18/119829558_13951512652051n.jpg', 
							'url' => $weixin->getBaseUrl() . 'vote.php'
						)
					);
					shuffle($data);
					$weixin->news($data);
					break;
				case 'exam':
					$data = array(
						array(
							'title' => '【考试】调查问卷', 
							'description' => '上学的成绩如何！', 
							'picUrl' => 'http://news.xinhuanet.com/politics/2014-03/18/119829558_13951512652051n.jpg', 
							'url' => $weixin->getBaseUrl() . 'exam.php'
						)
					);
					shuffle($data);
					$weixin->news($data);
					break;
				default:
					$weixin->text('Click：' . $key);
			}
			break;
		case 'view': // 查看URL
		             // $content='正在查看URL：' . $key;
		             // $weixin->text($content);
		             // $weixin->sendCustomMessage($weixin->getRevFrom(), $content);
			break;
		case 'subscribe': // 关注
			$weixin->text('欢迎光临！' . strtr($key, ['qrscene_'=>'']));
			break;
		case 'unsubscribe': // 取消关注
			break;
		case 'scan':
			$weixin->text('scene_id: ' . $key);
			break;
	}
} else {
	$randString = array(
		'习近平：干部要把焦裕禄精神作镜子照照自己-abao', 
		'马官方：机长副机长曾飞过北边走廊地带航线-abao', 
		'深度分析：京东零售O2O的潜在风险-abao'
	);
	$weixin->text($randString[rand() % 3]);
}

$weixin->reply();