<?
ob_start();
session_start();

include '../../theme/css.php';
include '../../config.php';

echo '<title>THÊM TOKEN 1</title>';

?>
<html lang="vi">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<br>
<body>
<div class="col-sm-1 col-xs-12"></div>
<div class="col-sm-12 col-xs-12">
<div class="col-sm-12 col-xs-12">
<div class="progress progress-striped active" id="loading" style="display:none">
<div id="load" class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 0%">
</div>
</div>
</div>
<div class="col-sm-12 col-xs-12" id="add">
<div class="panel panel-info"><div class="panel-heading"><i class="fa fa-star-half-o fa-spin" aria-hidden="true"></i>
<a href="/AdminCP"><b>ADMIN</b></a> <i class="fa fa-angle-double-right" aria-hidden="true"></i><b> THÊM TOKEN VÀO HỆ THỐNG</b></div>
<div class="panel-body">

	<form>
				<textarea class="form-control" id="token" name="token" rows="10" placeholder=" Nhập danh sách token, mỗi token trên 1 dòng !!! "></textarea>
			<br />
			<center><input type="button" value="THÊM TOKEN" class="ru-submit btn btn-danger"></center>
	</form>

</div></div></div>
<div class="col-sm-6 col-xs-12" id="show" style="display:none">
<div class="panel panel-info"><div class="panel-heading"><i class="fa fa-info-circle"></i> TOKEN</div>
<div class="panel-body">

	<div id="process">
		<div style="padding-bottom: 5px;">
			<strong style="color:blue;">TRẠNG THÁI : <i class="total">0/0</i></strong>
		</div>
		<textarea class="form-control" id="live" name="live" rows="5"></textarea>
		<div style="padding-bottom: 5px;padding-top: 5px;">
			<strong style="color:red;">LỖI : <i class="totalerror_msg">0</i></strong>
		</div>
		<textarea class="form-control" id="die" name="die" rows="5"></textarea>
	</div>

</div></div></div>

<!-- <div class="col-sm-12 col-xs-12"><li class="list-group-item">THÔNG TIN:<b style="color:red;"> NULL.</b></li></div> -->
<script type="text/javascript">
	i=1;
	startnum = 0;
	load = 0;
	live = 0;
	die = 0;
	$(document).ready(function(e) {
	$('.ru-submit').click(function(){
		_account = $('#token').val().trim();
		if(_account == ""){
			alert("Null.");
		}else{
			$('#loading').css('display','block');
			$('#show').css('display','block');
			$('#add').removeClass('col-sm-12');
			$('#add').addClass('col-sm-6');
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
					}, 100);
					
				}
			}
			function gettoken(_account){
				$.post('add_token.php', {
						token : _account
						},function(graph){
							load = load + Math.ceil(100/_account_array.length);
							if(load >= 100)
							{$('#load').css('width','100\%');load = 100;}
							else{$('#load').css('width',load +'\%');}
                            datas = JSON.parse(graph);
							if(datas.error_msg){
								var htmls = $('#die').text();
								//htmls = datas.error_msg+"\n"+htmls;
								die = die + 1;
								$('#load').removeClass('progress-bar-success');
								$('#load').addClass('progress-bar-danger');
								$('#load').html(load+'\%');
								htmls = datas.error_msg+"\n"+htmls;
								$(".totalerror_msg").text(die+'/'+_account_array.length);
								$('#die').text(htmls);//(a="error",c="Get Token Thất Bại",toarst(a,datas.error_msg,c));

							}
							if (datas.access_token){
								var htmls = $('#live').text();
								htmls = datas.access_token+"\n"+htmls;
								live = live + 1;
								$('#load').removeClass('progress-bar-danger');
								$('#load').addClass('progress-bar-success');
								$('#load').html(load+'\%');
								$('#live').text(htmls);
								$(".total").text(live+'/'+_account_array.length);
								//$.post('kiemtra_token.php', {token : datas.access_token});
							}
				});
			}
		}		
	});
});
</script>
</body>
</html>