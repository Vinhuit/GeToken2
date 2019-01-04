<?php
/** Giữ nguyên nội dung này! Tôn Trọng Quyền Tác Giả
 ** Class name: VipFbNow.Com
 ** Author: Đỗ Duy Thịnh - fb.com/100006670751625
 ** Date: 20/08/2017 
 ** Tested: OK 20/10/2017 09:00:00
 */
include '../config.php';
$like = array(0, 150, 300, 500, 700, 1000, 1500, 2000);

$res  = mysql_query("SELECT `idfb`, `solike`, `goi` FROM `VIP` WHERE idfb ORDER BY RAND()");

while ($post = mysql_fetch_array($res)) {	
		$tonglike = $post['solike'];			
		$token = array();
		$result = mysql_query("SELECT * FROM token ORDER BY RAND() LIMIT 0,$tonglike");
		if ($result) {
			while ($row = mysql_fetch_array($result)) {
				$token[] = $row['token'];
			}
		}	
	$get = get_post($post['idfb'], $token[array_rand($token)]);
	if ($get != 0) {
		$slLike  = $get['data'][0]['likes']['count'];
		$id_post = $get['data'][0]['id'];
	} else {
		continue;
	}
	if ($slLike <= $like[$post['goi']]) {
		for ($i = 0; $i < $tonglike; $i++) {
				$data='https://graph.facebook.com/'.$id_post.'/likes?access_token='.trim($token[$i]).'&method=post';
			$stat= file_get_contents($data);
			var_dump($id_post);	
			var_dump($stat);			
		}   
		
		sleep(0.5);
	}
	

	
}
function get_post($userID, $token)
{
	$get_post = file_get_contents('https://graph.facebook.com/' . $userID . '/feed?limit=1&access_token=' . trim($token));
	$get_post = json_decode($get_post, true);
	
	if ($get_post['data'][0]['id']) {
		return $get_post;
	} else {
		return 0;
	}
}
?>