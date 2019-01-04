<?php 
session_start();
include '../config.php';
include '../like_hethong/functions.php';
?>

<?php if(!$_SESSION['admin']){ ?>

<?php
$username = $_POST['username'];
$password = htmlspecialchars(md5($_POST['password']));
if($username && $password){

if($username !=  'admin'){
$error = '<div class="alert alert-danger"><b>Tài Khoản Hoặc Mật Khẩu Sai!</b></div>';
}

$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `ACCOUNT` WHERE `username`='$username' AND `password`='$password'"), 0);
if($check < 1){
$error = '<div class="alert alert-danger"><b>Tài Khoản Hoặc Mật Khẩu Sai!</b></div>';
}

else{
$res = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `username`='$username' AND `password`='$password'"));
$_SESSION['admin'] = $username;
$error = '<div class="alert alert-success"><b>Đăng Nhập Thành Công ...</b></div>';
echo '<meta http-equiv=refresh content="2; URL=/AdminCP/index.php">';
}
}
include '../theme/css.php';
?>
<!doctype html>
<html lang="vi">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Đăng Nhập Quản Lý - VIPFBNOW.COM</title>
    <link rel="shortcut icon" href="https://i.imgur.com/h6NWYI8.png">
    <meta property="og:image" content="http://i.imgur.com/JA3DwPC.jpg" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />	
 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<div data-color="black" style="background-image: url(https://depdrama.com/wp-content/uploads/2017/03/Tuyet-tinh-coc-bo-anh-full-91.jpg);position: absolute;z-index: 1;height: 100%;width:100%;display: block;top: 0;left: 0;background-size: cover;background-position: center center;">
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="/AdminCP"><b><font color="white">VIPFBNOW.COM PANEL</font></b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Admin Panel VIP Facebook</p>
<center>
<?php if(!empty($error)) echo $error; ?>
</center>
    <form action="" method="post">
      <div class="form-group has-feedback">
        <input type="txt" class="form-control" name="username" placeholder="TÀI KHOẢN">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" name="password" placeholder="MẬT KHẨU">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
<br>
        <div class="row">
        <div class="col-xs-12">
          <button type="submit" class="btn btn-block btn-danger">Đăng Nhập</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

   
    <!-- /.social-auth-links -->

  </div>
  <!-- /.login-box-body -->
</div>
      
    </div>

<?php
include '../theme/js.php';
?>
<?php exit; } ?>


