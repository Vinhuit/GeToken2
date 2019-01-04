<?php
error_reporting(E_ALL);
set_time_limit(0);

include '../../config.php';

if(isset($_POST['token'])){
	
	$token = trim($_POST['token']);
	
/* KIỂM TRA TOKEN */
$info = json_decode(auto('https://graph.facebook.com/me?access_token='.trim($token)), true);


/* Kiểm Tra Loại Token */
$check = json_decode(auto('https://graph.facebook.com/app/?access_token='.trim($token).''), true);

if($check['id'] == '6628568379' || $check['id'] == '350685531728'){
	$iphone = 1;// iPhone
}else{ 
	$iphone = 0;
}


/* ĐẾM BẠN 
$link = 'https://graph.facebook.com/v2.8/me?fields=id%2Cten%2Cfriends&access_token='.trim($token).'';
$dem_ban=json_decode(auto($link),true);


*/

$time_cho_token = 300 + time();

if (strlen($info[id] > '2')){
$add++;	
$them = mysql_query('INSERT INTO `token` SET `idfb` = "'.$info[id].'",
									`ten` = "'.addslashes($info[name]).'",
									`token` = "'.trim($token).'"');		
								
								
								
								
if($them){
	$bien = 'Thêm';	
}	else {	
$updata++;
							
$capnhat = mysql_query('UPDATE `token` SET `token` SET `idfb` = "'.$info[id].'", `ten` = "'.addslashes($info[name]).'", `token` = "'.trim($token).'" WHERE `idfb` = "'.$info[id].'" ');
	if($capnhat){
		$bien = 'Cập nhật';	
	}else{
		$bien = 'Lỗi';	
	}										
}
								
	
$trave['access_token'] = $bien.' thành công ^_^';
}
else
{
$trave['error_msg'] = 'Thất bại !!!';
}
echo json_encode($trave);
}


function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }

?>