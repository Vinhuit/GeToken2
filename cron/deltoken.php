<?php
include '../config.php';
$gettoken = mysql_query("SELECT * FROM `token` ORDER BY RAND() LIMIT 0,100");
  while ($get = mysql_fetch_array($gettoken)){
  $token = $get['token'];
$check = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
if(!$check['id']){
@mysql_query("DELETE FROM token WHERE token ='".$token."'");
continue;
}}
echo 'Delete Token Done';
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
?>