<?php
session_start();
include '../config.php';
include './head.php';
include '../theme/css.php';
if(!$_SESSION['admin']) { 
echo '<meta http-equiv=refresh content="0; URL=/quanly.html">';
}
$get = mysql_fetch_assoc(mysql_query("SELECT * FROM `thongbao` WHERE `id`='1'"));
?>
<title>Thêm Thông Báo | VIPFBNOW.COM </title>
 <div class="col-lg-12">
 <div class="panel panel-default">
                   <div class="panel-heading"><b>Thay Đổi Thống Báo</b></div>
<div class="panel-body">
<form action="" method="POST">
	<div class="form-group">
	  <textarea type="text" class="form-control" name="text" id="text"><?php echo $get['text']; ?></textarea>
	</div>
	<button type="submit" name="thongbao" class="btn btn-danger">Đăng Thông Báo</button>
</form>
</div></div>
</div></div></div>
<?php 
if (isset($_POST[thongbao])) {
$text = trim(htmlspecialchars(addslashes($_POST['text'])));
mysql_query("UPDATE thongbao SET text = '$text', time = '".time()."' WHERE id = '1'");

echo '<meta http-equiv=refresh content="0; URL=/thongbao.php">';
die('<script>alert("Thay Đổi Thông Báo Thành Công!"); </script>');
}

include '../theme/js.php';
include '../like_hethong/foot.php'; 
?>