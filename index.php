<?php
session_start();
include 'config.php';
include 'like_hethong/head.php';
include 'like_hethong/functions.php';
?>
<?php 
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `token`"), 0);
$getshare = mysql_query("SELECT * FROM vipshare");
$showshare = mysql_num_rows($getshare);
$getgoivip = mysql_query("SELECT * FROM VIP");
$showgoivip = mysql_num_rows($getgoivip);
$getgoicmt = mysql_query("SELECT * FROM vipcmt");
$showgoicmt = mysql_num_rows($getgoicmt);
$getcamxuc = mysql_query("SELECT * FROM CAMXUC");
$showcamxuc = mysql_num_rows($getcamxuc);
$getbinhluan = mysql_query("SELECT * FROM binhluan");
$showbinhluan = mysql_num_rows($getbinhluan);
$getaccount = mysql_query("SELECT * FROM ACCOUNT");
$showaccount = mysql_num_rows($getaccount);
?>


<?php
if(!$_SESSION['user']){
?>

<div class="row">

<!-- Bảng thống kê -->
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box bg-red">
            <span class="info-box-icon"><i class="fa fa-rss"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">TỔNG TOKEN</span>
			  <span class="info-box-number">+ <?php echo'<strong>1'.number_format($tong).'</strong>'; ?></span>
              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <span class="progress-description">
                    <i class="fa fa-spinner fa-spin"></i> Hoạt Động
                  </span>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
		          </div>
        <!-- /.col -->
      </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box bg-aqua">
            <span class="info-box-icon"><i class="fa fa-thumbs-o-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">VIP LIKE</span>
              <span class="info-box-number">+ 1<strong><?php echo $showgoivip; ?></strong></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
			         <span class="progress-description">
                    <i class="fa fa-spinner fa-spin"></i> Hoạt Động
                  </span>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
		          </div>
        <!-- /.col -->
		</div>
        <div class="col-md-2 col-xs-12">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">VIP COMMENT</span>
              <span class="info-box-number">+ 1<? echo $showgoicmt ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
            </div>
						         <span class="progress-description">
                    <i class="fa fa-spinner fa-spin"></i> Hoạt Động
                  </span>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
		          </div>
        <!-- /.col -->
      </div>
        <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box bg-fuchsia">
            <span class="info-box-icon"><i class="fa fa-heartbeat"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">BOT CẢM XÚC</span>
              <span class="info-box-number">+ 5<? echo $showcamxuc ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
			  			         <span class="progress-description">
                    <i class="fa fa-spinner fa-spin"></i> Hoạt Động
                  </span>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
	        </div>
        <!-- /.col -->
      </div>	  
              <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-comments-o"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">BOT CMT</span>
              <span class="info-box-number">+ 5<? echo $showbinhluan ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
			  						         <span class="progress-description">
                    <i class="fa fa-spinner fa-spin"></i> Hoạt Động
                  </span>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
	  <div class="col-md-2 col-sm-6 col-xs-12">
          <div class="info-box bg-blue">
            <span class="info-box-icon"><i class="fa fa-bicycle"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">VIP SHARE</span>
              <span class="info-box-number">+ 1<? echo $showshare ?></span>

              <div class="progress">
                <div class="progress-bar" style="width: 20%"></div>
              </div>
                  <span class="progress-description">
                    <i class="fa fa-spinner fa-spin"></i> Bảo Trì
                  </span>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
		          </div>
        <!-- /.col -->
      </div>
<?php
$get = mysql_fetch_assoc(mysql_query("SELECT * FROM `thongbao` WHERE `id`='1'"));
$tongtb = mysql_result(mysql_query("SELECT COUNT(*) FROM `thongbao`"), 0);
if($tongtb < 1){ 
?> 
</b>
<?php
} else {
?>
<div class="col-lg-12">
<div class="alert alert-danger">
     <strong><marquee><?php echo $get['text']; ?></marquee></strong>   
</div></div>
<?php
}
?>   
	  
<?php
if(mobi()){
?>
<div class="box box-solid" style="background: url('https://i.imgur.com/Zo0hdg9.jpg') center center;">
                    <div class="box-body">     

            <div class="card panel-body text-center">
<span class="logo-lg wow bounceInDown" style="visibility: visible; animation-name: bounceInDown;">
  <font size="7" color="white">HỆ THỐNG VIP LIKE - VIP COMMENT - BOT CẢM XÚC - BOT COMMENT</font></span>
<font size="4" color="white"><p>Giá Tốt Và Chất Lượng Cao Tạo Nên Thương Hiệu VipFbnow.Com</p></font> 
<button type="button" class="btn btn-rounded btn-success btn-fill btn-wd btn-lg" data-toggle="modal" data-target="#DANGNHAP"><i class="fa fa-fw fa-rocket"></i> ĐĂNG NHẬP NGAY</button>
</div></div></div>
<?php
}
else {
?>

<div class="row">
<div class="col-md-12 col-sm-12 col-lg-12 wow shake">
<div id="sliderVipFBNow" class="carousel slide" data-ride="carousel" data-interval="2500">

<ol class="carousel-indicators">
<li data-target="#sliderVipFBNow" data-slide-to="0" class="active"></li>
<li data-target="#sliderVipFBNow" data-slide-to="1"></li>
<li data-target="#sliderVipFBNow" data-slide-to="2"></li>
</ol>
<div class="carousel-inner" role="listbox">
<div class="item active">
<img src="/theme/img/bn1.jpg" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          <h1><b class="red">VIPFBNOW.COM VIP LIKE GIÁ RẺ NHẤT VN</b></h1>
          <p><b class="xanh">UY TÍN - CHẤT LƯỢNG - BẢO HÀNH</b></p>
          <p><button type="button" class="btn btn-rounded btn-danger btn-fill btn-wd btn-lg" data-toggle="modal" data-target="#DANGNHAP"><i class="fa fa-fw fa-rocket"></i> ĐĂNG NHẬP NGAY</button>
        <p><a class="btn btn-rounded btn-warning btn-fill btn-wd btn-lg" href="dangky.php"><i class="fa fa-fw fa-paper-plane-o"></i> ĐĂNG KÝ NGAY</a></p>
		</p></pthis></div>
      </div>
    </div>
    <div class="item">
      <img src="/theme/img/bn2.jpg" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          <h1><b class="xanh">GIÁ THÀNH RẺ - CHỨC NĂNG ĐA DẠNG</b></h1>
          <p><b class="red">VIP LIKE - VIP COMMENT  - BOT CẢM XÚC - BOT COMMENT</b></p>
          <p><button type="button" class="btn btn-rounded btn-success btn-fill btn-wd btn-lg" data-toggle="modal" data-target="#DANGNHAP"><i class="fa fa-fw fa-shopping-cart"></i> MUA NGAY</button></p>
        </div>
      </div>
    </div>
    <div class="item">
      <img src="/theme/img/bn3.jpg" class="img-responsive">
      <div class="container">
        <div class="carousel-caption">
          <h1><b class="green">TĂNG TƯƠNG TÁC FACEBOOK</b></h1>
          <p><b class="xanh">THANH TOÁN ĐƠN GIẢN NHANH CHÓNG VỚI CHỨC NĂNG NẠP THẺ</b></p>
          <p><a class="btn btn-rounded btn-warning btn-fill btn-wd btn-lg" href="dangky.php"><i class="fa fa-fw fa-paper-plane-o"></i> ĐĂNG KÝ NGAY</a></p>
</div>
</div>
</div>
<a class="left carousel-control" href="#sliderVipFBNow" role="button" data-slide="prev">
<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
<span class="sr-only">Previous</span>
</a>
<a class="right carousel-control" href="#sliderVipFBNow" role="button" data-slide="next">
<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
<span class="sr-only">Next</span>
</a>
</div>
</div>
</div>
</div>


<?php
}
?>        
<div class="row" style="margin-top:10px">
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <div class="info-box panel-body text-center wow tada" style="background: rgb(255, 255, 255); border-radius: 5px; visibility: visible; animation-name: tada;">
                <div class="et_pb_main_blurb_image"><img style="width:100px" src="/theme/img/5.png" alt="" class="et-waypoint et_pb_animation_off et-animated"></div>
                <div class="et_pb_blurb_container">
                    <h4>Công nghệ mới</h4>

                    <p>Tất cả đều được tự động hóa, ổn định, tối ưu hiệu suất với bộ mã nguồn độc quyền và hệ thống máy chủ tốt nhất .</p>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">

            <div class="info-box panel-body text-center wow tada" style="background: rgb(255, 255, 255); border-radius: 5px; visibility: visible; animation-name: tada;">
                <div class="et_pb_main_blurb_image"><img style="width:100px" src="/theme/img/4.png" alt="" class="et-waypoint et_pb_animation_off et-animated"></div>
                <div class="et_pb_blurb_container">
                    <h4>UI Chuyên Nghiệp</h4>

                    <p>Panel quản lí chuyên nghiệp dành riêng cho Đại lí, Cộng tác viên và các thành viên. Duy nhất có tại VipFbNow.Com</p>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">

            <div class="info-box panel-body text-center wow tada" style="background: rgb(255, 255, 255); border-radius: 5px; visibility: visible; animation-name: tada;">
                <div class="et_pb_main_blurb_image"><img style="width:100px" src="/theme/img/icon-document.png" alt="" class="et-waypoint et_pb_animation_off et-animated"></div>
                <div class="et_pb_blurb_container">
                    <h4>Chi phí thấp</h4>

                    <p> Giá cả hợp lí, ưu đãi lớn dành cho Đại Lí &amp; CTV. Có nhiều gói dịch vụ đáp ứng mọi nhu cầu của người dùng.</p>

                </div>
            </div>
        </div>
        <div class="col-md-3 col-lg-3 col-sm-12 col-xs-12">
            <div class="info-box panel-body text-center wow tada" style="background: rgb(255, 255, 255); border-radius: 5px; visibility: visible; animation-name: tada;">
                <div class="et_pb_main_blurb_image"><img style="width:100px" src="/theme/img/vps-security-icon.png" alt="" class="et-waypoint et_pb_animation_off et-animated"></div>
                <div class="et_pb_blurb_container">
                    <h4>Bảo Mật Tuyệt Đối</h4>

                    <p>Bạn không phải sử dụng Facebook cá nhân, chỉ cần tạo 1 tài khoản trên hệ thống và đăng kí chọn mua dịch vụ.</p>

                </div>
            </div>
        </div>
</div>
</div>
               
<?php
}else{
$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `id`=".$_SESSION['user'].""));
if($user['kichhoat'] <  1) { 
include 'bangtb.php';
} else {
?>
<?php
$get = mysql_fetch_assoc(mysql_query("SELECT * FROM `thongbao` WHERE `id`='1'"));
$tongtb = mysql_result(mysql_query("SELECT COUNT(*) FROM `thongbao`"), 0);
if($tongtb < 1){ 
?> 
</b>
<?php
} else {
?>
<div class="col-lg-12">
<div class="alert alert-danger">
     <strong><marquee><?php echo $get['text']; ?></marquee></strong>   
</div></div>
<?php
}
?>   


<?php
$ip = $_SERVER['REMOTE_ADDR'];
mysql_query("UPDATE ACCOUNT SET `ip` = '".$ip."' WHERE `id`  ='".$_SESSION['user']."'");
?>
          	
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>VIP LIKE</h3>

              <p><b>Tự động Like khi bạn có bài viết mới</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-thumbs-o-up"></i>
            </div>
            <a href="viplike.php" class="small-box-footer">
              VÀO NGAY <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>VIP COMMENT</h3>

              <p><b>Tự động CMT khi bạn có bài viết mới</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-comments" aria-hidden="true"></i>
            </div>
            <a href="vipcmt.php" class="small-box-footer">
              VÀO NGAY <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>BOT COMMENT</h3>

              <p><b>Tự động CMT lên bài viết của bạn bè</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-comments" aria-hidden="true"></i>
            </div>
            <a href="binhluan.php" class="small-box-footer">
              VÀO NGÀY <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3>BOT CẢM XÚC</h3>

              <p><b>Tự động thả tim bài viết của bạn bè</b></p>
            </div>
            <div class="icon">
              <i class="fa fa-heart" aria-hidden="true"></i>
            </div>
            <a href="camxuc.php" class="small-box-footer">
              VÀO NGAY <i class="fa fa-arrow-circle-right"></i>
            </a>
          </div>
        </div>
        <!-- ./col -->
      </div>		  		


 <div class="panel panel-default">
                   <div class="panel-heading">
                             <b><i class="fa fa-gears"></i> Lịch Sử Của Bạn</b>
                        </div>

<div class="panel-body">
<div class="table-responsive">
        <table id="example10" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>STT</th>
              <th>Người Mua</th>
              <th>Hành Động</th>              
              <th>Thời Gian</th>
            </tr>
          </thead>
          <tbody>
<?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `LOG_BUY` "), 0);
$req = mysql_query("SELECT * FROM `LOG_BUY` ORDER BY id DESC LIMIT $start, $kmess");
while($res = mysql_fetch_assoc($req)){
?>
<tr><td>#<?php echo $res['id']; ?></td>
<td><i class="fa fa-fw fa-user-plus"></i> <?php echo $res['nguoiadd']; ?></td>
              <td>
               Mua Gói <b><?php echo $res['loaivip']; ?></b> Cho </b><?php echo $res['idvip']; ?></b></td>
              <td>
                <i class="fa fa-fw fa-clock-o"></i><?php echo $res['thoigian']; ?></td>
            </tr>
<?php
}
?>

</tbody>
        </table></div>
<?php if ($tong > $kmess){
			echo '<center>' . phantrang_tomdz('index.php?', $start, $tong, $kmess) . '</center>';
			} ?>
       
      </div>

</div></div></div>
    
<?php
}}
include 'like_hethong/foot.php';
?>