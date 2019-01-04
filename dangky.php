<?php
include 'config.php';
include 'like_hethong/head.php';

?>

              
<div class="col-lg-12">
          <div class="box box-danger">
            <div class="box-header with-border">
              <h3 class="box-title">Đăng Ký Tài Khoản</h3>
            </div>
<div class="panel-body">
          <div class="input-group">
            <span class="input-group-addon">Tên Đầy Đủ</span>
            <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Họ Và Tên">
          </div> <br>           
         <div class="input-group">
            <span class="input-group-addon">Email</span>
            <input type="email" class="form-control" id="mail" name="mail" placeholder="Nhập Email Thật Để Xác Minh">
          </div>     <br>                 
          <div class="input-group">
           <span class="input-group-addon">Tài Khoản</span>
            <input type="text" class="form-control" id="username" name="username" placeholder="Nhập Tài Khoản">
          </div><br> 
         <div class="input-group">
           <span class="input-group-addon">Mật Khẩu</span>
            <input type="password" class="form-control" id="password" name="password" placeholder="Nhập Mật Khẩu">
          </div><br> 

         


<center>
<script src='https://www.google.com/recaptcha/api.js'></script>
<div class="g-recaptcha" data-sitekey="6Lf--C8UAAAAAEZVx8v_6zB6VJzXUKf4EcuJN_X9"></div>
<br>
          <center> <button id="postdata" class="btn btn-danger btn-fill btn-wd" name="dangky" onclick="dangky()">Đăng Ký</button>
                                </div></center>
          
<div id="ketqua"></div>

     </div>  

<script>
function dangky() {
if(!$('#fullname').val()) {
toastr.error('Vui Lòng Nhập Tên', 'Thông báo lỗi');
}else if(!$('#mail').val()) {
toastr.error('Email Sai Hoặc Không Đúng', 'Thông báo lỗi');
}else if(!$('#username').val()) {
toastr.error('Vui Lòng Nhập Tài Khoản', 'Thông báo lỗi');
}else if(!$('#password').val()) {
toastr.error('Vui Lòng Nhập Mật Khẩu', 'Thông báo lỗi');
}else {
xuly();
}
}
function xuly(){
var response = grecaptcha.getResponse();

if(response.length == 0){
toastr.error('Chưa Xác Minh Captcha', 'Thông báo lỗi');
    return false;
}
   
      $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Vui Lòng Đợi..');
                $.ajax({
                    url : "./like_modun/xuly_dangky.php",
                    type : "post",
                    dateType:"text",
                    data : {
                         fullname : $('#fullname').val(), 
                         username : $('#username').val(), 
                         password : $('#password').val(), 
                         mail : $('#mail').val(),
                         sdt : $('#sdt').val(), 
                         avt : $('#avt').val(), 
                         facebook : $('#facebook').val()
                         
                    },
                    success : function (result){
                        $('#ketqua').html(result);
   $('#postdata').html('Đăng Ký');
                    }
                });
            }

</script>
</div></div></div>
<?php
include 'like_hethong/foot.php';
?>