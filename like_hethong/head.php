<?php

session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
include 'config.php';
$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `id`=".$_SESSION['user'].""));
?>

<!doctype html>
<html lang="vi">
<head>
<title><?php echo $title ?></title>
    <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="theme-color" content="pink" />
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport" />
        <meta name="author" content="Đỗ Duy Thịnh" />
        <meta name="copyright" content="Đỗ Duy Thịnh" />
        <meta name="robots" content="index, follow" />
        <meta property="og:url" content="http://vipfbnow.com" />
        <meta property="og:type" content="website" />
    <link rel="shortcut icon" href="https://i.imgur.com/iTC7RKm.png">
    <meta property="og:image" content="https://i.imgur.com/crdf624.jpg" />
<meta name="description" content="VipFbnow.Com Hệ thống Vip Like giá rẻ được ưa chuông nhất hiện nay." />
<meta property="og:locale" content="vi_VN" />
        <meta property="og:author" content="100006670751625" />
<? include 'theme/css.php';?>
<style>
    ::-webkit-scrollbar {
    width: 8px;
    background-color: #F5F5F5;
}
::-webkit-scrollbar-thumb {
    width: 8px;
    background: #EBEEF1;
    border-radius: 15px;
}
::selection {
    color: #23282B;
    background-color: #7db95c;
}
body{
	cursor: url('../theme/arrow.cur'), auto;
}
a:hover,input:hover,select:hover,button:hover{
	cursor: url('../theme/hover.cur'), auto;
}
input[type="button"] {
    width: 120px;
    margin-left: 35px;
    display: block;
}
</style>
</head>
<body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <a href="/" class="logo">
            <span class="logo-mini"><!--img src="" alt="" /--><b>HOME</b></span>
            <span class="logo-lg"><!--img src="" alt="" /--><b><i class="fa fa-angellist"></i> <?php echo $logo; ?></b></span>
        </a>
<nav class="navbar navbar-static-top" role="navigation">
<a class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation </span>
            </a>
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <?php if(!$_SESSION['user']){ ?>
<li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">

              <img src="https://i.imgur.com/8AFtXT4.png" class="user-image" alt="User Image">
              
			  <span class="hidden-xs">Chào Khách</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header" style="background: url('https://i.imgur.com/lE5vELZ.png') center center;">
                <img src="https://i.imgur.com/oLlDtlx.jpg" class="img-circle" alt="User Image">
<p><b>Đỗ Duy Thịnh</b>
<small><b><font color="red">(Administration)</b></font></small>
                </p>
              </li>

              <!-- Menu Body --> 
<li class="user-body" style="height: 40px">
   <center>            
<p><b>MỌI THẮC MẮC LIÊN HỆ ADMIN</b></p></center>
                
                <!-- /.row -->
              </li>             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="https://www.facebook.com/messages/t/doduythinh18" class="btn btn-default btn-flat">Liên Hệ</a>
                </div>
                <div class="pull-right">
                  <a href="https://www.facebook.com/doduythinh18" class="btn btn-default btn-flat">Hỗ Trợ</a>
                </div>
              </li>
            </ul>
          </li>
                    <li>
                        <a data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
<?php } else { ?>
                    <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="<? echo $user['avt'];?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><? echo $user['fullname'];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<? echo $user['avt'];?>" class="img-circle" alt="User Image">

                <p>
                  <? echo $user['fullname'];?>
                  <small>@<? echo $user['username'];?></small>
                </p>
              </li>
              
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="<? $home; ?>/canhan" class="btn btn-default btn-flat"><i class="fa fa-fw fa-user"></i> Cá Nhân</a>
                </div>
                <div class="pull-right">
                  <a href="<? $home; ?>/chagepass.php" class="btn btn-default btn-flat"><i class="fa fa-fw fa-lock"></i> Đổi Pass</a>
                </div>
              </li>
            </ul>
          </li>
<li>
                        <a data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                <?php } ?>
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
                 <div class="user-panel">
                     <div class="pull-left image">
