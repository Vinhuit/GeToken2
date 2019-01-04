<meta charset="utf-8" />
<title>Scan Members | VIPFBNOW.COM</title>
<?php
session_start();
include '../config.php';
if(!$_SESSION['admin']){
header('Location: index.php');
exit;
}
$req = mysql_query("SELECT * FROM `ACCOUNT` WHERE `kichhoat`=0");
while($res = mysql_fetch_assoc($req)){
$idxoa = $res['id'];
$tkxoa = $res['username'];
mysql_query("DELETE FROM `ACCOUNT` WHERE `id`='$idxoa'");
echo '<b>Đã Xóa '.$tkxoa.' Vì Không Kích Hoạt.</b><br>';
}
echo'<b>Không Có Tài Khoản Chưa Kích Hoạt</b>';
?>
