<meta charset="utf-8" />
<title>Scan GiftCode | VIPFBNOW.COM</title>
<?php
session_start();
include '../config.php';
if(!$_SESSION['admin']){
header('Location: index.php');
exit;
}
$q4 = "SELECT id,time,menhgia FROM  Gift_LIKE";
$rows4 = $db->query($q4);
foreach($rows4 as $time4){
    if($time4[1] <= time()){
        $sql = "DELETE FROM Gift_LIKE WHERE id=$time4[0]";
        $db->exec($sql);
        echo 'Đã Xóa Gift Code <font color="red"><b>#'.$time4[0].'</b></font> Giá <b>#'.$time4[2].' VNĐ</b></font><br>';
    }else{
       echo 'GiftCode: <font color="green"><b>#'.$time4[0].'</b></font> Giá <b>#'.$time4[2].' VNĐ</b> Vẫn Còn Hiệu Lực<br>';
}
}
?>