<?php
include 'config.php';
$msg='';
if(!empty($_GET['code']) && isset($_GET['code']))
{
$code= $_GET['code'];
$c=mysql_query("SELECT id FROM ACCOUNT WHERE macode='$code'");
 
if(mysql_num_rows($c) > 0)
{
$count=mysql_query("SELECT id FROM ACCOUNT WHERE macode='$code' and kichhoat='0'");
 
if(mysql_num_rows($count) == 1)
{
mysql_query("UPDATE ACCOUNT SET kichhoat='1' WHERE macode='$code'");
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
$msg="<script>alert('Xác Minh Thành Công');</script>";
}
else
{
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
$msg ="<script>alert('Tài Khoản Đã Được Xác Minh Từ Trước');</script>";
}
 
}
else
{
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
$msg ="<script>alert('Xác Minh Thất Bại');</script>";
}
 
}
?>
<?php echo $msg; ?>
<meta http-equiv=refresh content="0; URL=/index.php">