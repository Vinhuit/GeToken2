<?php
//**Config**//
include '../config.php';
include '../theme/css.php';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$facebook = isset($_POST['facebook']) ? $_POST['facebook'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$ten = isset($_POST['ten']) ? $_POST['ten'] : '';
$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
$avt = isset($_POST['avt']) ? $_POST['avt'] : '';
$about = isset($_POST['about']) ? $_POST['about'] : '';
{
$userhethong = mysql_result(mysql_query("SELECT COUNT(*) FROM `ACCOUNT` WHERE `username` ='".$username."'"), 0); 

if($userhethong == 0)
{
echo '<script>
swal(
  "Lỗi...",
  "Không có user!",
  "error"
);
  </script>'; 
}
else
{
mysql_query("UPDATE ACCOUNT SET `mail` = '".$mail."' WHERE `username`  ='".$username."'");
mysql_query("UPDATE ACCOUNT SET `fullname` = '".$ten."' WHERE `username`  ='".$username."'");
mysql_query("UPDATE ACCOUNT SET `sdt` = '".$sdt."' WHERE `username`  ='".$username."'");
mysql_query("UPDATE ACCOUNT SET `avt` = '".$avt."' WHERE `username`  ='".$username."'");
mysql_query("UPDATE ACCOUNT SET `about` = '".$about."' WHERE `username`  ='".$username."'");
mysql_query("UPDATE ACCOUNT SET `facebook` = '".$facebook."' WHERE `username`  ='".$username."'");
echo '<script>swal("Thành Công","Chỉnh Sửa Thành Công!!!","success");</script>';
}
exit;
}
include "../theme/js.php";
?>