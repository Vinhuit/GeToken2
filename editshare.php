<?php 
session_start();
include 'config.php';
include 'like_hethong/head.php';
?>
<?php
if(!$_SESSION['user']){
?>
<meta http-equiv=refresh content="0; URL=/index.php">
<script>alert("ĐĂNG NHẬP ĐI BẠN :D"); </script>

<?php
}else{
?>

<?php if(!$_GET[edit]){  ?>
<meta http-equiv=refresh content="0; URL=/index.php">
<?php } ?>

<?php if($_GET[edit]){  ?>

<?php
$infouser = mysql_fetch_array(mysql_query("SELECT * FROM `vipshare` WHERE `idfb` = '".$_GET[edit]."' LIMIT 1"));
if($infouser[user] != $_SESSION['id']){ ?>
<meta http-equiv=refresh content="0; URL=/index.php">
<?php } ?>



		<?php
			$share = array(0, 60, 100, 160, 260, 380, 560, 720);
			$req = mysql_query("SELECT * FROM `vipshare` WHERE `idfb` = '".$_GET[edit]."'");
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
            <p><li class="list-group-item">Gói Share : <b style="color:red"><?php echo $share[$httdz['goi']]; ?> Share</b></li></p>
<p><li class="list-group-item">Tốc Độ Share/Phút : <b style="color:red"><?php echo $httdz['soshare']; ?> Share</b></li></p>		
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
	 <label for="usr">Tốc Độ Share/Phút:</label>
		<select name="soshare" class="form-control">
		<option value="5">5 Share</option>
		<option value="10">10 Share</option>
		<option value="20">20 Share</option>
		<option value="30">30 Share</option>
		<option value="40">40 Share</option>
		<option value="50">50 Share</option>
		<option value="100">100 Share</option>
        </select>
	</div>
	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Thông Tin</button>
	<button type="submit" name="edit" class="btn btn-danger">Chỉnh Sửa</button>

</form>

<?php if (isset($_POST[edit])) {
$tonglshare = intval($_POST['soshare']);
$limitpost = intval($_POST['limitpost']);
if (($limitpost < 0) || ($limitpost > 50)){
echo '<meta http-equiv=refresh content="0; URL=/vipshare.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
if (($tongshare < 0) || ($tongshare > 100)){
echo '<meta http-equiv=refresh content="0; URL=/vipshare.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
mysql_query("UPDATE vipshare SET `idfb` = '".intval($_POST[idfb])."', `soshare` = '".intval($_POST[soshare])."', `limitpost` = '".intval($_POST[limitpost])."', `name` = '".mysql_real_escape_string($_POST[name])."' WHERE `idfb` = '" . mysql_real_escape_string($_GET[edit]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Chỉnh Sửa Cập Nhật Tài Khoản Thành Công!"); </script>');
} ?>
</div></div>  
  		<?php } ?>
<?php } ?>

</div></div></div>
<?php } ?>
<?php include 'like_hethong/foot.php'; ?>