<?php
 if($_SESSION['admin']) { 
?>

<!doctype html>
<html lang="vi">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title><?php echo $title ?></title>
    <link rel="shortcut icon" href="https://i.imgur.com/h6NWYI8.png">
    <meta property="og:image" content="http://i.imgur.com/nNqQE6X.png" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
<?
include 'head.php';
?>
<script>
window.onload = function(){
    document.getElementById('showModal').click();
};
</script>
</head>
  
<?php 
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `token`"), 0);
$getnguoidung = mysql_query("SELECT * FROM ACCOUNT");
$shownguoidung = mysql_num_rows($getnguoidung);
$getgoivip = mysql_query("SELECT * FROM VIP");
$showgoivip = mysql_num_rows($getgoivip);
$getgoicmt = mysql_query("SELECT * FROM vipcmt");
$showgoicmt = mysql_num_rows($getgoicmt);
$getgoishare = mysql_query("SELECT * FROM vipshare");
$showgoishare = mysql_num_rows($getgoishare);
$getgoibinhluan = mysql_query("SELECT * FROM binhluan");
$showgoibinhluan = mysql_num_rows($getgoibinhluan);
$getgoicx = mysql_query("SELECT * FROM CAMXUC");
$showgoicx = mysql_num_rows($getgoicx);
?>

<?php 
if($_GET[bay]){
?>

                <div class="modal-header">
                <div class="panel panel-default">
                   <div class="panel-heading">
                             <b>Xác Nhận Xóa Thành Viên</b>
                        </div>
                    <div class="panel-body">
<form action="" method="POST">
	<div class="form-group">
	  <label for="usr" style="color:red">Bạn Có Chắc Chắn Muốn Xóa CTV ID: <font color="blue"><?php echo $_GET[bay]; ?></font></label>
	</div>
	<button type="submit" name="congtien" class="btn btn-danger">Xóa Người Dùng</button>
</form>
</div></div></div>


<?php 
if($_GET[xoa]){
mysql_query("DELETE FROM `VIP` WHERE `idfb` = '" . mysql_real_escape_string($_GET[xoa]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Xóa ID Thành Công"); </script>');
exit;
}
?>
<?php 
if($_GET[xoashare]){
mysql_query("DELETE FROM `vipshare` WHERE `idfb` = '" . mysql_real_escape_string($_GET[xoashare]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Xóa ID Thành Công"); </script>');
exit;
}
?>
<?php 
if($_GET[xoabinhluan]){
mysql_query("DELETE FROM `binhluan` WHERE `access_token` = '" . mysql_real_escape_string($_GET[xoabinhluan]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Xóa ID Thành Công"); </script>');
exit;
}
?>
<?php 
if($_GET[xoacmt]){
mysql_query("DELETE FROM `vipcmt` WHERE `idfb` = '" . mysql_real_escape_string($_GET[xoacmt]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Xóa ID Thành Công"); </script>');
exit;
}
?>
<?php 
if($_GET[xoacx]){
mysql_query("DELETE FROM `CAMXUC` WHERE `access_token` = '" . mysql_real_escape_string($_GET[xoacx]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Xóa ID Thành Công"); </script>');
exit;
}
?>

<?php
if (isset($_POST[congtien])) {
mysql_query("DELETE FROM ACCOUNT WHERE id ='" . mysql_real_escape_string($_GET[bay]) . "' ");
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Xóa Tài Khoản Thành Công!"); </script>');
exit;
}
}
?>     
<?php 
if($_GET[themid]){
?>
        <div class="modal-header">
                <div class="panel panel-default">
                   <div class="panel-heading">
                             <b>Thêm ID VIP Cho CTV</b>
                        </div>
                    <div class="panel-body">
<form action="" method="POST">
	<div class="form-group">
	  <label for="usr">Số ID muốn cộng:</label>
	  <input type="number" class="form-control" name="toida">
	</div>
	<button type="submit" name="congtien" class="btn btn-danger">Thêm ID</button>
</form>
</div></div></div>

<?php
if (isset($_POST[congtien])) {
mysql_query("UPDATE ACCOUNT SET `toida` = `toida` + '".intval($_POST[toida])."' WHERE id = '" . mysql_real_escape_string($_GET[themid]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Thêm id vào Tài Khoản Thành Công!"); </script>');
exit;
}
}
?>    
<?php 
if($_GET[congtien]){
?>
 <div class="modal-header">
                <div class="panel panel-default">
                   <div class="panel-heading">
                             <b>Công Tiền Cho CTV</b>
                        </div>
<div class="panel-body">
<form action="" method="POST">
	<div class="form-group">
	  <label for="usr">Số tiền muốn cộng:</label>
	  <input type="number" class="form-control" name="vnd">
	</div>
	<button type="submit" name="congtien" class="btn btn-danger">Cộng tiền</button>
</form>
</div>            
  </div>
</div>
<?php
if (isset($_POST[congtien])) {
mysql_query("UPDATE ACCOUNT SET `vnd` = `vnd` + '".intval($_POST[vnd])."' WHERE id = '" . mysql_real_escape_string($_GET[congtien]) . "'");
echo '<meta http-equiv=refresh content="0; URL=/AdminCP">';
die('<script>alert("Cộng tiền Tài Khoản Thành Công!"); </script>');
exit;
}
}
?>  






<div class="col-md-12">
          <!-- Custom Tabs -->
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab" aria-expanded="true">Account</a></li>
              <li class=""><a href="#tab_2" data-toggle="tab" aria-expanded="false">Vip Like</a></li>
              <li class=""><a href="#tab_3" data-toggle="tab" aria-expanded="false">Vip CMT</a></li>
              <li class=""><a href="#tab_4" data-toggle="tab" aria-expanded="false">Vip Share</a></li>
              <li class=""><a href="#tab_5" data-toggle="tab" aria-expanded="false">BOT REACT</a></li>
			  <li class=""><a href="#tab_6" data-toggle="tab" aria-expanded="false">BOT CMT</a></li>
              
              <li class="pull-right"><a href="#" class="text-muted"><i class="fa fa-gear"></i></a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
                 <div class="panel-body">
       <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID</th>
              <th>Tài Khoản</th>
              <th>Tên Hiển Thị</th>
              <th>Trạng Thái</th>
              <th>Tiền + ID</th>
              <th>Email</th>
              <th>Hành Động</th>
              
            </tr>
          </thead>
          <tbody>
            <?php
$req = mysql_query("SELECT * FROM `ACCOUNT`");
			while($res = mysql_fetch_assoc($req)){
$active = '';
if($res['kichhoat'] <= 0){
$active = "<button class='btn btn-rounded btn-xs btn-danger'><i class='fa fa-times'></i> <b>Chưa Kích Hoạt</b></button>";
}else{
$active = "<button class='btn btn-rounded btn-xs btn-success'><i class='fa fa-check'></i> <b>Đã Kích Hoạt</b></button>";
}
			?>
            <tr>
              <td>
                #<?php echo $res['id']; ?>
              </td>
              <td>
                <a class="btn btn-xs btn-info href="/AdminCP/ctv.php?danhsach=<?php echo $res['id']; ?>"><i class="fa fa-users" aria-hidden="true"></i> <?php echo htmlspecialchars($res['username'], ENT_QUOTES, 'UTF-8'); ?></a>
              </td>
              <td>
                <a class="btn btn-xs btn-primary"><i class="fa fa-address-card-o" aria-hidden="true"></i> <?php echo $res['fullname']; ?></a>
              </td>
              <td>
                <?php echo $active ?>
              </td>
              <td>
                <a class="btn btn-xs btn-success"><i class="fa fa-money" aria-hidden="true"></i> <?php echo number_format($res['vnd']); ?> VNĐ</a> 
<span class="label label-warning pull-right"><?php echo $res['toida'] ?> ID</span>
              </td>
              <td>
<a class="btn btn-xs btn-default"><b><?php echo $res['mail'] ? $res['mail'] : "<font color='red'>Không Xác Định</font>"; ?></b></a></td>
              <td><a href="/AdminCP/?congtien=<?php echo $res['id']; ?>" data-toggle="tooltip" title="Cộng Tiền" class="btn btn-success btn-simple btn-xs"><i class="fa fa-cog"></i></a>
<a href="/AdminCP/?themid=<?php echo $res['id']; ?>" data-toggle="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Thêm ID"><i class="fa fa-plus-square-o" aria-hidden="true"></i></a>
<a href="/AdminCP/?bay=<?php echo $res['id']; ?>" data-toggle="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Xóa Members"><i class="fa fa-trash-o"></i></a>                 
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
       </div>
      </div>  
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
                <div class="panel-body">
<div class="table-responsive">
        <table id="example2" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>STT</th>
              <th>ID VIP</th>
              <th>Tên</th>
              <th>Gói</th>
               <th>Tốc Độ</th>
              <th>Hạn Sử Dụng</th>
              <th>Hành Động</th>             
            </tr>
          </thead>
          <tbody>
            <?php
			$like = array(0, 150, 300, 500, 700, 1000, 1500, 2000);
			$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `VIP`"), 0);
			$req = mysql_query("SELECT `id`, `idfb`, `name`, `goi`, `solike`, `time` FROM `VIP` ORDER BY id DESC");
			while($res = mysql_fetch_assoc($req)){
			?>
            <tr>
             <td>
                <b>#</b><?php echo $res['id']; ?>
              </td>
              <td>
                <?php echo $res['idfb']; ?>
              </td>
              <td>
               <?php echo htmlspecialchars($res['name'], ENT_QUOTES, 'UTF-8'); ?>
              </td>
              <td>
                <a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $like[$res['goi']]; ?> Like</a>
              </td>
<td>
              <a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $res['solike']; ?> Like</a>
              </td>
              <td>
                <a class="btn btn-xs btn-success"><i class="fa fa-history" aria-hidden="true"></i> <?php echo date("d-m-20y", $res['time']); ?></a>
              </td>
              <td>
                <a href="?xoa=<?php echo $res['idfb']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i> Xóa Tài Khoản</a>
                <a href="chinhsua.php?edit=<?php echo $res['idfb']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>   
	 </div>  
    </div>		
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_3">
                <div class="panel-body">
<div class="table-responsive">
        <table id="example3" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID VIP</th>
              <th>Tên</th>
              <th>Gói</th>
               <th>Tốc Độ</th>
              <th>Hạn Sử Dụng</th>
              <th>Hành Động</th>             
            </tr>
          </thead>
          <tbody>
            <?php
			$cmt = array(0, 20, 40, 80, 120, 180, 240, 320, 500);			
			$req = mysql_query("SELECT * FROM `vipcmt` ORDER BY id DESC");
			while($res = mysql_fetch_assoc($req)){
			?>
            <tr>
              <td>
                <?php echo $res['idfb']; ?>
              </td>
              <td>
               <?php echo htmlspecialchars($res['name'], ENT_QUOTES, 'UTF-8'); ?>
              </td>
              <td>
                <a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $cmt[$res['goi']]; ?> CMT</a>
              </td>
<td>
              <a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $res['socmt']; ?> CMT</a>
              </td>
              <td>
                <a class="btn btn-xs btn-success"><i class="fa fa-history" aria-hidden="true"></i> <?php echo date("d-m-20y", $res['time']); ?></a>
              </td>
              <td>
                <a href="?xoacmt=<?php echo $res['idfb']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i> Xóa Tài Khoản</a>
                <a href="chinhsua.php?edit=<?php echo $res['idfb']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>   
	 </div>  
    </div>		
              </div>
<div class="tab-pane" id="tab_4">
<div class="panel-body">
<div class="table-responsive">
        <table id="example4" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>ID VIP</th>
              <th>Tên</th>
              <th>Gói</th>
               <th>Tốc Độ</th>
              <th>Hạn Sử Dụng</th>
              <th>Hành Động</th>             
            </tr>
          </thead>
          <tbody>
            <?php
			$share = array(0, 60, 100, 160, 260, 380, 560, 720);			
			$req = mysql_query("SELECT * FROM `vipshare` ORDER BY id DESC");
			while($res = mysql_fetch_assoc($req)){
			?>
            <tr>
              <td>
                <?php echo $res['idfb']; ?>
              </td>
              <td>
               <?php echo htmlspecialchars($res['name'], ENT_QUOTES, 'UTF-8'); ?>
              </td>
              <td>
                <a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $share[$res['goi']]; ?> Share</a>
              </td>
<td>
              <a class="btn btn-xs btn-primary"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> <?php echo $res['soshare']; ?> Share</a>
              </td>
              <td>
                <a class="btn btn-xs btn-success"><i class="fa fa-history" aria-hidden="true"></i> <?php echo date("d-m-20y", $res['time']); ?></a>
              </td>
              <td>
                <a href="?xoashare=<?php echo $res['idfb']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-user-times" aria-hidden="true"></i> Xóa Tài Khoản</a>
                <a href="chinhsua.php?edit=<?php echo $res['idfb']; ?>" class="btn btn-xs btn-danger"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Chỉnh Sửa</a>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>   
	 </div>  
    </div>		
              <!-- /.tab-pane -->
            </div>
<div class="tab-pane" id="tab_5">
<div class="panel-body">                   
<div class="table-responsive">
        <table id="example5" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>TÊN</th>
              <th>CẢM XÚC</th>
              <th>TÌNH TRẠNG</th>              
              <th>Hạn Sử Dụng</th>                        
              <th>Hành động</th>
            </tr>
          </thead>
          <tbody>
            <?php
$req = mysql_query("SELECT * FROM `CAMXUC` ORDER BY id DESC");
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
                <a class="btn btn-xs btn-primary"><?php echo $res['camxuc']; ?></a>
              </td>
               <td>
                <?php echo $live; ?>
              </td>
              
              <td>
                <?php echo date("d-m-20y", $res['time']); ?>
              </td>
              <td>
               <a href="?xoacx=<?php echo $res['access_token']; ?>" data-toggle="tooltip" title="" class="btn btn-danger btn-simple btn-xs" data-original-title="Xóa"><i style="font-size:15px;" class="fa fa-trash-o"></i></a>              
               <a href="chinhsua.php?edit=<?php echo $res['access_token']; ?>" data-toggle="tooltip" title="Cập Nhật" class="btn btn-success btn-simple btn-xs"><i style="font-size:15px;" class="fa fa-cog"></i></a>
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
            <!-- /.tab-content -->
            </div>
<div class="tab-pane" id="tab_6">
<div class="panel-body">                   
<div class="table-responsive">
        <table id="example6" class="table table-bordered table-striped">
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
$req = mysql_query("SELECT * FROM `binhluan` WHERE `user`=".$user['id']." LIMIT $start, $kmess");

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
                <a class="btn btn-xs btn-primary"><?php echo $res['binhluan']; ?></a>
              </td>
               <td>
                <?php echo $live; ?>
              </td>
              
              <td>
                <?php echo date("d-m-20y", $res['time']); ?>
              </td>
              <td>
              <td>
               <a href="binhluan.php?edit=<?php echo $res['access_token']; ?>" data-toggle="tooltip" title="" class="btn btn-success btn-simple btn-xs" data-original-title="Cập Nhật"><i style="font-size:15px;" class="fa fa-edit"></i></a>              
               <a href="?xoabinhluan=<?php echo $res['access_token']; ?>" data-toggle="tooltip" title="Xóa BOT" class="btn btn-danger btn-simple btn-xs"><i style="font-size:15px;" class="fa fa-times"></i></a>
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
        
    <!-- /.tab-content -->
         </div> </div> </div>
        
       



		


           
<div class="col-md-8">
                 <div class="panel panel-default">
                   <div class="panel-heading"><i class="fa fa-cogs"></i><b> Lịch Sử Nạp Thẻ</b>
</div>
	
	<div class="panel-body">
<div class="table-responsive">
        <table class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên</th>
              <th>Loại Thẻ</th>
              <th>Mã Thẻ</th>
              <th>Seri</th>
              <th>Nạp Lúc</th>
              <th>Mệnh Giá</th>
            </tr>
          </thead>
          <tbody>
            <?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `LOG_CARD` "), 0);
$req = mysql_query("SELECT `id`, `nguoinhan`, `loaithe`, `mathe`, `seri`, `time`, `menhgia` FROM `LOG_CARD` ORDER BY id DESC LIMIT $start, $kmess");
while($res = mysql_fetch_assoc($req)){
?>
            <tr>
              <td>
                <b>#<?php echo $res['id']; ?></b>
              </td>
              <td>
                <?php echo $res['nguoinhan']; ?>
              </td>
              <td>
                <?php echo $res['loaithe']; ?>
              </td>
              <td>
                <?php echo $res['mathe']; ?>
              </td>
              <td>
                <?php echo $res['seri']; ?>
              </td>
              <td>
                <?php echo $res['time']; ?>
              </td>
              <td>
                <?php echo number_format($res['menhgia'], 0, ',', ','); ?> VNĐ
              </td>
            </tr>
            <?php
}
?>
          </tbody>
        </table>
   </div>    </div> 
<?php if ($tong > $kmess){
			echo '<center>' . phantrang_tomdz('index.php?', $start, $tong, $kmess) . '</center>';
			} ?>


</div>
</div>   

<!-- /.col -->
                <div class="col-md-4">
                    <div class="panel panel-default">
                   <div class="panel-heading">
                    <i class="fa fa-cogs"></i><b> Thống Kê</b>
</div>
	
	<div class="panel-body">                 
                  <div class="progress-group">

                    <span class="progress-text">VIP LIKE ACTIVE</span>
                    <span class="progress-number"><b><?php echo $showgoivip ?></b>/100</span>

                    <div class="progress sm">
<div class="progress-bar progress-bar-danger progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $showgoivip ?>%">
                      
                    </div>
                  </div>
                  <!-- /.progress-group -->
                  <div class="progress-group">
                    <span class="progress-text">VIP COMMENT ACTVIE</span>
                    <span class="progress-number"><b><?php echo $showgoicmt ?></b>/100</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-primary progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $showgoicmt ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
 <div class="progress-group">
                    <span class="progress-text">VIP SHARE ACTIVE</span>
                    <span class="progress-number"><b><?php echo $showgoishare ?></b>/100</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-success progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $showgoishare ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                 <div class="progress-group">
                    <span class="progress-text">BOT REACTION ACTIVE</span>
                    <span class="progress-number"><b><?php echo $showgoicx ?></b>/100</span>

                    <div class="progress sm">
                      <div class="progress-bar progress-bar-yellow progress-bar-striped" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $showgoicx ?>%"></div>
                    </div>
                  </div>
                  <!-- /.progress-group -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- ./box-body -->
</div> 

</div>    
<?php 
include '../like_hethong/foot.php';
include '../theme/js.php';
} 
?>