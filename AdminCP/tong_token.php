<?php
session_start();
include '../config.php';
include './head.php';
include '../theme/css.php';
if(!$_SESSION['admin']) 
?>

<?php 
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `token`"), 0);

?>

<title>Tổng Token | VIPFBNOW.COM </title>

<div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa  fa-paper-plane-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TỔNG TOKEN</span>
              <span class="info-box-number">+ <?php echo'<strong>'.number_format($tong).'</strong>'; ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 70%"></div>
              </div>
                  <span class="progress-description">
                    Đang Hoạt Động
</div></div>
</div></div></div>
<?php 

include '../theme/js.php';
include '../like_hethong/foot.php'; 
?>