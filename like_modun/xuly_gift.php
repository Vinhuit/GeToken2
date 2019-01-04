<?php
//**Config**//
include '../config.php';
include './asets/css.php';
include './assets/js.php';

$mag = isset($_POST['txtgif']) ? $_POST['txtgif'] : '';
$user = isset($_POST['txtuser']) ? $_POST['txtuser'] : '';
{
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `Gift_LIKE` WHERE `magift` ='".$mag."'"), 0); 

if($tong == 0)
{
echo '<script>
swal(
  "Lỗi...",
  "['.date("H:i:s").'] Mã Sai Hoặc Đã Được Sử Dụng!",
  "error"
);
  </script>'; 
}
else
{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `Gift_LIKE` WHERE `magift` ='".$mag."' LIMIT 1"));
mysql_query("UPDATE `ACCOUNT` SET `vnd` = `vnd` + '".$info[menhgia]."' WHERE `username`  ='".$user."'");
mysql_query("INSERT INTO `LOG_GIFT` SET `nguoinhan` = '".$user."', `time`='".date("H:i:s")."', `magift`='".$mag."', `menhgia`='".$info[menhgia]."'");
mysql_query("DELETE FROM `Gift_LIKE` WHERE id='" . mysql_real_escape_string($info[id]) . "'");
echo '<script>
swal(
  "Thành Công",
  "['.date("H:i:s").'] Bạn đã nhận thành công mã gift LIKEFB mệnh giá '.$info[menhgia].' VNÐ",
  "success"
);
   </script>';
}
exit;
}