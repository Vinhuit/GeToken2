<?php 
session_start();
include 'config.php';
include 'like_hethong/head.php';
?>

 


<?php if(!$_GET[edit]){  ?>
<meta http-equiv=refresh content="0; URL=/vipcmt.php">
<?php } ?>

<?php if($_GET[edit]){  ?>

<?php
$infouser = mysql_fetch_array(mysql_query("SELECT * FROM `vipcmt` WHERE `idfb` = '".$_GET[edit]."' LIMIT 1"));
if($infouser[user] != $_SESSION['id']){ ?>
<meta http-equiv=refresh content="0; URL=/vipcmt.php">
<?php } ?>



		<?php
			$like = array(0, 15, 20, 25, 30, 35, 40, 45);
			$req = mysql_query("SELECT * FROM `vipcmt` WHERE `idfb` = '".$_GET[edit]."'");
			while($tomdz = mysql_fetch_assoc($req)){
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
            <p><li class="list-group-item">ID Facebook : <b style="color:red"><?php echo $tomdz['idfb']; ?></b></li></p>
            <p><li class="list-group-item">Tên Hiển Thị : <b style="color:red"><?php echo htmlspecialchars($tomdz['name'], ENT_QUOTES, 'UTF-8'); ?></b></li></p>	
            <p><li class="list-group-item">Gói Like : <b style="color:red"><?php echo $like[$tomdz['goi']]; ?> Comment</b></li></p>	
			<p><li class="list-group-item">Thời Gian : <b style="color:red"><?php echo date("d-m-20y", $tomdz['time']); ?></b></li></p>
			<p><li class="list-group-item">Giới Hạn: <b style="color:red"><?php echo $tomdz['limitpost']; ?> Bài</b></li></p>
<p><li class="list-group-item">Tốc Độ Comment/Phút: <b style="color:red"><?php echo $tomdz['socmt']; ?> Comment</b></li></p>
			

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
                   <div class="panel-heading"><i class="fa fa-cogs"></i> CHĨNH SỮA INFO
</div>
<div class="panel-body">
<form action="" method="POST">
	<div class="form-group">
	  <label for="usr">ID Facebook:</label>
	  <input type="number" class="form-control" name="idfb" value="<?php echo strip_tags($tomdz['idfb']); ?>">
	</div>
	<div class="form-group">
	  <label for="usr">Tên Hiển Thị:</label>
	  <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($tomdz['name'], ENT_QUOTES, 'UTF-8'); ?>">
	</div>
<div class="form-group">
	  <label for="usr">Nội Dung:</label>
		 <textarea class="form-control" name="noidung" rows="5" placeholder="<?php echo htmlspecialchars($tomdz['noidung'], ENT_QUOTES, 'UTF-8'); ?>"></textarea>
	</div>
	<div class="form-group">
	  <label for="usr">Giới Hạn Bài Viết:</label>
		<select name="limitpost" class="form-control">
		<option value="5">5 bài</option>
		<option value="10">10 bài</option>
		<option value="20">20 bài</option>
		</select>
	</div>
	<div class="form-group">
	 <label for="usr">Số Comment Mỗi Lần Cron:</label>
		<select name="socmt" class="form-control">
					
					<option value="1">1 CMT</option>
					<option value="2">2 CMT</option>
					<option value="3">3 CMT</option>
					<option value="4">4 CMT</option>
					<option value="5">5 CMT</option>
					<option value="10">10 CMT</option>
					<option value="20">20 CMT</option>
                
                </select>
	</div>
	<button type="submit" name="edit" class="btn btn-danger">Chỉnh Sửa</button>
	<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Thông Tin</button>
</form>

<?php if (isset($_POST[edit])) {
$socmt = intval($_POST['socmt']);
$limitpost = intval($_POST['limitpost']);
$noidung = mysql_real_escape_string($_POST['noidung']);
if (($limitpost < 0) || ($limitpost > 20)){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
if (($socmt < 0) || ($socmt > 20)){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
mysql_query("UPDATE vipcmt SET `idfb` = '".intval($_POST[idfb])."', `socmt` = '".intval($_POST[socmt])."', `limitpost` = '".intval($_POST[limitpost])."', `name` = '".mysql_real_escape_string($_POST[name])."', `noidung` = '$noidung'
WHERE `idfb` = '" . mysql_real_escape_string($_GET[edit]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Chỉnh Sửa Cập Nhật Tài Khoản Thành Công!"); </script>');
} ?>
</div></div>  
  		<?php } ?>
<?php } ?>

</div></div></div>
<?php include 'like_hethong/foot.php'; ?>