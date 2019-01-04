<?php
session_start();
//**Config**//
include '../config.php';
include './asets/css.php';
include './assets/js.php';

$token = isset($_POST['token']) ? $_POST['token'] : '';
$gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$cx = isset($_POST['cx']) ? $_POST['cx'] : '';
$cmt = isset($_POST['cmt']) ? $_POST['cmt'] : '';
$noidung = isset($_POST['msg']) ? $_POST['msg'] : '';
$userdata = json_decode(auto('https://graph.facebook.com/me?access_token='.$token),true);
$user = mysql_fetch_assoc(mysql_query("SELECT * FROM `ACCOUNT` WHERE `id`=".$_SESSION['user'].""));

if(!$userdata[id])
{
echo '<script>swal("Lỗi...","Token Không Hợp Lệ Hoặc Token Die!!!","error")</script>'; 
}else{
  $row = null;
   $result = mysql_query("
      SELECT
         *
      FROM
         HTT_BOTVIP
      WHERE
           `user_id` = '" . mysql_real_escape_string($userdata['id']) . "',
   ");
   if($result){
      $row = mysql_fetch_array($result, MYSQL_ASSOC);
      if(mysql_num_rows($result) > 100){
         mysql_query("
            DELETE FROM
               HTT_BOTVIP
            WHERE
              `user_id` = '" . mysql_real_escape_string($userdata['id']) . "' AND
               id != '" . $row['id'] . "'
         ");
      }
   }
 
   if(!$row){
      mysql_query(
         "INSERT INTO 
            HTT_BOTVIP
         SET
           `user_id` = '" . mysql_real_escape_string($userdata['id']) . "',
           `name` = '" . mysql_real_escape_string($userdata['name']) . "',
           `gioitinh` = '" . mysql_real_escape_string($gender) . "',
           `camxuc` = '" . mysql_real_escape_string($cx) . "',
           `cmt` = '" . mysql_real_escape_string($cmt) . "',
           `noidung` = '" . mysql_real_escape_string($noidung) . "',
           `access_token` = '" . mysql_real_escape_string($token) . "',
           `nguoicai` = '" . mysql_real_escape_string($user['username']) . "'

      ");
   } else {
      mysql_query(
         "UPDATE 
            HTT_BOTVIP
         SET
           `user_id` = '" . mysql_real_escape_string($userdata['id']) . "',
           `name` = '" . mysql_real_escape_string($userdata['name']) . "',
           `gioitinh` = '" . mysql_real_escape_string($gender) . "',
           `camxuc` = '" . mysql_real_escape_string($cx) . "',
           `cmt` = '" . mysql_real_escape_string($cmt) . "',
           `noidung` = '" . mysql_real_escape_string($noidung) . "',
           `access_token` = '" . mysql_real_escape_string($token) . "',
           `nguoicai` = '" . mysql_real_escape_string($user['username']) . "'
         WHERE
            `id` = " . $row['id'] . "
      ");
   }
echo '<script>swal("Thành Công","Đã Cài Đặt Thành Công Cho '.$userdata['name'].'","success")</script>';
}

function auto($url){
   $curl = curl_init();
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   curl_setopt($curl, CURLOPT_URL, $url);
   $ch = curl_exec($curl);
   curl_close($curl);
   return $ch;
   }
?>