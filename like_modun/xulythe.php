<?php
//**Config**//
include '../config.php';
include './theme/css.php';
include './theme/js.php';
$user = isset($_POST['txtuser']) ? $_POST['txtuser'] : '';
$seri = isset($_POST['txtseri']) ? $_POST['txtseri'] : '';
$sopin = isset($_POST['txtpin']) ? $_POST['txtpin'] : '';
$mang = isset($_POST['chonmang']) ? $_POST['chonmang'] : '';
//Loai the cao (VINA, MOBI, VIETEL, VTC, GATE)
if($mang=='MOBI'){
			$ten = "Mobifone";
			$TxtCard="VMS";
		}
	else if($mang=='VIETEL'){
			$ten = "Viettel";
			$TxtCard="VTT";
		}
	else if($mang=='GATE'){
			$ten = "Gate";
			$TxtCard="FPT";
		}
	else if($mang=='VTC'){
			$ten = "VTC";
			$TxtCard="VTC";
		}
	else {$ten ="Vinaphone";
	$TxtCard="VNP";
	}
$transid = rand().'_1028';
$fields = array(
 'partnerId' => '1028',
 'telco' => $TxtCard,
 'serial' => $seri,
 'cardcode' => $sopin,
	'transId' => $transid,
	'key'=>md5('1028'.'-'.'915995589_H170949902810509_pay123'.'-'.$TxtCard.'-'.$seri.'-'.$sopin.'-'.$transid)
 );

 $ch = curl_init('http://mpay123.com/CardCharge.ashx')  ;
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	//curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
 // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
 curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_DIGEST);
 //curl_setopt($ch, CURLOPT_USERPWD, $this->api_user . ":" . $this->api_password);
 $result = curl_exec($ch);

//$status = curl_getinfo($curl, CURLINFO_HTTP_CODE);	
$result = json_decode($result);
date_default_timezone_set('Asia/Ho_Chi_Minh');
$time = time();
$status= intval($result->ResCode);
//$time = time();
if($status==1){
    $amount = intval($result->Amount);//$result['amount'];
    $amount=$amount*1000;
// kh tai khoan neu chu kh
mysql_query("UPDATE ACCOUNT SET kichhoat='1' WHERE username='".$user."'");
// luu log nap the
mysql_query("INSERT INTO `LOG_CARD` SET `nguoinhan` = '".$user."', `time`='".date("d/m/Y -
 H:i:s")."', `loaithe`='".$ten."', `mathe`='".$sopin."', `seri`='".$seri."', `menhgia`='".$amount."'");
echo '<script>
swal(
  "Thành Công",
  "Bạn Đã Nạp Thành Công Thẻ '.$ten.' Mệnh Giá '.number_format($amount, 0, ',', ',').' VNĐ",
  "success"
);
	</script>';
// cộng tiền
mysql_query("UPDATE `ACCOUNT` SET `vnd` = `vnd` + '{$amount}' WHERE `username`  ='".$user."'");
mysql_query("UPDATE `ACCOUNT` SET `toida` = `toida` + '3' WHERE `username`  ='".$user."'");
echo '<meta http-equiv=refresh content="5; URL=/napthe.php">';
}
else{ 
//echo 'Status Code:' . $status . '<hr >';   
// $error = $result['errorMessage'];


        echo '<script>toastr.error("SERIAL HOẶC MÃ THẺ KHÔNG ĐÚNG.", "NẠP THẺ");
</script>';	

       $file = "cardsai1808.log";
	$fh = fopen($file,'a') or die("cant open file");
	fwrite($fh,"TEN: ".$user.", Ma the: ".$sopin.", Seri: ".$seri.", Noi dung loi: ".$error.", Thoi gian: ".$time);
	fwrite($fh,"\r\n");
	fclose($fh);
}
?>