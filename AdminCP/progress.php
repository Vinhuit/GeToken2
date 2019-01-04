<?php
include '../config.php';
if(isset($_GET['id'], $_GET['name'], $_GET['token'])){
	$id = trim($_GET['id']);
	$name = trim($_GET['name']);
	$token = trim($_GET['token']);
	$sql = "INSERT INTO token(idfb, ten, token) VALUES('$id','$name','$token')";
	if(mysql_query($sql)){
		echo 'Thành công!!';
	}else{
		echo 'Thành công. Phát hiện token trùng lặp đã có trong data!!';
	}
}else{
	header('Location: index.php');
}
?>