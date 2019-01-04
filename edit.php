<?php 
session_start();
include 'config.php';
include 'like_hethong/head.php';
?>
<?php
if(!$_SESSION['user']){
?>
<meta http-equiv=refresh content="0; URL=/index.php">
<script>alert("ĐĂNG NHẬP ĐI BẠN"); </script>

<?php
}else{
?>

<?php if(!$_GET[edit]){  ?>
<meta http-equiv=refresh content="0; URL=/index.php">
<?php } ?>

<?php if($_GET[edit]){  ?>

<?php
$infouser = mysql_fetch_array(mysql_query("SELECT * FROM `VIP` WHERE `idfb` = '".$_GET[edit]."' LIMIT 1"));
if($infouser[user] != $_SESSION['id']){ ?>
<meta http-equiv=refresh content="0; URL=/index.php">
<?php } ?>



		<?php
			$like = array(0, 150, 300, 500, 700, 1000, 1500, 2000);
			$req = mysql_query("SELECT * FROM `VIP` WHERE `idfb` = '".$_GET[edit]."'");
			while($httdz = mysql_fetch_assoc($req)){
		?>
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-col-sm-4">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Thông Tin Thành Viên</h4>
        </div>
        <div class="modal-body">
        <div class="form-group">
            <p><li class="list-group-item">ID Facebook : <b style="color:red"><?php echo $httdz['idfb']; ?></b></li></p>
            <p><li class="list-group-item">Tên Hiển Thị : <b style="color:red"><?php echo htmlspecialchars($httdz['name'], ENT_QUOTES, 'UTF-8'); ?></b></li></p>	
            <p><li class="list-group-item">Gói Like : <b style="color:red"><?php echo $like[$httdz['goi']]; ?> Like</b></li></p>
<p><li class="list-group-item">Tốc Độ Like/Phút : <b style="color:red"><?php echo $httdz['solike']; ?> Like</b></li></p>		
			<p><li class="list-group-item">Thời Gian : <b style="color:red"><?php echo date("d-m-20y", $httdz['time']); ?></b></li></p>
				

		</div>
		</div>		
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-12">
                <div class="panel panel-default">
                   <div class="panel-heading">
<i class="fa fa-cogs"></i> CHỈNH SỬA INFO
</div>
                    <div class="panel-body">
<form action="" method="POST">
	<div class="form-group">
	  <label for="usr">ID Facebook:</label>
	  <input type="number" class="form-control" name="idfb" value="<?php echo strip_tags($httdz['idfb']); ?>">
	</div>
	<div class="form-group">
	  <label for="usr">Tên Hiển Thị:</label>
	  <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($httdz['name'], ENT_QUOTES, 'UTF-8'); ?>">
	</div>
	<div class="form-group">
	 <label for="usr">Tốc Độ Like/Phút:</label>
		<select name="solike" class="form-control">
		<option value="5">5 Like</option>
		<option value="10">10 Like</option>
		<option value="20">20 Like</option>
		<option value="30">30 Like</option>
		<option value="40">40 Like</option>
		<option value="50">50 Like</option>
		<option value="100">100 Like</option>
        </select>
	</div>
	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Thông Tin</button>
	<button type="submit" name="edit" class="btn btn-danger">Chỉnh Sửa</button>

</form>

<?php if (isset($_POST[edit])) {
$tonglike = intval($_POST['solike']);
$limitpost = intval($_POST['limitpost']);
if (($limitpost < 0) || ($limitpost > 50)){
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
if (($tonglike < 0) || ($tonglike > 100)){
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
mysql_query("UPDATE VIP SET `idfb` = '".intval($_POST[idfb])."', `solike` = '".intval($_POST[solike])."', `limitpost` = '".intval($_POST[limitpost])."', `name` = '".mysql_real_escape_string($_POST[name])."' WHERE `idfb` = '" . mysql_real_escape_string($_GET[edit]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Chỉnh Sửa Cập Nhật Tài Khoản Thành Công!"); </script>');
} ?>
</div></div>  
  		<?php } ?>
<?php } ?>

</div></div></div>
<?php } ?>
<?php include 'like_hethong/foot.php'; ?>