<meta http-equiv="refresh" content="59">
    
<?php
include 'config.php';
$like = array(0, 150, 300, 500, 700, 1000, 1500, 2000);
$req = mysql_query("SELECT `idfb`, `solike`, `goi` FROM `VIP` WHERE idfb ORDER BY RAND()"); 
while($res = mysql_fetch_assoc($req)){
$idfb = $res['idfb'];
$tonglike = $res['solike'];
$result = mysql_query("SELECT * FROM token ORDER BY RAND() LIMIT 20,$tonglike");
if($result){
while($row = mysql_fetch_array($result))
  {
$access_token = $row[token];
$name_token = $row[ten];
$maxlike = $like[$res['goi']];
echo $access_token ;
//**trang**//

?>