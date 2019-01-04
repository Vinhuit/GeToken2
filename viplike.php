<?php
include 'config.php';
include 'like_hethong/head.php';

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
$like = array(0, 150, 300, 500, 700, 1000, 1500, 2000);
if(isset($_POST['del'])){
$id = htmlspecialchars($_POST['id']);
mysql_query("DELETE FROM `VIP` WHERE `user`=".$user['id']." AND `idfb`='$id'");
}
if(isset($_POST['submit'])){
$times = mysql_real_escape_string($_POST['time']);
$id = mysql_real_escape_string($_POST['id']);
$name = mysql_real_escape_string(htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8'));
$goi = intval($_POST['goi']);
$tonglike = intval($_POST['solike']);
$limitpost = intval($_POST['limitpost']);
$chuthich = $_POST['chuthich'];

if ($user['id'] < 0){
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Chưa Nhập ID Thì Sao có thể cài VIP LIKE?"); </script>');
}
if ($vnd[$goi] < 0){
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Gói Like Không Tồn Tại Trên Hệ Thống!"); </script>');
}
if ($user['vnd'] < 0){
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Làm gì Còn Tiền mà Mua Đâu!"); </script>');
}
if (($goi < 0) || ($goi > 8)){
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}
if (($tonglike < 0) || ($tonglike > 100)){
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!"); </script>');
}

if ($times == 15){
$vnd = array(0, 15000, 30000, 50000, 70000, 100000, 150000, 200000);
} elseif ($times == 30){
$vnd = array(0, 30000, 50000, 80000, 120000, 170000, 250000, 340000);
} elseif ($times == 60){
$vnd = array(0, 60000, 100000, 160000, 240000, 340000, 500000, 640000);
} elseif ($times == 90){
$vnd = array(0, 90000, 150000, 240000, 360000, 410000, 750000, 980000);
} elseif ($times == 120){
$vnd = array(0, 120000, 250000, 320000, 420000, 580000, 1000000, 1320000);
} elseif ($times == 150){
$vnd = array(0, 240000, 300000, 400000, 540000, 650000, 1250000, 1660000);
} elseif ($times < 0) {
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!");</script>');
} else {
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!");</script>');
}
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `VIP` WHERE `user`=".$user['id'].""), 0);
if($user['toida'] < $check) {
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Bạn đã sử dụng tối đa ID! Nâng Cấp Liên Hệ Admin.");</script>');
} elseif($user['vnd'] < $vnd[$goi]){
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Bạn KHông đủ tiền!");</script>');
} else {
mysql_query("UPDATE `ACCOUNT` SET `vnd`=`vnd`-'".intval($vnd[$goi])."' WHERE `id`=".$user['id']."");
$timelike = time() + $times * 24 * 3600;
mysql_query("INSERT INTO `VIP` SET `idfb`='$id', `name`='$name', `user`=".$_SESSION['user'].", `goi`='$goi', `solike` = '".intval($_POST[solike])."', `time`='$timelike', `chuthich` = '$chuthich'");
$nguoiadd = $user['username'];
mysql_query("INSERT INTO `LOG_BUY` SET `nguoiadd`='$nguoiadd', `goi`='$goi',`loaivip`='Like',`idvip`='$id',`thoigian`='".date("H:i:s d/m/Y")."'");
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Thêm ID VIP Thành công!");</script>');
}
}

?>
                <div class="col-lg-6">
 <div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i> Panel Cài Đặt VIP Like</b>
                        </div>
<div class="panel-body">
        <form action="" method="POST">
<div class="form-group">
<label>ID mới cần thêm:</label>
                <input type="number" class="form-control" name="id" required="" autofocus=""></div>
<div class="form-group">
<label>Tên Người Dùng:</label>
           <input type="text" class="form-control" name="name" required="" autofocus=""></div>
            <div class="form-group"><label>Số Status/1 Ngày:</label>
                <select name="limitpost" class="form-control">
                    <option value="5">5 bài</option>
					<option value="10">10 bài</option>
					<option value="20">20 bài</option>
					<option value="30">30 bài</option>
				<option value="50">50 bài</option>
                </select></div>
<div class="form-group">
            <label>Số Lượng Like:</label>
            
		<select name="goi" id="goi" class="form-control">
			  <option value="1">150 like</option>
			  <option value="2">300 like</option>
			  <option value="3">500 like</option>
			  <option value="4">700 like</option>
			  <option value="5">1.000 like</option>
			  <option value="6">1.500 like</option>
			  <option value="7">2.000 like</option>
		</select></div>
<div class="form-group">
            <label>Tốc Độ Like/5 Phút:</label>
          
                <select name="solike" class="form-control">
                    
					<option value="5">5 Like</option>
					<option value="10">10 Like</option>
					<option value="20">20 Like</option>
					<option value="30">30 Like</option>
					<option value="40">40 Like</option>
					<option value="50">50 Like</option>
					<option value="100">100 Like</option>
					
                </select></div>
<div class="form-group">
            <label>Thời Hạn:</label>
             <select name="time" id="time" class="form-control">
						<option value="15">15 Ngày</option>
                        <option value="30">1 Tháng</option>
                        <option value="60">2 Tháng</option>
                        <option value="90">3 Tháng</option>
                        <option value="120">4 Tháng</option>
                        <option value="150">5 Tháng</option>
                    </select></div>
<div class="form-group">
                <label>Nội dung ghi chú</label>
                <textarea class="form-control" rows="3" name="chuthich" placeholder="Khi chú để nhận biết"></textarea>
                </div>
            Thành Tiền:
		
		<div class="form-control">
		  <label id="dola" for="dola">Số Tiền Cần Thanh Toán Là: </label>
		</div>
		</br>
                  
			<button type="submit" name="submit" class="btn btn-danger">Cài VIP Like</button>
			<button name="tinhtien" type="button" class="btn btn-danger" onclick="getItems()">Tính Tiền</button>
			<script type="text/javascript">
			function getItems()
			 {
			var time = document.getElementById("time").value;
			var goi = document.getElementById("goi").value;
			var sotien = httpGet("like_hethong/tinhtien.php?like="+goi+"&ngay="+time);
			document.getElementById('dola').innerHTML  = "Giá: "+sotien+" VNĐ";
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
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `VIP` WHERE `user`=".$user['id'].""), 0);
?>
<div class="col-lg-6">
 <div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i> Danh Sách ID VIP
<span data-toggle="tooltip" title="" class="pull-right badge bg-yellow" data-original-title="<?php echo $tong ?> ID VIP"><?php echo $tong ?> ID VIP</span></b>
                        </div>
<div class="panel-body">                   
<div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID VIP</th>
              <th>Họ Tên</th>
              <th>Gói Like</th>
              <th>Chú Thích</th>
              <th>Hạn Sử Dụng</th>                            
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
<?php
$req = mysql_query("SELECT * FROM `VIP` WHERE `user`=".$user['id']." ORDER BY id DESC");
while($res = mysql_fetch_assoc($req)){
$end = date('d/m/Y', $res['time']);
?>
 <tr><td><?php echo $res['idfb']; ?></td>
<td><?php echo $res['name']; ?></td>
<td><?php echo $like[$res['goi']]; ?> Like</td>
<td><?php echo $res['chuthich']; ?></td>
<td><?php echo $end; ?></td> 
<td>
<a href="/edit.php?edit=<?php echo $res['idfb']; ?>" data-toggle="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="Chỉnh Sửa"><i style="font-size:15px;" class="fa fa-edit"></i></a>
<a href="/viplike.php?xoa=<?php echo $res['idfb']; ?>" data-toggle="tooltip" title="Xóa ID" class="btn btn-danger btn-simple btn-xs"><i style="font-size:15px;" class="fa fa-times"></i></a>
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

<?php } ?>

<?php
if($_GET[xoa]){
$infongdung = mysql_fetch_array(mysql_query("SELECT * FROM `VIP` WHERE `idfb` = '".$_GET[xoa]."' LIMIT 1"));
if($infongdung[user] != $_SESSION['id']){
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Không thể xóa Tài Khoản của người khác!", "Thông báo");</script>');
} else {
mysql_query("DELETE FROM `VIP` WHERE idfb='" . mysql_real_escape_string($_GET[xoa]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/viplike.php">';
die('<script>alert("Xóa Thành Công!", "Thông báo");</script>');

exit;
}
}
?>


<?php
}
include 'like_hethong/foot.php';
?>