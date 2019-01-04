<?php 
session_start();
include '../config.php';
include './head.php';
?>
<div class="container htt" style="margin-top: 70px;">

<?php if(!$_SESSION['admin']){
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Không thể chỉnh sửa được ID người khác nhé!."); </script>');
} ?>
<?php if(!$_GET[edit]){ 
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Không thể chỉnh sửa được ID người khác nhé!."); </script>');
} ?>


<?php if($_GET[edit]){  ?>
		<?php
			$like = array(0, 150, 300, 500, 700, 1000, 1500, 2000);
			$req = mysql_query("SELECT * FROM `VIP` WHERE `idfb` = '".$_GET[edit]."'");
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
            <p><li class="list-group-item">Gói Like : <b style="color:red"><?php echo $like[$tomdz['goi']]; ?> Like</b></li></p>	
			<p><li class="list-group-item">Thời Gian : <b style="color:red"><?php echo date("d-m-20y", $tomdz['time']); ?></b></li></p>
				

		</div>
		</div>		
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Đóng</button>
        </div>
      </div>
    </div>
  </div>
  
                <div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i>Chỉnh Sửa Thông Tin ID VIP</b>
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
	  <label for="usr">Gói Like:</label>
		 <select name="goi" class="form-control">
		 <option value="1">150 like</option>
			  <option value="2">300 like</option>
			  <option value="3">500 like</option>
			  <option value="4">700 like</option>
			  <option value="5">1.000 like</option>
			  <option value="6">1.500 like</option>
			  <option value="7">2.000 like</option>
		 </select>
	</div>	
	
	<div class="form-group">
	  <?php
		$timevip = $tomdz['time'];
		$conlai = $timevip - time();
		$vip = round($conlai/(24*3600));
	  ?>
	  <label for="usr">Ngày sử dụng (Còn <b style="color:red"><i class="fa fa-history" aria-hidden="true"></i> <?php echo $vip.' Ngày'; ?></b>):</label> <br/>
	  
	  <input type="number" class="form-control" name="time" value="<?php echo $vip; ?>">
	</div>
	
	<?php /* <div class="form-group">
	  <label for="usr">Ngày sử dụng :</label>
		<select name="time" class="form-control">
		<option value="1">1 Ngày</option>
		<option value="3">3 Ngày</option>
		<option value="7">7 Ngày</option>
		<option value="15">15 Ngày</option>
		<option value="30">30 Ngày</option>
		<option value="60">60 Ngày</option>
		<option value="90">90 Ngày</option>
		<option value="120">120 Ngày</option>
		</select>
	</div> */ ?>
	
	<button type="submit" name="edit" class="btn btn-danger">Chỉnh Sửa</button> <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">Thông Tin</button>

</form>

<?php if (isset($_POST[edit])) {


$times = time()+ intval($_POST['time']) * 24 * 3600;

/*if($_POST['time'] == 1){
$times = time()+1*24*3600;
} elseif($_POST['time'] == 3) {
$times = time()+3*24*3600;
} elseif($_POST['time'] == 7) {
$times = time()+7*24*3600;
} elseif($_POST['time'] == 15) {
$times = time()+15*24*3600;
} elseif($_POST['time'] == 30) {
$times = time()+30*24*3600;
} elseif($_POST['time'] == 60) {
$times = time()+60*24*3600;
} elseif($_POST['time'] == 90) {
$times = time()+90*24*3600;
} elseif($_POST['time'] == 120) {
$times = time()+120*24*3600;
}*/

$idfb = mysql_real_escape_string($_POST['idfb']);
$name = mysql_real_escape_string(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'));
$botcx = intval($_POST['camxuc']);
$tonglike = intval($_POST['solike']);
$limitpost = intval($_POST['limitpost']);

$idfb = mysql_real_escape_string($_POST['idfb']);
$name = mysql_real_escape_string(htmlspecialchars($_POST['name'], ENT_QUOTES, 'UTF-8'));
$botcx = intval($_POST['camxuc']);
$goi = intval($_POST['goi']);
$tonglike = intval($_POST['solike']);
$limitpost = intval($_POST['limitpost']);

if (($tonglike < 0) || ($tonglike > 100)){
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
if (($botcx < 0) || ($botcx > 7)){
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
if (($goi < 0) || ($goi > 7)){
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}

mysql_query("UPDATE VIP SET `idfb` = '".intval($_POST[idfb])."' , `goi` = '".mysql_real_escape_string($_POST[goi])."', `time` = '".mysql_real_escape_string($times)."' WHERE `idfb` = '" . mysql_real_escape_string($_GET[edit]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Chỉnh Sửa Cập Nhật Tài Khoản Thành Công!"); </script>');
} ?>
</div></div>  
  		<?php } ?>
<?php } ?>

</div></div>
<? include './foot.php';?>