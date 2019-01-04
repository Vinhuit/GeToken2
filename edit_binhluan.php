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
$infouser = mysql_fetch_array(mysql_query("SELECT * FROM `binhluan` WHERE `access_token` = '".$_GET[edit]."' LIMIT 1"));
if($infouser[user] != $_SESSION['id']){ ?>
<meta http-equiv=refresh content="0; URL=/index.php">
<?php } ?>



		<?php
			
			$req = mysql_query("SELECT * FROM `binhluan` WHERE `access_token` = '".$_GET[edit]."'");
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
            
<p><li class="list-group-item">Nội Dung Binh luận : <b style="color:red"><?php echo '<textarea rows="1" type="text" class="form-control" name="noidung" value="" placeholder=" Nội dung bình luận ..." style="width: 100%">'.$httdz['noidung'].'</textarea>'; ?></li></p>		
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
                   <div class="panel-heading"><i class="fa fa-cogs"></i> CHỈNH SỬA INFO
</div>
                    <div class="panel-body">
<form action="" method="POST">
	<div class="form-group">
	  <label for="usr">Access Token:</label>
	  <input type="text" class="form-control" name="token" value="<?php echo strip_tags($httdz['access_token']); ?>">
	</div>
	<div class="form-group">
	  <label for="usr">Tên Hiển Thị:</label>
	  <input type="text" class="form-control" name="name" value="<?php echo htmlspecialchars($httdz['name'], ENT_QUOTES, 'UTF-8'); ?>">
	</div>
    <div class="form-group">
<label>Nội Dung Bình Luận: (Mỗi nội dung cách nhau 1 dòng)</label>
<textarea rows="1" type="text" class="form-control" name="noidung" value="" placeholder=" Nội dung bình luận ..." style="width: 100%"><? echo $httdz['noidung']; ?></textarea>          
	</div>
	
	<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">Thông Tin</button>
	<button type="submit" name="edit" class="btn btn-danger">Chỉnh Sửa</button>

</form>

<?php if (isset($_POST[edit])) {
$token = $_POST['token'];
$name = $_POST['name'];
$noidung = $_POST['noidung'];

mysql_query("UPDATE binhluan SET `access_token` = '$token', `noidung` = '$noidung',  `name` = '$name' WHERE `access_token` = '" . mysql_real_escape_string($_GET[edit]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Chỉnh Sửa Cập Nhật Tài Khoản Thành Công!"); </script>');
} ?>
</div></div>  
  		<?php } ?>
<?php } ?>

</div></div></div>
<?php } ?>
<?php include 'like_hethong/foot.php'; ?>