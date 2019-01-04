<meta http-equiv="refresh" content="59">
    
<?php
include '../config.php';
$like = array(0, 150, 300, 500, 700, 1000, 1500, 2000);
$req = mysql_query("SELECT `idfb`, `solike`, `goi` FROM `VIP` WHERE idfb ORDER BY RAND()"); 
while($res = mysql_fetch_assoc($req)){
$idfb = $res['idfb'];
$tonglike = $res['solike'];
$result = mysql_query("SELECT * FROM token ORDER BY RAND() LIMIT 0,$tonglike");
if($result){
while($row = mysql_fetch_array($result))
  {
$access_token = $row[token];
$name_token = $row[ten];
$maxlike = $like[$res['goi']];
//**trang**//
$trang = auto('https://graph.facebook.com/'.$idfb.'/feed?limit=1&access_token='.$access_token);
$arraytrang = json_decode($trang, true);
$trangid = $arraytrang[data][0][id];
$countlike = $arraytrang[data][0][likes][count];
		if($countlike <= $maxlike){
			auto('https://graph.facebook.com/'.$trangid.'/likes?method=post&access_token='.$access_token);
		}
//**trangEnd**//
echo 'Tang Like ID <b style="color:red">'.$trangid.'</b> - Success <b style="color:green">'.$countlike.'</b>/<b style="color:red">'.$like[$res['goi']].'</b> - Cho <b style="color:green">'.$idfb.'</b><br>';
}}}

$infos = mysql_fetch_array(mysql_query("SELECT * FROM `VIP`"));
if (time() > $infos['time']) {
mysql_query("DELETE FROM `VIP` WHERE `time` = `". $infos['time']."` < ".time()."");
}


function auto($url){
$data = curl_init();
		curl_setopt($data, CURLOPT_URL, $url);
		curl_setopt($data, CURLOPT_RETURNTRANSFER, true);
	    curl_setopt($data, CURLOPT_SSL_VERIFYPEER, false);
	    curl_setopt($data, CURLOPT_SSL_VERIFYHOST, false);
		return curl_exec($data);
		curl_close($data);
}
?>