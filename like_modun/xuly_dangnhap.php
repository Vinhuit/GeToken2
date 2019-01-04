<?php
session_start();
//**Config**//
include '../config.php';
include './asets/css.php';
include './assets/js.php';

$username = isset($_POST['username']) ? htmlspecialchars(addslashes($_POST['username'])) : '';
$password = isset($_POST['password']) ?  htmlspecialchars(addslashes(md5($_POST['password']))) : '';
{
if($username && $password){
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `ACCOUNT` WHERE `username`="."'$username'"." AND `password`="."'$password'"), 0);
if($check < 1){
echo '<script>swal("Lỗi...","Đăng Nhập Không Thành Công! Sai tên đăng nhập hoặc mật khẩu","error");</script>'; 
}else{
$res = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `username`="."'$username'"." AND `password`="."'$password'"));
$_SESSION['user'] = $res['id'];
$_SESSION['id'] = $res['id'];
echo '<script>
swal(
  "Thành Công",
  "Đăng Nhập thành công!!",
  "success"
);
   </script>';
echo '<meta http-equiv=refresh content="2; URL=/index.php">';
}
}
exit;
}