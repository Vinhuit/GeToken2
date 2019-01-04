<?php

include 'like_hethong/head.php';
include 'theme/css.php';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
	<meta charset="UTF-8">
	<title>CHECK TOKEN - VIPFBNOW.COM</title>
	<link rel="shortcut icon" href="https://maxcdn.icons8.com/Color/PNG/512/User_Interface/like_it-512.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>
<body>
	<div class="container" style="margin-top: 15px;">
		<div class="row">
			<div class="panel panel-primary">
				<div class="panel-heading">
				
					<center><h4 class="panel-title">Check Token Avatar</h4></center>
				</div>
				<div class="panel-body">
					<div class="form-group">
						<label for="textarea" class="control-label">Nhập List Token</label>
						<textarea class="form-control" id="access_token" rows="10" placeholder="Mỗi Dòng 1 Token"></textarea>
					</div>
					<div class="form-group">
						<span class="label label-primary">Tổng: <b id="total">0</b></span>
						<span class="label label-success">Live: <b id="live">0</b></span>
						<span class="label label-danger">Die: <b id="die">0</b></span>
						<span class="label label-info">Có Avatar: <b id="avt">0</b></span>
						<span class="label label-warning">Không Avatar: <b id="noavt">0</b></span>
					</div>
					<div class="form-group">
						<center><button type="button" class="btn btn-primary" id="btn" onclick="checkLive()">Check Token</button></center>
						<button type="button" class="btn btn-primary" id="btn2" onclick="showToken()" style="display: none;">Show List Token</button>
					</div>
				</div>
			</div>
			<div id="show" style="display: none;">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">Access Token Avatar</h4>
					</div>
					<div class="panel-body">
						<textarea id="token_avt" class="form-control" rows="10" required="required"></textarea>
					</div>
				</div>
				<div class="panel panel-warning">
					<div class="panel-heading">
						<h4 class="panel-title">Access Token No Avatar</h4>
					</div>
					<div class="panel-body">
						<textarea id="token_noavt" class="form-control" rows="10" required="required"></textarea>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script type="text/javascript">
		console.log('_Neiht');
		var AVT 	= new Array();
		var NOAVT	= new Array();
		var TOKEN 	= new Array();
		function checkLive(){
			TOKEN = [], AVT = [], NOAVT = [];
			var access_token = $("#access_token").val();
			if (!access_token) {
				alert("Vui Lòng Nhập Vào Access Token");
				return;
			}
			$("#btn").html('Vui Lòng Đợi...');
			access_token = access_token.split("\n");
	        var long = access_token.length;
	        var tong = 0, live = 0, die  = 0, avt = 0, noavt = 0;
	        $("#live").text(0), $("#die").text(0), $("#total").text(0), $("#avt").text(0), $("#noavt").text(0);
	        for(var i = 0; i < long; i++){
	            ! function(i){
	                $.ajax({
	                    url: 'https://graph.facebook.com/me',
	                    type: 'GET',
	                    dataType: 'JSON',
	                    data: {
	                        access_token: access_token[i],
	                    }
	                }).success((data) => {
	                    live++;
	                    $("#live").text(live);
	                    TOKEN.push(access_token[i]);
	                    checkAvt(data.id, access_token[i]);
	                }).error((data) => {
	                    die++;
	                    $("#die").text(die)
	                }).always((data) => {
	                    tong++;
	                    $("#total").text(tong);
	                    if (tong === long) {
	                        $("#btn2").fadeIn('slow');
	                        $("#btn3").fadeIn('slow');
	                        $("#btn").html('Hoàn Tất').prop( "disabled", true);
	                        $("#btn2").fadeIn('slow');
	                    }
	                })
	            }(i)
	        }
		}
		function showToken(){
			$("#btn2").html('Vui Lòng Đợi...');
			$.each(AVT, (i, item) => {
				$("#token_avt").append(item+"\n");
			})
			$.each(NOAVT, (i, item) => {
				$("#token_noavt").append(item+"\n");
			})
			setTimeout(function(){
				$("#btn2").html('Hoàn Tất').prop( "disabled", true);
				$("#show").fadeIn('slow');
			}, 3000)
		}
		function checkAvt(id, token){
        $.getJSON('https://graph.facebook.com/'+id+'/picture?redirect=false', {}, function(data){
            if (data.data.is_silhouette == false) {
            	var avt = parseInt($("#avt").text()) + 1;
            	$("#avt").text(avt);
            	AVT.push(token);
            } else {
            	var noavt = parseInt($("#noavt").text()) + 1;
            	$("#noavt").text(noavt);
            	NOAVT.push(token);
            }
        })
    }
	</script>
</body>
</html>
<?php
include 'like_hethong/foot.php';
?>
