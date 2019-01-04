<?php
header('Content-Type: text/html; charset=utf-8');
define('CORE_API_HTTP_USR', 'merchant_19002');
define('CORE_API_HTTP_PWD', '19002mQ2L8ifR11axUuCN9PMqJrlAHFS04o');
//**Config**//
include '../config.php';
include './asets/css.php';
include './assets/js.php';
//**Config**//
$bk = 'https://www.baokim.vn/the-cao/restFul/send';
$seri = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
$sopin = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
$mang = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';
$user = isset($_POST['txtuser']) ? $_POST['txtuser'] : '';
if($mang == 'LIKEFB')
{
$tong = mysql_result(mysql_query("SELECT COUNT(*) FROM `TheCao_LIKE` WHERE `mathe` ='".$sopin."' && `seri` ='".$seri."'"), 0); 
//echo $tong; exit;
if($tong == 0)
{
echo '<script>
swal(
  "Lỗi...",
  "['.date("H:i:s").'] Thẻ Sai Hoặc Chưa Đăng Ký Phát Hành",
  "error"
);
</script>';	
}
else
{
$info = mysql_fetch_array(mysql_query("SELECT * FROM `TheCao_LIKE` WHERE `mathe` ='".$sopin."' && `seri` ='".$seri."' LIMIT 1"));
mysql_query("UPDATE `ACCOUNT` SET `vnd` = `vnd` + '".$info[menhgia]."' WHERE `username`  ='".$user."'");
mysql_query("INSERT INTO `LOG_CARD` SET `nguoinhan` = '".$user."', `time`='".date("H:i:s")."', `mathe`='".$sopin."', `seri`='".$seri."', `menhgia`='".$info[menhgia]."'");
mysql_query("DELETE FROM `TheCao_LIKE` WHERE id='" . mysql_real_escape_string($info[id]) . "'");
echo '<script>
swal(
  "Thành Công",
  "['.date("H:i:s").'] Bạn đã nạp thành công thẻ LIKEFB Card mệnh giá '.$info[menhgia].' VNÐ",
  "success"
);
	</script>';
}
exit;
}


	if($mang=='MOBI'){
			$ten = "Mobifone";
		}
	else if($mang=='VIETEL'){
			$ten = "Viettel";
		}
	else if($mang=='GATE'){
			$ten = "Gate";
		}
	else if($mang=='VTC'){
			$ten = "VTC";
		}
	else $ten ="Vinaphone";

//M? MerchantID dang kí trên B?o Kim
$merchant_id = '30818';
//Api username 
$api_username = 'vipfbnowcom';
//Api Pwd d
$api_password = 'C6Mr63odoWqBVvvYMbpx';
//M? TransactionId 
$transaction_id = time();
//mat khau di kem ma website dang kí trên B?o Kim
$secure_code = 'd729e3d0ad956c22';

$arrayPost = array(
	'merchant_id'=>$merchant_id,
	'api_username'=>$api_username,
	'api_password'=>$api_password,
	'transaction_id'=>$transaction_id,
	'card_id'=>$mang,
	'pin_field'=>$sopin,
	'seri_field'=>$seri,
	'algo_mode'=>'hmac'
);

ksort($arrayPost);

$data_sign = hash_hmac('SHA1',implode('',$arrayPost),$secure_code);

$arrayPost['data_sign'] = $data_sign;

$curl = curl_init($bk);

curl_setopt_array($curl, array(
	CURLOPT_POST=>true,
	CURLOPT_HEADER=>false,
	CURLINFO_HEADER_OUT=>true,
	CURLOPT_TIMEOUT=>30,
	CURLOPT_RETURNTRANSFER=>true,
	CURLOPT_SSL_VERIFYPEER => false,
	CURLOPT_HTTPAUTH=>CURLAUTH_DIGEST|CURLAUTH_BASIC,
	CURLOPT_USERPWD=>CORE_API_HTTP_USR.':'.CORE_API_HTTP_PWD,
	CURLOPT_POSTFIELDS=>http_build_query($arrayPost)
));

$data = curl_exec($curl);

$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

$result = json_decode($data,true);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = date("H:i:s d/m/Y");
//$time = time();
//$status=200;
if($status==200){
    $amount = $result['amount'];
    //$amount = '10000';
	switch($amount) {
		case 10000: $xu = 10000; break;
		case 20000: $xu = 20000; break;
		case 30000: $xu = 30000; break;
		case 50000: $xu= 50000; break;
		case 100000: $xu = 100000; break;
		case 200000: $xu = 200000; break;
		case 300000: $xu = 300000; break;
		case 500000: $xu = 500000; break;
		case 1000000: $xu = 1000000; break;
	}
	
	
	
	mysql_query("UPDATE `ACCOUNT` SET `vnd` = `vnd` + '".$xu."' WHERE `username`  ='".$user."'");

    // Xu ly thong tin tai day
	$file = "carddung.log";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"Tai khoan: ".$user.", Loai the: ".$ten.", Menh gia: ".$amount.", Thoi gian: ".$time);
	fclose($fh);
      echo '<script>alert("['.date("H:i:s").'] Bạn đã thanh toán thành công thẻ '.$ten.' mệnhnh giá '.$amount.'");
	
	
	 window.location = "/index"
	</script>';
	

}
else{ 
	//echo 'Status Code:' . $status . '<hr >';   
    $error = $result['errorMessage'];
	//echo $error;
    $file = "cardsai.log";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"Tai khoan: ".$user.", Ma the: ".$sopin.", Seri: ".$seri.", Noi dung loi: ".$error.", Thoi gian: ".$time);
	fclose($fh);
    echo '<script>alert("['.date("H:i:s").'] '.$error.'");
	
	
	 window.location = "./napthe.php"
	</script>';
	
	
}
?>
<?php
include 'foot.php';
?>