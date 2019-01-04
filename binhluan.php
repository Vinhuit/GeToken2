<?php
include 'config.php';
include 'like_hethong/head.php';
include 'like_hethong/functions.php';
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
if(isset($_POST['del'])){
$token = intval($_POST['token']);
mysql_query("DELETE FROM `binhluan` WHERE `user`=".$user['id']." AND `access_token`='$token'");
}

if(isset($_POST['submit'])){
$times = mysql_real_escape_string($_POST['time']);
$token = mysql_real_escape_string($_POST['token']);
$name = mysql_real_escape_string(htmlentities($_POST['name'], ENT_QUOTES, 'UTF-8'));
$noidung = $_POST['noidung'];


if ($vnd < 0){
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Gói Bình Luận Không Tồn Tại Trên Hệ Thống!"); </script>');
}
if ($user['vnd'] < 0){
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Làm gì Còn Tiền mà Mua Đâu!"); </script>');
}


if ($times == 30){
$vnd = '20000';
} elseif ($times < 0) {
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!");</script>');
} else {
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Không bug được đâu nhé! Gian lận không tốt đâu!");</script>');
}
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `binhluan` WHERE `user`=".$user['id'].""), 0);
if($user['toida'] < $check) {
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Bạn đã sử dụng tối đa ID! Nâng Cấp Liên Hệ Admin.");</script>');
} elseif($user['vnd'] < $vnd){
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Bạn KHông đủ tiền!");</script>');
} else {
mysql_query("UPDATE `ACCOUNT` SET `vnd`=`vnd`-'".intval($vnd)."' WHERE `id`=".$user['id']."");
$timecx = time() + $times * 24 * 3600;
mysql_query("INSERT INTO `binhluan` SET `name`='$name', `user`=".$_SESSION['user'].", `noidung`='$noidung', `access_token`='$token', `time`='$timecx'");
$nguoiadd = $user['username'];
mysql_query("INSERT INTO `LOG_BUY` SET `nguoiadd`='$nguoiadd', `goi`='$goi',`loaivip`='BOT COMMENT',`idvip`='$name',`thoigian`='".date("H:i:s d/m/Y")."'");
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Thêm ID VIP Bình Luận Thành công!");</script>');
}
}

?>
                <div class="col-lg-6">
 <div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i> CÀI ĐẶT BOT BÌNH LUẬN</b>
                        </div>
<div class="panel-body">
<form action="" method="POST">
		
	<div class="form-group">
		<label>Nhập Token:</label>  
		<input type="txt" class="form-control" name="token" required="" autofocus="">
	</div>

    <div class="form-group">
<label>Tên Người Dùng:</label>            
<input type="text" class="form-control" name="name" required="" autofocus="">
    </div>
			
    <div class="form-group">
<label>Nội Dung Bình Luận: (Random mỗi nội dung 1 dòng)</label>
<textarea rows="1" type="text" class="form-control" name="noidung" value="" placeholder=" Nội dung bình luận ..." style="width: 100%"></textarea>          
	</div>
        <div class="form-group">
<label>Thời Hạn:</label>
            <select name="time" id="time" class="form-control">
                        <option value="30">1 Tháng</option>
                        
                    </select>
            </div>
        <div class="form-group">
<label>Thành Tiền:</label>
		<div class="form-control">
		  <label id="dola" for="dola">Giá 20,000 VNĐ</label>
		</div>
		</div>
        </br>   
			<button type="submit" name="submit" class="btn btn-danger">Cài BOT</button>
			
			
        </form>
      </div>
    </div>
  </div>

<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `binhluan` WHERE `user`=".$user['id'].""), 0);
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
              <th>TÊN</th>
              <th>NỘI DUNG</th>
              <th>TÌNH TRẠNG</th>              
              <th>Hạn Sử Dụng</th>                        
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `binhluan` WHERE `user`=".$user['id'].""), 0);
$req = mysql_query("SELECT * FROM `binhluan` WHERE `user`=".$user['id']."");

while($res = mysql_fetch_assoc($req)){
$token = $res['access_token'];
$me = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$token),true);
$live = '';										if(!$me['id']){
$live = "<button class='btn btn-rounded btn-xs btn-danger'><i class='fa fa-times'></i> <b>Token Die</b></button>";
}else{											$live = "<button class='btn btn-rounded btn-xs btn-success'><i class='fa fa-check'></i> <b>Hoạt Động</b></button>";
}
?>

            <tr>
              
              <td>
                <?php echo $res['name']; ?>
              </td>
              <td>
                <?php echo '<textarea rows="1" type="text" placeholder=" Nội dung ..." style="width: 90px">'.$res['noidung'].'</textarea>'; ?>
              </td>
               <td>
                <?php echo $live; ?>
              </td>
              
              <td>
                <?php echo date("d-m-20y", $res['time']); ?>
              </td>
              <td>
               <a href="/edit_binhluan.php?edit=<?php echo $res['access_token']; ?>" data-toggle="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="Cập Nhật"><i style="font-size:15px;" class="fa fa-edit"></i></a>              
               <a href="/binhluan.php?xoa=<?php echo $res['access_token']; ?>" data-toggle="tooltip" title="Xóa BOT" class="btn btn-danger btn-simple btn-xs"><i style="font-size:15px;" class="fa fa-times"></i></a>
              </td>
            </tr>
            <?php
}
?>
          </tbody>
        </table>
       </div>      
    </div>
  </div>
</div>
</div>
  </div>

<?php } ?>

<?php
if($_GET[xoa]){
$infongdung = mysql_fetch_array(mysql_query("SELECT * FROM `binhluan` WHERE `access_token` = '".$_GET[xoa]."' LIMIT 1"));
if($infongdung[user] != $_SESSION['id']){
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Không thể xóa Tài Khoản của người khác!", "Thông báo");</script>');
} else {
mysql_query("DELETE FROM `binhluan` WHERE access_token='" . mysql_real_escape_string($_GET[xoa]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/binhluan.php">';
die('<script>alert("Xóa Thành Công!", "Thông báo");</script>');

exit;
}
}
?>


<?php
}
include 'like_hethong/foot.php';
?>