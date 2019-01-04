<!doctype html>
<head>
<html lang="vi">
<meta charset="UTF-8" />
</head>

<?php
/** Giữ nguyên nội dung này! Tôn Trọng Quyền Tác Giả
 ** Class name: VipFbNow.Com
 ** Author: Đỗ Duy Thịnh - fb.com/100006670751625
 ** Date: 20/08/2017 
 ** Tested: OK 20/10/2017 09:00:00
 */
 
ob_start();
session_start();
set_time_limit(30);

require("../config.php");


function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
}


echo '<title>CR - BOT BÌNH LUẬN</title>';

/* Tự dộng xóa log khi sang ngày mới */
mysql_query("DELETE FROM `bots_log` WHERE `ngay` != '".date('d/m/Y')."' AND `loai` = 'binh_luan' ");


/* Tự dộng xóa bots khi hết hạn */
mysql_query("DELETE FROM `binhluan` WHERE `time` < '".time()."' ");	


/* Gọi dữ liệu */

$limit_bots = 4; // Số lượng BOTs chạy đồng thời
$limit_post = 5; // Số lượng bài viết chạy 1 lần
$binhluan_timecho = 300 + time(); // Thời gian chờ giữa 2 lần chạy

$kt_bots = mysql_fetch_array(mysql_query("SELECT stt, COUNT(stt) FROM `binhluan` where `binhluan_timecho` < '".time()."'
																					and `time` > '".time()."'"));																
																							
if ($kt_bots['COUNT(stt)'] <=  0){

			echo '<h2><center><font color="red">Chưa có BOTs nào đến thời gian chạy :P !!!</h2></font></center>';			
		}



$data = mysql_query("SELECT * FROM `binhluan` where `binhluan_timecho` < '".time()."'
											and `time` > '".time()."' 	ORDER BY RAND() LIMIT $limit_bots");												
while ($data_token = mysql_fetch_array($data)){
	


	
	echo '<div class="col-sm-2 col-xs-12"><div class="panel panel-info">';
	echo '<div class="panel-body">';


	/* HIỂN THỊ THÔNG TIN NICK CHẠY */
echo '<center><font color="blue"><h2>'.$data_token[name].'</h2></font></center><hr>';

	/* KIỂM TRA TOKEN DIE OR LIVE */
$kt_token=json_decode(auto('https://graph.facebook.com/me?access_token='.$data_token[access_token].''),true);
	if($kt_token['id'] <= 0){
		echo '<hr><font color="red">Token chết !!!</font>';
	echo '</div></div></div>';
		
	}else{
		
	$home = json_decode(auto('https://graph.facebook.com/me/home?fields=id,message,created_time,from,comments,type&access_token='.$data_token[access_token].'&offset=0&limit='.$limit_post.''),true);
	/* echo print_r($home);
	/echo '<hr>'; */
	
	for($i=1;$i<=count($home[data]);$i++){
	
	$kt_baiviet = mysql_fetch_array(mysql_query("SELECT stt, COUNT(stt) FROM `bots_log` WHERE `id_baiviet` = '".$home[data][$i-1][id]."' 
																							AND `loai` = 'binh_luan' 
																							AND `access_token` = '".$data_token[access_token]."'"));																
																							
if ($kt_baiviet['COUNT(stt)'] <=  0){

	$data_2 = explode("\n", $data_token['noidung']);
	$cmt_nd = $data_2[rand(0,count($data_2)-1)];

$chay =  json_decode(auto('https://graph.facebook.com/'.$home[data][$i-1][id].'/comments?message='.urlencode($cmt_nd).'&access_token='.$data_token[access_token].'&method=post'),true);
/*
echo print_r($chay);
echo '<hr>';
echo $home[data][$i-1][id].' nội dung '.$cmt_nd;
echo '<hr>'; 
*/

	if(strlen($chay[id]) > 1){
		
			$luu_log = mysql_query("insert into `bots_log` set 	`id_baiviet` = '".$home[data][$i-1][id]."',
																`ngay` = '".date('d/m/Y')."',
																`access_token` = '".$data_token[access_token]."',
																`loai` = 'binh_luan'");	
			if($luu_log){
				echo '<hr><font color="green">Đang chạy <3</font>';
				
				$capnhat_timecho = mysql_query("UPDATE `binhluan`  SET 	`binhluan_timecho` = '".$binhluan_timecho."'
																WHERE `access_token` = '".$data_token[access_token]."'");

			}else{
				echo '<hr><font color="red">Lưu log hất bại !!!</font>';
			}
	}else{
		
				echo '<hr><font color="red">Thất bại !!!</font>';
				echo '<hr>'; 
				echo print_r($chay);
				echo '<hr>'; 
				// Đoạn này giúp bỏ qua những nick bị chặn
				$capnhat_timecho = mysql_query("UPDATE `binhluan`  SET 	`binhluan_timecho` = '".$binhluan_timecho."'
																WHERE `access_token` = '".$data_token[access_token]."'");

			}	
		}else{
			echo '<hr><font color="red">Đã chạy rồi !!!</font>';			
		}
}
		
echo '</div></div></div>';
	
	}


}	
		

?>