<?php
session_start();
if(!$_SESSION['admin']) 
{
	header('Location: /AdminCP');
}
include'../config.php';
include'head.php';
include '../theme/css.php';
?>
<title>Quản Lý GiftCode | Tạo Gift Code - VIPFBNOW.COM</title>
  <div class="col-lg-6">
  <div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i> Cài Đặt Mã Gift Hệ Thống</b>
                        </div>
<div class="panel-body">
<form action="" method="POST">
	<div class="form-group">
	  <label for="usr">Số Lượng</label>
	  <input type="text" class="form-control" name="soluong">
	</div>        
	<div class="form-group">
	  <label for="pwd">Mệnh Giá:</label>
	  <input type="text" class="form-control" name="menhgia">
	</div>
        <div class="form-group">
            <label>Thời Hạn:</label>
             <select class="form-control" name="thoihan">
                        <option value="1">1 Ngày</option>
                        <option value="3">3 Ngày</option>
                        <option value="5">5 Ngày</option>
                        <option value="7">7 Ngày</option>
                        <option value="10">10 Ngày</option>
                        <option value="15">15 Ngày</option>
                        <option value="30">1 Tháng</option>
                        <option value="60">2 Tháng</option>
                        <option value="90">3 Tháng</option>
                        <option value="120">4 Tháng</option>
                        <option value="150">5 Tháng</option>
                    </select></div>
	<button type="submit" class="btn btn-danger">Lấy Thẻ</button>
       
</form>
</div></div>
<?php
mysql_query("CREATE TABLE IF NOT EXISTS `Gift_LIKE` (
      `id` int(11) NOT NULL AUTO_INCREMENT,   
      `magift` text NOT NULL,
      `time` text NOT NULL,       
      `user` text NOT NULL, 
      `menhgia` text NOT NULL,    
      PRIMARY KEY (`id`)
      ) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
   ");
for($i=0;$i<$_POST[soluong];$i++)
{
$ma = randma(25);
$time = $_POST['thoihan'];
$timegift = time() + $time * 24 * 3600;
$ends = date('d/m/Y', $timegift);
echo'<div class="list-group-item">';
echo 'Mã GiftCode: '.$ma.' <br> Mệnh Giá: '.$_POST['menhgia'].' VNÐ<br> Thời Hạn: '.$ends.'';
echo '</div>';

mysql_query(
         "INSERT INTO 
            `Gift_LIKE`
         SET
            `magift` = '" . $ma . "',
            `time` = '".$timegift."',
            `user` = '" . $_SESSION['user'] . "',
            `menhgia` = '" . $_POST['menhgia'] . "'
      ");
$file = "listgiftcode3212.txt";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"Mã Gift Code: ".$ma);
        fwrite($fh,"\r\n");
        fwrite($fh,"Mệnh Giá: ".number_format($_POST['menhgia'])."VNĐ ".$AN);
        fwrite($fh,"\r\n");
        fwrite($fh,"Thời Hạn: ".$ends);
	fwrite($fh,"\r\n");
        fwrite($fh,"\r\n");
	fclose($fh);
}
function randma($length) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ9876543210';
    $charactersLength = strlen($characters);
    $randomString = 'VIPFBNOW';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
echo '</div>';
?>
  <div class="col-lg-6">
<div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i> Quản Lý Gift Hệ Thống</b>
                        </div>
<div class="panel-body">
       <div class="table-responsive">
        <table id="example1" class="table table-bordered table-striped">
          <thead>
            <tr>             
              <th>Mã Gift</th>
              <th>Mệnh Giá</th>
              <th>Thời Hạn</th>              
            </tr>
          </thead>
          <tbody>
<?php
       $infongdung = mysql_query("SELECT * FROM `Gift_LIKE` ORDER BY menhgia DESC");
while ($get = mysql_fetch_array($infongdung)){
$end = date('d/m/Y', $get['time']);
	?>
	<tr>
<td><?php echo $get[magift]; ?></td><td><?php echo number_format($get['menhgia']); ?>VNĐ</td>
<td><?php echo $end  ?></td></tr>
	<?php } ?>
</tbody>
        </table>
	</div></div></div></div></div></div>
<?php
include '../theme/js.php';
include '../like_hethong/foot.php';
?>