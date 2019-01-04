<?php

include 'config.php';

set_time_limit(0);

$token = '
'; 
$table='token'; 

$insert = $update = 0;

$data  = explode("\n", $token);

foreach ($data as $token) {
   $me = cek(trim($token));

   if ($me['id']) {
      if (mysql_num_rows(mysql_query("SELECT `ten` FROM ".$table." WHERE idfb = '" . mysql_real_escape_string($me['id']) . "'"))) {
         mysql_query("UPDATE ".$table." SET `token` = '" . mysql_real_escape_string($token) . "' WHERE `idfb` = " . $me['id'] . "");
         ++$insert;
      } else {
         mysql_query("INSERT INTO ".$table." SET
               `idfb` = '" . mysql_real_escape_string($me['id']) . "',
               `ten` = '" . mysql_real_escape_string($me['name']) . "',
               `token` = '" . mysql_real_escape_string($token) . "'
         ");
         ++$update;
      }
   }
}

echo 'UPDATE ' . $insert;
echo '<br>INSERT ' . $update;

function cek($o) {
   return json_decode(auto('https://graph.facebook.com/me?access_token='.$o),true);
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

?>