<?php
session_start();
if(!$_SESSION['admin']) 
{
	header('Location: /panel');
}
include'../config.php';
include'./head.php';
?>
<title>Active Members | VIPFBNOW.COM </title>
<div class="col-lg-12">
  <div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i> Duyệt Kích Hoạt Nick</b>
                        </div>
<div class="panel-body">
<form action="" method="POST">
	<div class="form-group">
	  <label for="usr">Username:</label>
	  <input type="text" class="form-control" name="username">
	</div>
	<button type="submit" name="kichhoat" class="btn btn-danger">Kích Hoạt</button>
</form>
</div></div>
</div></div></div>
<?php 
if (isset($_POST[kichhoat])) {
mysql_query("UPDATE ACCOUNT SET `kichhoat` = 1 WHERE `username` = '".$_POST[username]."'");

echo '<meta http-equiv=refresh content="0; URL=/AdminCP/kichhoat.php">';
die('<script>alert("Kích Hoạt Thành Công!"); </script>');
}
include '../theme/js.php';
include '../like_hethong/foot.php';
?>