<?php
session_start();
include 'config.php';
include 'like_hethong/head.php';
$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `id`=".$_SESSION['user'].""));
?>
<script>
	$(document).ready(function(){
    $(".form-control").tooltip({ placement: 'right'});
});
</script>
<?php
if(!$_SESSION['user']){
?>

<meta http-equiv=refresh content="0; URL=/index.php">
<script>alert("ĐĂNG NHẬP ĐI BẠN ƠI !!!!"); </script>

<?php
}else{
?>
<div class="col-md-6">
                 <div class="panel panel-default">
                   <div class="panel-heading">
<i class="fa fa-cogs"></i> MÃ QUÀ TẶNG
</div>
<div class="panel-body">
	
<div class="form-group">
<label class="control-label">Tài khoản <star>*</star></label>
<input class="form-control error" id="txtuser" type="text" value="<?php echo $user['username'];?>" disabled="">
</div>

<div class="form-group">
<label class="control-label">Mã Gift <star>*</star></label>
<input class="form-control" id="txtgif" placeholder="Mã Gift Admin Tặng"/>
</div>


<div class="footer text-center">
<button id="postdata" class="btn btn-info btn-fill btn-wd" name="napthe" onclick="napthe()">Nhập Quà</button>
</div>


<div id="ketqua"></div>


</div>  


</div></div>

<div class="col-md-6">
                 <div class="panel panel-default">
                   <div class="panel-heading">
<i class="fa fa-cogs"></i> LỊCH SỬ
</div>
<div class="panel-body">
	<div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th>Mã Dự Thưởng <star>*</star></th>
              <th>Tên</th>
              <th>Mã Gift</th>
              <th>Nhận Lúc</th>
              <th>Mệnh Giá</th>
            </tr>
          </thead>
          <tbody>
            <?php
$req = mysql_query("SELECT `id`, `nguoinhan`, `magift`, `time`, `menhgia` FROM `LOG_GIFT` WHERE `nguoinhan`= '".$user['username']."' LIMIT 10");
while($res = mysql_fetch_assoc($req)){
?>
            <tr>
              <td>
                #<?php echo $res['id']; ?>
              </td>
              <td>
                <?php echo $res['nguoinhan']; ?>
              </td>
              <td>
                <?php echo $res['magift']; ?>
              </td>
              <td>
                <?php echo $res['time']; ?>
              </td>
              <td>
                <?php echo $res['menhgia']; ?>
              </td>
            </tr>
            <?php
}
?>
          </tbody>
        </table>
       </div>
<div class="category"><star>*</star> Là mã dự thưởng khi có event.</div>
</div>
</div>  
</div>
</div>
</div>






 <script>
function napthe() {
if(!$('#txtuser').val()) {
toastr.error('Chưa nhập tên người nhận sao nhận đây', 'Thông báo lỗi');
}else if(!$('#txtgif').val()) {
toastr.error('Nhập Mã Gift Đi Nào', 'Thông báo lỗi');
}else {
xuly();
}
}

   function xuly(){
      $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
                $.ajax({
                    url : "./like_modun/xuly_gift.php",
                    type : "post",
                    dateType:"text",
                    data : {
                         txtuser : $('#txtuser').val(), 
                         txtgif : $('#txtgif').val()
                    },
                    success : function (result){
                        $('#ketqua').html(result);
   $('#postdata').html('Nạp Thẻ');
                    }
                });
            }

</script>
<?php } ?>
<? include "like_hethong/foot.php" ;?>