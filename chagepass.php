<?php 
session_start();
include 'config.php';
include 'like_hethong/head.php';
$thongtin = mysql_fetch_array(mysql_query("SELECT * FROM `ACCOUNT` WHERE `id` = '" . $_SESSION['id'] . "' LIMIT 1"));
if(!$_SESSION['id']) {
echo '<meta http-equiv=refresh content="0; URL=/index.php">';
die('<script>alert("Vui Lòng Đăng Nhập!"); </script>');
}
if(isset($_POST['submit']))
{
$loi = array();
	if(md5($_POST['passwd']) != $user['password']){
		$loi['pass'] = '<font color=red>Mật Khẩu Cũ Không Đúng</font>';
	}
if($_POST['pass1'] != $_POST['pass2']){
		$loi['pass'] = '<font color=red>Mật khẩu mới không Trùng Nhau.</font>';
	}
if(empty($loi)){
       $pass1 = $_POST['pass1'];
		$pass2 = $_POST['pass2'];
		$pass = md5($pass1);
mysql_query("UPDATE ACCOUNT SET `password` = '".$pass."' WHERE `id` = '".$_SESSION['user']."'");
$loi['pass'] = '<font color=green>Đổi Mật Khẩu Thành Công Vui Lòng Đăng Nhập Lại !!</font><meta http-equiv=refresh content="3; URL=/logout.php">';

}	
  } 
?>
<div class="col-lg-12">
 <div class="panel panel-default">
                   <div class="panel-heading">
<i class="fa fa-cogs"></i> ĐỔI MẬT KHẨU - Change Password
</div>
<form action="" method="POST">
<div class="panel-body"><center>
<?php echo isset($loi['pass']) ? $loi['pass'] : ''; ?></center>
                                <div class="form-group">
            <label for="pwd">Password Cũ:
            </label>
            <input type="password" class="form-control" name="passwd" required>
          </div>
<div class="form-group">
            <label for="pwd">Password Mới:
            </label>
            <input type="password" class="form-control" name="pass1" required>
          </div>

         <div class="form-group">
            <label for="pwd">Nhập Lại Password Mới:
            </label>
            <input type="password" class="form-control" name="pass2" required>
          </div>

         
         <center>
<input type="submit" class="btn btn-info pull-right wow bounceIn" name="submit" value="Đổi mật khẩu"></center>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
</div></div></div>
<?php
include 'like_hethong/foot.php';
?>