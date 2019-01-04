<?php
DS('http://vipfbnow.com/cronjobs/tangcmt.php');
DS('http://vipfbnow.com/cronjobs/tangcmt2.php');
DS('http://vipfbnow.com/cronjobs/tangcmt3.php');
DS('http://vipfbnow.com/cronjobs/tangcmt4.php');
DS('http://vipfbnow.com/cronjobs/tangcmt5.php');
DS('http://vipfbnow.com/cronjobs/tangcmt6.php');
function DS($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
?>