<?php if(!$_SESSION['user']){ ?>
                           <img class="img-circle" src="https://mir-s3-cdn-cf.behance.net/project_modules/disp/e4299734559659.56d57de04bda4.gif" alt="Avatar" width="100" height="100">
                      </div>
                      <div class="pull-left info">
                           <p>
                          Chào Khách
                           </p>
                           <p>
                           <i class="text-success">
                             Bạn Chưa Đăng Nhập
                           </i>
                           </p>
                      </div>
                 </div>
            <ul class="sidebar-menu">
                <li class="active Home"><a href="/"><i class="fa fa-home" style="color: #00a65a;"></i> <span>TRANG CHỦ</span></a></li>

                     <li><a href="/dangky.php"><i class="fa fa-user-plus" aria-hidden="true"></i> <span>Đăng Ký</span></a></li>
                           <li><a data-toggle="modal" data-target="#DANGNHAP"><i class="fa fa-sign-in"></i> <span>Đăng Nhập</span></a></li>
						   		                     <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-retweet"></i>
            <span>TOKEN + ID TOOL</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo $home; ?>/get_token.php"><i class="glyphicon glyphicon-pushpin"></i> Get Token</a></li>
            <li><a href="<?php echo $home; ?>/kiemtra_token.php"><i class="glyphicon glyphicon-eye-open"></i> Check Token Pro</a></li>
			<li><a href="/checkid.php"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i> <span>Check ID FB</span></a></li> 
			<li><a href="<?php echo $home; ?>/loctkck.php"><i class="glyphicon glyphicon-th"></i> Lọc Token Từ List</a></li>
			<li><a href="<?php echo $home; ?>/loctrungtk.php"><i class="glyphicon glyphicon-filter"></i> Lọc Trùng Token</a></li>
          </ul>
        </li>
							<li><a href="/banggia.php"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> <span>BẢNG GIÁ</span></a></li> 
							<li><a href="/qtv.php"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i> <span>QTV - ĐẠI LÝ - CTV</span></a></li> 
                           <li><a href="https://www.facebook.com/100006670751625"><i class="fa fa-support" aria-hidden="true"></i> <span>Liên Hệ</span></a></li>
<?php } else { ?>
                           <img src="<? echo $user['avt'];?>" class="img-circle" alt="User Image">
                      </div>
                      <div class="pull-left info">
                           <p>
                           <span class="badge bg-teal"><? echo $user['fullname'];?></span> </p>
                           <p>
                           <i class="text-success">
                            <i class="fa fa-fw fa-money"></i> <?php echo number_format($user['vnd'], 0, ',', ','); ?> VNĐ
                           </i>
                           </p>
                      </div>';
                       
                 </div>
            <ul class="sidebar-menu">
                <li class="active Home"><a href="/"><i class="fa fa-home" style="color: #00a65a;"></i> <span>TRANG CHỦ</span></a></li>

                     <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Store VIP</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo $home; ?>/viplike.php"><i class="fa fa-plus-square"></i> VIP LIKE</a></li>
            <li><a href="<?php echo $home; ?>/vipcmt.php"><i class="fa fa-plus-square"></i> VIP COMMENT</a></li>
			<li><a href="<?php echo $home; ?>/binhluan.php"><i class="fa fa-plus-square"></i> BOT COMMENT</a></li>
            <li><a href="<?php echo $home; ?>/vipshare.php"><i class="fa fa-plus-square"></i> VIP SHARE</a></li>
            <li><a href="<?php echo $home; ?>/camxuc.php"><i class="fa fa-plus-square"></i> BOT CẢM XÚC</a></li>
          </ul>
        </li>
		
		                     <li class="treeview">
          <a href="#">
            <i class="glyphicon glyphicon-retweet"></i>
            <span>TOKEN + ID TOOL</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="<?php echo $home; ?>/get_token.php"><i class="glyphicon glyphicon-pushpin"></i> Get Token</a></li>
            <li><a href="<?php echo $home; ?>/kiemtra_token.php"><i class="glyphicon glyphicon-eye-open"></i> Check Token Pro</a></li>
			<li><a href="/checkid.php"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i> <span>Check ID FB</span></a></li> 
			<li><a href="<?php echo $home; ?>/loctkck.php"><i class="glyphicon glyphicon-th"></i> Lọc Token Từ List</a></li>
			<li><a href="<?php echo $home; ?>/loctrungtk.php"><i class="glyphicon glyphicon-filter"></i> Lọc Trùng Token</a></li>
          </ul>
        </li>
                           <li><a href="/gift.php"><i class="fa fa-gift" aria-hidden="true"></i> <span>GIFT CODE</span></a></li>
                           <li><a href="/napthe.php"><i class="glyphicon glyphicon-usd" aria-hidden="true"></i> <span>NẠP THẺ</span></a></li>
							<li><a href="/banggia.php"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i> <span>BẢNG GIÁ</span></a></li> 
							<li><a href="/qtv.php"><i class="glyphicon glyphicon-list-alt" aria-hidden="true"></i> <span>QTV - ĐẠI LÝ - CTV</span></a></li> 
							<li><a href="/chagepass.php"><i class="glyphicon glyphicon-lock" aria-hidden="true"></i> <span>ĐỔI PASS</span></a></li>
                           <li><a href="/thoat.php"><i class="fa fa-share"></i> <span>Đăng Xuất</span></a></li>                         
          </ul>
        </li><?php } ?>                    
                     
                     
                </li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>
 <div class="content-wrapper">
        <section class="content">
                      <div class="row">