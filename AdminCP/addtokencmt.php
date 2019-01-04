<?php
include '../config.php';
$table = 'tokencmt';
$graph = 'https://graph.facebook.com/';
$success = 0;
if(isset($_POST['list'])){
foreach(explode("\n", $_POST['list']) as $token){
//Check info 
$info = cURL($graph.'me?access_token='.trim($token), false, true);
if(@$info->error) continue;
$r = mysql_query('SELECT * FROM '.$table.' WHERE idfb = "'.addslashes($info->id).'"');
if(mysql_num_rows($r) > 0) continue;
mysql_query('INSERT INTO '.$table.'(idfb,ten,token) VALUES("'.addslashes($info->id).'", "'.addslashes($info->name).'", "'.trim(addslashes($token)).'")');
++$success;
}
print '<script>alert("Nạp thành công: '.count(explode("\n", $_POST['list'])).' '.$success.' token")</script>';
}
//Đổi file .php
function cURL($u, $pArray = false, $json = false){
$s = curl_init();
$options = array(
CURLOPT_URL => $u,
CURLOPT_RETURNTRANSFER => true,
CURLOPT_SSL_VERIFYPEER => false,
CURLOPT_FOLLOWLOCATION => true
);
if($pArray){
$options[CURLOPT_POST] = true;
$options[CURLOPT_POSTFIELDS] = http_build_query($pArray);
}
curl_setopt_array($s, $options);
$r = curl_exec($s);
curl_close($s);
if($json) return json_decode($r);
return $r;
}
?>
<!DOCTYPE html>
<html lang="vi-vn">
<head>
<meta charset="utf-8" />

<title>Nạp Token</title>
<style>
html, body{
background: #1a1a1a;
color: #fff;
}
*{
color: #fff;
-moz-transition: 0.5s all;
-webkit-transition: 0.5s all;
transition: 0.5s all;
}
*:hover{
color: #ccc;
}
input, textarea, select{
border: 1px solid #ccc;
border-radius: 3px;
background: #000;
color: #fff;
padding: 3px;
display: block;
}
input[type=submit]:hover{
background: linear-gradient(#000, #ccc);
color: linear-gradient(#ccc,#000);
}
input:focus, textarea:focus, input:hover{
box-shadow: 0 0 0 2px #389eb5;
}
</style>
</head>
<body>
<h3>Nạp Token</h3>
Token Đã Nạp: <?php echo mysql_num_rows(mysql_query("SELECT `id` FROM `tokencmt`")); ?>
<hr/>
<form method="POST">
<textarea name="list" cols="60" rows="15"></textarea>
<input type="submit" value="Kiểm Tra và nạp" />
</form>
</body>
</html>