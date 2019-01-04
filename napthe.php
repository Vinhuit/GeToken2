<?php
/*
     * @ Code VIP FACEBOOK Được Viết Đỗ Duy Thịnh
     *
     * @ Liên hệ: 0981100940 (SMS Only) nếu gặp lỗi.
     *
     */		
?>
<?php
session_start();
include 'config.php';
include 'like_hethong/head.php';
include 'like_hethong/functions.php';
$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `id`=".$_SESSION['user'].""));
$tk = $user['username'];
?>
<div class="small-box bg-red"><h4><center> NẠP DƯỚI 300K KHUYẾN MÃI 50% - NẠP TRÊN 300K KHUYẾN MÃI 100% GIÁ TRỊ THẺ NẠP - CHỈ ÁP DỤNG VỚI HÌNH THỨC NẠP QUA MEGA VÀ VIETCOMBANK </h4></div>
<?php
if(!$_SESSION['user']){
?>
<!-- chưa login -->
<?php
}else{
?>
<div class="col-sm-6">
                <div class="panel panel-default">
                   <div class="panel-heading"><i class="fa fa-cogs"></i><b> NẠP TIỀN ACCOUNT</b>
</div>
<div class="panel-body">
<div class="input-group">
<span class="input-group-addon"><i class="fa fa-fw fa-shield"></i> Tài Khoản</span>
                    <b><input type="text" class="form-control" id="txtuser" name="txtuser" value="<? echo $tk;?>" disabled=""></b>
                </div> <br>
           <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-dashboard"></i> Chọn Mạng</span>
                    <select name="chonmang" id="chonmang" class="form-control" data-toggle="tooltip" data-title="Nhà Mạng"/>
		  <option value="VIETEL">Viettel</option>
		  <option value="MOBI">Mobifone</option>
		  <option value="VINA">Vinaphone</option>
		  <option value="GATE">Gate</option>
		  <option value="VTC">VTC</option>
                    </select>
                </div><br>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-credit-card"></i> Mã Serial</span>
                    <input type="text" class="form-control" name="txtseri" id="txtseri" placeholder = "Nhập mã serial nằm sau thẻ" value="" data-toggle="tooltip" data-title="Mã seri nằm sau thẻ" required="" autofocus="">
                </div>
<br/>
            <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-fw fa-credit-card"></i> Mã Thẻ</span>
                    <input type="text" class="form-control" name="txtpin" id="txtpin" placeholder="Nhập mã số sau lớp bạc mỏng" value="" data-toggle="tooltip" data-title="Mã số sau lớp bạc mỏng" required="" autofocus="">
                </div>
<br/></div>
<div class="modal-footer">                
<center><button id="postdata" class="btn btn-danger" name="napthe" onclick="napthe()"><i class="fa fa-fw fa-cart-plus"></i> Nạp Ngay</button></center>      
                </div><!--end .form_row_right-->
                
<div id="ketqua"></div>
        
    
</div>
</div>

<script>
function napthe() {
if(!$('#txtuser').val()) {
swal(
  'Ồh...',
  'Bạn chưa nhập User!',
  'error');
}else
if(!$('#txtseri').val()) {
toastr.error("Vui Lòng Nhập Mã Serial", "NẠP THẺ");
}else if(!$('#txtpin').val()) {
toastr.error("Vui Lòng Nhập Mã Thẻ", "NẠP THẺ");
}else {
xuly();
}
}

   function xuly(){
      $('#postdata').html('<i class="fa fa-spinner fa-spin"></i> Đang Xử Lý');
                $.ajax({
                    url : "./like_modun/xulythe.php",
                    type : "post",
                    dateType:"text",
                    data : {
                         txtuser : $('#txtuser').val(), 
                         txtpin : $('#txtpin').val(),
                         txtseri : $('#txtseri').val(),
                         chonmang : $('#chonmang').val()
                    },
                    success : function (result){
                        $('#ketqua').html(result);
   $('#postdata').html('Nạp Thẻ');
                    }
                });
            }

</script>



<div class="col-sm-6">
                <div class="panel panel-default">
                   <div class="panel-heading">
<i class="fa fa-cogs"></i> <b>Nạp Tiền Qua Ví Điện Tử Và Banking</b>
</div>
<div class="panel-body">
<div class="table-responsive">
<table class="table table-bordered">
<thead>
<tr class="active">
<th><center>Ngân hàng</center></th>
<th><center><font color="red">Thông tin chuyển khoản</font></center></th></tr></thead><tbody>

<tr><td><center><b>VIETCOMBANK</b><br><img src="https://i.imgur.com/TyrUYHN.jpg" width="200" height="65"></center></td><td><b>- Số tài khoản: <font color="blue">0141000176722</font></b><br>
- Tên : <b><font color="blue">DO DUY THINH</font></b><br>
- Chi nhánh: <font color="blue">Chi Nhánh Quảng Ninh</font><br>
- Nội Dung Chuyển Khoản: <font color="blue"><b>(TK của bạn) Nap Tien</b></font><br>
</td></tr>

<tr><td><center><b>MEGA CARD</b><br><img src="https://megacard.vn/images/logo.png" width="200" height="65"></center></td><td><b>- Tài khoản: <font color="red">jinjinn07@gmail.com</font></b><br>
- Tên : <b><font color="red">Đỗ Duy Thịnh</font></b><br>
- Nội Dung Chuyển Khoản: <font color="red"><b>(TK của bạn) Nap Tien</b></font><br>
</td></tr>

<tr><td><center><b>THẺ CÀO SIÊU RẺ</b><br><img src="/theme/img/tcsr.png" width="200" height="65"></center></td><td><b>- Tài khoản: <font color="red">jinjinn07</font></b><br>
- Tên : <b><font color="red">Đỗ Duy Thịnh</font></b><br>
- Nội Dung Chuyển Khoản: <font color="red"><b>(TK của bạn) Nap Tien</b></font><br>
</td></tr>

</tbody></table>
</div>            
  </div>
</div>  </div> 
<div class="col-sm-12">
                <div class="panel panel-default">
                   <div class="panel-heading">
<i class="fa fa-cogs"></i><b> LỊCH SỬ NẠP</b>
</div>
<div class="panel-body">
	
	<div class="table-responsive">
        <table id="example10" class="table table-bordered table-striped">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tài Khoản</th>
              <th>Loại Thẻ</th>
              <th>Mã Thẻ</th>
              <th>Mã Seri</th>
              <th>Nạp Lúc</th>
              <th>Mệnh Giá</th>
            </tr>
          </thead>
          <tbody>
            <?php
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `LOG_CARD` WHERE `nguoinhan`= '$tk'"), 0);
$req = mysql_query("SELECT `id`, `loaithe`, `nguoinhan`, `mathe`, `seri`, `time`, `menhgia` FROM `LOG_CARD` WHERE `nguoinhan`= '$tk' ORDER BY id DESC LIMIT $start, $kmess");
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
       </div>
<?php if ($tong > $kmess){
			echo '<center>' . phantrang_tomdz('napthe.php?', $start, $tong, $kmess) . '</center>';
			} ?>
</div>  
</div>
</div>


</div>
<?php
include 'like_hethong/foot.php';
}
?>
