<?php
include '../config.php';
include '../like_hethong/head.php';
include "../theme/css.php";
?>

<?php
if(!$_SESSION['user']){
?>

<meta http-equiv=refresh content="0; URL=/index.php">
<script>alert("ĐĂNG NHẬP ĐI BẠN !!!!"); </script>

<?php
}else{
$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `id`=".$_SESSION['user'].""));
if($user['kichhoat'] <  1) { 
echo'
   
   <div class="col-md-12">
                <div class="card panel-default">
                       <div class="header">
                           <h5 class="title">Thông Báo Mới</h5>
                    <div class="panel-body">
<div class="alert alert-warning">
<center>
<b style="color:red">Tài Khoản Chưa Kích Hoạt! Vui Lòng Liên Hệ Admin Để Kích Hoạt</b><br>
Nhắn Tin Tới : https://www.facebook.com/doduythinh18 <br>
Nội Dung : <b>KH</b><br>
Sau Đó Nhập :  '.$user['username'].'
</center>
</div></div></div></div></div></div></div></div>';
			 } else {
?>




<div class="col-md-4">
          <!-- Widget: user widget style 1 -->
          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-black" style="background: url('http://i.imgur.com/wSqj1mJ.jpg') center center;">
              <h3 class="widget-user-username"><strong><? echo $user['fullname'];?> <img title="Đã xác nhận tài khoản" width="20px" height="20px" src="http://i.imgur.com/6A606y5.png"></strong></h3>
              <h5 class="widget-user-desc">@<? echo $user['username'];?></h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<? echo $user['avt'];?>" alt="User Avatar">
            </div>
            <div class="box-footer">
<center><font size="2">GIỚI THIỆU</font></center><br>
                  <!-- /.description-block -->
                <center><? echo $user['about'];?><center>
              
              <!-- /.row -->
            </div>
          </div>
          <!-- /.widget-user -->
        </div>




                                
                            

<div class="col-md-8">
                        <div class="panel panel-default">
                   <div class="panel-heading">
                                        <span class="pull-right text-muted"><i class="fa fa-check"></i></span>
                                        Cập Nhật Thông Tin
                                    </div>

                            <div class="content">
<div class="col-md-6">
                                            <div class="form-group">
                                                <label>User Name</label>
                                                <input type="text" class="form-control" disabled="" placeholder="Company" id="username" value="<? echo $user['username'];?>">
                                            </div>
                                        </div>
<div class="col-md-6">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Email address</label>
                                                <input type="email" class="form-control" placeholder="Email" id="mail" name="mail"  value="<? echo $user['mail'];?>">
                                            </div>
                                        </div>
                                    

                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tên Hiển Thị</label>
                                                <input type="text" class="form-control" placeholder="Company" id="ten"  name="ten" value="<? echo $user['fullname'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>SĐT</label>
                                                <input type="text" class="form-control" placeholder="Last Name" id="sdt" name="sdt" value="<? echo $user['sdt'];?>">
                                            </div>
                                        </div>
                                    

                                    
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control" placeholder="ID FACEBOOK" id="facebook" name="facebook" value="<? echo $user['facebook'];?>">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Ảnh Đại Diện</label>
                                                <input type="text" class="form-control" placeholder="Link Ảnh" id="avt" name="avt" value="<? echo $user['avt'];?>">
                                            </div>
                                        </div>
                                    

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>About Me</label>
                                                <textarea rows="5" class="form-control" placeholder="Giới thiệu về bản thân" name="about" id="about" value=""><? echo $user['about'];?></textarea>
                                            </div>
                                        </div></div>
                                  <div class="box-footer">
                                   <button id="postdata" class="btn btn-info btn-fill pull-right" name="update" onclick="update()">Cập Nhật</button>
                                   <div class="clearfix"></div>
                            </div>
                           
<div id="ketqua"></div>
                        
          
</div>
 <script>
function update() {
if(!$('#mail').val()) {
swal(
  'Ồh...',
  'Lỗi Bạn Chưa Nhập Mail!',
  'error'
);
}else if(!$('#facebook').val()) {
swal(
  'Ồh...',
  'Lỗi Bạn Chưa Nhập ID FACEBOOK!',
  'error'
);
}else if(!$('#ten').val()) {
swal(
  'Ồh...',
  'Lỗi Bạn Chưa Nhập Tên!',
  'error'
);
}else if(!$('#sdt').val()) {
swal(
  'Ồh...',
  'Lỗi Bạn Chưa Nhập SĐT!',
  'error'
);
}else if(!$('#avt').val()) {
swal(
  'Ồh...',
  'Lỗi Bạn Chưa Nhập Ảnh Đại Diện!',
  'error'
);
}else if(!$('#about').val()) {
swal(
  'Ồh...',
  'Lỗi Bạn Chưa Nhập Thông Tin!',
  'error'
);
}else {
xuly();
}
}

   function xuly(){
      $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
                $.ajax({
                    url : "/canhan/xuly.php",
                    type : "post",
                    dateType:"text",
                    data : {
                         username : $('#username').val(),
                         mail : $('#mail').val(),
                         ten : $('#ten').val(), 
                         sdt : $('#sdt').val(), 
                         avt : $('#avt').val(), 
                         facebook : $('#facebook').val(), 
                         about : $('#about').val()
                    },
                    success : function (result){
                        $('#ketqua').html(result);
   $('#postdata').html('UPDATE');
                    }
                });
            }

</script>
</div></div></div>
<?php }} ?>
<?php
include "../theme/js.php";
include '../like_hethong/foot.php';
?>