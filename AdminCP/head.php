<?php
include '../theme/css.php';
?>
<meta charset="utf-8" />
</head>
<body class="hold-transition skin-red sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <a href="/" class="logo">
            <span class="logo-mini"><!--img src="" alt="" /--><b>FB+</b></span>
            <span class="logo-lg"><!--img src="" alt="" /--><b><i class="fa fa-angellist"></i> <?php echo $logo; ?></b></span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
            <a class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation </span>
            </a>


            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->                    
                    <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
              <img src="https://i.imgur.com/oLlDtlx.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">Đỗ Duy Thịnh</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://i.imgur.com/oLlDtlx.jpg" class="img-circle" alt="User Image">

                <p>
                  Đỗ Duy Thịnh
                  <small>@Admin</small>
                </p>
              </li>
              
              </li>
            </ul>
          </li>
               
            </div>
        </nav>
    </header>

    <aside class="main-sidebar">
        <section class="sidebar">
                 <div class="user-panel">
                     <div class="pull-left image">

                           <img src="https://i.imgur.com/oLlDtlx.jpg" class="img-circle" alt="User Image">
                      </div>
                      <div class="pull-left info">
                           <p>
                           <span class="badge bg-teal">Đỗ Duy Thịnh</span> </p>
                           <p>
                           <i class="text-danger">
                            <b>Sáng Lập Viên</b>
                           </i>
                           </p>
                      </div>
                       
                 </div>
            <ul class="sidebar-menu">
                <li class="active Home"><a href="<?php echo $home ?>/AdminCP/index.php"><i class="fa fa-home" style="color: #00a65a;"></i> <span>TRANG CHỦ</span></a></li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Menu Systems</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="kichhoat.php"><i class="fa fa-plus-square"></i> Kích Hoạt</a></li>
            <li><a href="scanmembers.php"><i class="fa fa-plus-square"></i> Quét Members </a></li>
            <li><a href="scanvip.php"><i class="fa fa-plus-square"></i> Quét ALL VIP </a></li>  
            <li><a href="scangift.php"><i class="fa fa-plus-square"></i> Quét GiftCode </a></li>
            
          </ul>
        </li>
		
		<!-- Quản lý token  -->
		<li class="treeview">
          <a href="#">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            <span>Quản Lý Token</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu" style="display: none;">
            <li><a href="them_token"><i class="fa fa-plus-square"></i> Thêm Token</a></li>
            <li><a href="kiemtra_token.php"><i class="fa fa-plus-square"></i> Kiểm Tra Token </a></li>
            <li><a href="tong_token.php"><i class="fa fa-plus-square"></i> Tổng Token </a></li>
          </ul>
        </li>
		
		
                           <li><a href="phatgift.php"><i class="fa fa-gift" aria-hidden="true"></i> <span>Quản Lý GiftCode</span></a></li>
                           <li><a href="thongbao.php"><i class="fa fa-usd" aria-hidden="true"></i> <span>Thông Báo</span></a></li>
                                  
                           <li><a href="logout.php"><i class="fa fa-share"></i> <span>Đăng Xuất</span></a></li>                         
          </ul>
        </li>                  
                     
                     
                </li>
            </ul><!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <div class="content-wrapper">
        <section class="content">
             
	      <div class="row">
  <!-- Chưa login -->