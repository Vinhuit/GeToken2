<?php 
include './config.php';
include './like_hethong/head.php';
?>
<?php
if(!$_SESSION['user']){
?>

<!-- chưa login -->
<?php
}else{
$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `id`=".$_SESSION['user'].""));
if($user['kichhoat'] <  1) { 
include 'bangtb.php';
} else {
?>
<?php
$cmt = array(0, 20, 40, 80, 120, 180, 240, 320, 500);
if(isset($_POST['submit'])){

$name = mysql_real_escape_string(htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8'));
$times = mysql_real_escape_string($_POST['time']);
$id = mysql_real_escape_string($_POST['idfb']);
$noidung = mysql_real_escape_string($_POST['noidung']);
$goi = intval($_POST['goi']);
$tongcmt = intval($_POST['socmt']);
$limitpost = intval($_POST['limitpost']);


if(!$name){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Chưa nhập tên người mua (( Profile/Fanpage )) ?"); </script>');
}
if(!$id){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Chưa Nhập ID Thì Sao có thể cài VIP CMT ?"); </script>');
}
if(!$noidung){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Chưa Nhập Nội Dung Thì Sao có thể cài VIP CMT?"); </script>');
}
if ($vnd[$goi] < 0){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Gói CMT Không Tồn Tại Trên Hệ Thống!"); </script>');
}
if ($user['vnd'] < 0){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Làm gì Còn Tiền mà Mua Đâu!"); </script>');
}
if (($tongcmt < 0) || ($tongcmt > 20)){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
if (($goi < 0) || ($goi > 8)){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}

if ($times == 30){
$vnd = array(0, 30000, 60000, 120000, 180000, 270000, 360000, 480000, 750000);
} elseif ($times == 60){
$vnd = array(0, 60000, 120000, 240000, 360000, 540000, 720000, 960000, 1500000);
} elseif ($times == 90){
$vnd = array(0, 90000, 180000, 360000, 540000, 810000, 1080000, 1440000, 2250000);
} elseif ($times < 0) {
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
} else {
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `vipcmt` WHERE `user`=".$user['id'].""), 0);
if($user['toida'] < $check) {
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Bạn đã sử dụng tối đa ID!"); </script>');
} elseif($user['vnd'] < $vnd[$goi]){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Bạn KHông đủ tiền!"); </script>');
} else {
mysql_query("UPDATE `ACCOUNT` SET `vnd`=`vnd`-'".intval($vnd[$goi])."' WHERE `id`=".$user['id']."");

$timecmt = time() + $times * 24 * 3600;

mysql_query("INSERT INTO `vipcmt` SET `idfb`='$id', `name`='$name', `user`=".$_SESSION['user'].", `noidung`='$noidung', `goi`='$goi', `socmt`='$tongcmt', `time`='$timecmt', `limitpost`='$limitpost'");
$nguoiadd = $user['username'];
mysql_query("INSERT INTO `LOG_BUY` SET `nguoiadd`='$nguoiadd', `goi`='$goi',`loaivip`='Comment',`idvip`='$id',`thoigian`='".date("H:i:s d/m/Y")."'");
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Thêm vip thành công!"); </script>');
}
}
?>
<div class="col-lg-6">
 <div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i> CÀI ĐẶT VIP COMMENT</b>
                        </div>
<div class="panel-body">
        <form action="" method="POST">
<div class="form-group">
<label>ID mới cần thêm:</label>            
<input type="number" class="form-control" name="idfb" required="" autofocus="">
            </div>
            
        <div class="form-group">
<label>Tên Fanpage/Profile :</label>
<input type="text" class="form-control" name="name" required="" autofocus="">
            </div>
        <div class="form-group">
<label>Thời Hạn</label>
               <select name="time" id="time" class="form-control">
                        <option value="30">1 Tháng</option>
                        <option value="60">2 Tháng</option>
                        <option value="90">3 Tháng</option>
                    </select>
            </div>
       <div class="form-group">
<label>Số Status/1 Ngày</label>
            <select name="limitpost" class="form-control">
                    <option value="5">5 bài</option>
					<option value="10">10 bài</option>
					<option value="20">20 bài</option>
					<option value="30">30 bài</option>
				<option value="50">50 bài</option>
                </select>
            </div>
        <div class="form-group">
<label>Số CMT/1 Phút</label>         
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
        <div class="form-group">
<label>Nội Dung CMT</label><textarea class="form-control" id="noidung" name="noidung" rows="5" placeholder="Nhập nội dung, Random mỗi dòng 1 CMT" required="" autofocus=""></textarea>
                        </div>
                     <div class="form-group">
<label>Số CMT Mua</label>            
		<select name="goi" id="goi" class="form-control">
			  <option value="1">20 Bình Luận</option>
			  <option value="2">40 Bình Luận</option>
			  <option value="3">80 Bình Luận</option>
			  <option value="4">120 Bình Luận</option>
			  <option value="5">180 Bình Luận</option>
			  <option value="6">240 Bình Luận</option>
			  <option value="7">320 Bình Luận</option>
			  <option value="8">500 Bình Luận</option>
		</select></div>
           <b>Thành Tiền</b></td>
		<td>	
		<div class="form-control">
		  <label id="dola" for="dola">Giá tiền: 270,000 VNĐ</label>
		</div>
		</br>       
			<button type="submit" name="submit" class="btn btn-danger">Cài VIP CMT</button>
			<button name="tinhtien" type="button" class="btn btn-danger" onclick="getItems()">Tính Tiền</button>
			<script type="text/javascript">
			function getItems()
			 {
			var time = document.getElementById("time").value;
			var goi = document.getElementById("goi").value;
			var sotien = httpGet("like_hethong/tinhtiencmt.php?cmt="+goi+"&ngay="+time);
			document.getElementById('dola').innerHTML  = "Giá tiền: "+sotien +" VNĐ";
			 }
			 getItems(); 
			  function httpGet(theUrl)
			{
				var xmlHttp = new XMLHttpRequest();
				xmlHttp.open( "GET", theUrl, false ); // false for synchronous request
				xmlHttp.send( null );
				return xmlHttp.responseText;
			}
			</script>
				</td>
        </tr>
    </tbody>
</table> 
                                    </form>
              
      </div>
    </div>
  </div>

<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `vipcmt` WHERE `user`=".$user['id'].""), 0);
?>
<div class="col-lg-6">
 <div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i> Danh Sách ID VIP CMT
<span data-toggle="tooltip" title="" class="pull-right badge bg-yellow" data-original-title="<?php echo $tong ?> ID VIP"><?php echo $tong ?> ID VIP</span></b>
                        </div>
<div class="panel-body">                   
<div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID VIP</th>
              <th>Họ Tên</th>
              <th>Gói CMT</th>
              <th>Số Stt/Ngày</th>
              <th>Hạn Sử Dụng</th>                            
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
<?php
$req = mysql_query("SELECT `idfb`, `name`, `goi`, `limitpost`, `socmt`, `time` FROM `vipcmt` WHERE `user`=".$user['id']."");
while($res = mysql_fetch_assoc($req)){
$end = date('d/m/Y', $res['time']);
?>
<tr><td><?php echo $res['idfb']; ?></td>
<td><?php echo $res['name']; ?></td>
<td><?php echo $cmt[$res['goi']]; ?> CMT</td>
<td><?php echo $res['limitpost']; ?> Bài</td>
<td><?php echo $end; ?></td> 
<td>
<a href="/editcmt.php?edit=<?php echo $res['idfb']; ?>" data-toggle="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="Chỉnh Sửa"><i style="font-size:15px;" class="fa fa-edit"></i></a>
<a href="/vipcmt.php?xoa=<?php echo $res['idfb']; ?>" data-toggle="tooltip" title="Xóa ID" class="btn btn-danger btn-simple btn-xs"><i style="font-size:15px;" class="fa fa-times"></i></a>
              </td></tr>                    
<?php
}
?>
</tbody>
        </table>

       </div>
        </div>
    </div>
         </div>
        </section>
    </div>








<?php
}
}
if($_GET[xoa]){
$infongdung = mysql_fetch_array(mysql_query("SELECT * FROM `vipcmt` WHERE `idfb` = '".$_GET[xoa]."' LIMIT 1"));
if($infongdung[user] != $_SESSION['id']){
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Không thể xóa Tài Khoản của người khác!"); </script>');
} else {
mysql_query("DELETE FROM `vipcmt` WHERE idfb='" . mysql_real_escape_string($_GET[xoa]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/vipcmt.php">';
die('<script>alert("Xóa Tài Khoản Thành Công!"); </script>');
exit;
}
}
include './like_hethong/foot.php';
?>
