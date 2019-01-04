<?php
include '../config.php';

header('Content-Type: text/html; charset=utf-8');
$like = array(0, 150, 300, 500, 700, 1000, 1500, 2000);
$req = mysql_query("SELECT `idfb`, `solike`, `goi` FROM `VIP` ORDER BY RAND()");
while($res = mysql_fetch_assoc($req)){
$idfb = $res['idfb'];
$tonglike = $res['solike'];
$reqt = mysql_query("SELECT * FROM `token` ORDER BY RAND() LIMIT 0,$tonglike");
while($rest = mysql_fetch_assoc($reqt)){
$token = $rest['token'];
$stat = json_decode(file_get_contents('https://graph.facebook.com/'.$idfb.'/feed?fields=id,likes&access_token='.$token.'&limit=1'),true);
		$countlike = $stat[data][0][likes][count];
		if($countlike <= $like[$res['goi']]){
			for($i=1;$i<=count($stat['data']);$i++){
				echo 'Tang Like ID <b style="color:red">'.$idfb.'</b> - Success <b style="color:green">'.$countlike.'</b>/<b style="color:red">'.$like[$res['goi']].'</b> - Đang Chạy Like - Tình Trạng <b style="color:blue">' . auto('https://graph.facebook.com/'.$stat['data'][$i-1]['id'].'/likes?access_token='.$token.'&method=post') .'</b><br/>';
				
			}
		}
}
}
$infos = mysql_fetch_array(mysql_query("SELECT * FROM `VIP`"));
if (time() > $infos['time']) {
mysql_query("DELETE FROM `VIP` WHERE `time` = `". $infos['time']."` < ".time()."");
}

function auto($url) {
   $ch = curl_init();
   curl_setopt_array($ch, array(
      CURLOPT_CONNECTTIMEOUT => 5,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_URL            => $url,
      )
   );
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
}