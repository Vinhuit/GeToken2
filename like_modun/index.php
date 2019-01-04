<?php
 function get_curl($url)
    {
        $curl = curl_init();

        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_CONNECTTIMEOUT, 10);

        $str = curl_exec($curl);
        if(empty($str)) $str = $this->curl_exec_follow($curl);
        curl_close($curl);

        return $str;
    }

 function signature_hash($parnerID, $secreckey,$telco,$serial,$mathe,$tranid)
    {
        return md5($parnerID.'-'.$secreckey.'-'.$telco.'-'.$serial.'-'.$mathe.'-'.$tranid);
    }
$status='';
if(isset($_POST['fnapthe'])){
	$TxtCard = mysql_escape_string($_POST['card_type_id']);
$TxtMaThe = mysql_escape_string($_POST['pin']);
 $TxtSeri= mysql_escape_string($_POST['seri']);
 
$url = 'http://api.banthe247.com/CardCharge.ashx';
        $url .= '?partnerId=17150';
        $url .= '&telco='.$TxtCard;
        $url .= '&serial='.$TxtSeri;
        $url .= '&cardcode='.$TxtMaThe;
        $transid = rand().'_17150';
        $url .= '&transId='.$transid;
        $url .= '&key='.signature_hash('17150','781835929_90019_D247',$TxtCard,$TxtSeri,$TxtMaThe,$transid);
      
$response = get_curl($url);
 var_dump($response);die(); 
		//$status_paycard = intval($return['status']);
		
		/*if ($status_paycard == 1) {
            $check = true; //chinh lai cai font vs no bi loi mat roi phai sua tay
            $amount = intval($return['DRemainAmount']);
            
            $status = "B&#7841;n &#273;&#227; n&#7841;p th&#7867; th&#224;nh c&#244;ng v&#7899;i m&#7879;nh gi&#225; th&#7867;: " . $amount ;
        } elseif ($status_paycard == 50){
            $status = 'Th&#7867; &#273;&#227; &#273;&#432;&#7907;c s&#7917; d&#7909;ng.';
	} elseif ($status_paycard == 11 || $status_paycard == -11) {
            $status = 'Nh&#224; m&#7841;ng b&#7843;o tr&#236;, vui l&#242;ng nh&#7853;p l&#7841;i sau.';
        } elseif ($status_paycard == 53 || $status_paycard == 4) {
            $status = 'S&#7889; serial ho&#7863;c m&#227; th&#7867; kh&#244;ng &#273;&#250;ng';
        } else {
        	
            $status = 'C&#243; l&#7895;i x&#7843;y ra trong qu&#225; tr&#236;nh n&#7841;p th&#7867;, vui l&#242;ng quay l&#7841;i sau.'.$status_paycard;
        }*/
        //echo $status;
		//echo $status_paycard;
		//$amount = intval($result['return']['DRemainAmount']);
		 //echo $amount
}else{
	$status='';
}
?>

<html>
    <head>
        <title>Form nạp thẻ PayCard365</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="description" content="Thanh toán trực tuyến" />
        <!-- css -->
        <link rel="stylesheet" href="css/bootstrap.css" /> 
        <link rel="stylesheet" href="css/bootstrap-responsive.css" /> 
        <link rel="stylesheet" href="css/bootstrap-theme.css" /> 
        
        <!-- Script -->
        <script src="http://code.jquery.com/jquery-1.10.2.min.js"></script>
        <script src="js/jquery.form.js"></script> 
        <script src="js/bootstrap.min.js"></script>    
       
    </head>
    <body>
        <div style="margin: 0 auto; width: 500px;">
            
            <h3 style="margin-bottom: 20px;"><span class="label label-success">Hệ thống nạp thẻ cào trực tuyến Paycard365</span></h3>
            <div>parnerID: 17150 secreckey: 781835929_90019_D247</div>
            
            <form action="index.php" method="post" id="fnapthe" name="fnapthe">
            	<input  type="hidden" name="fnapthe" value="ok"/>
                <table class="table table-condensed table-bordered">
                    <tbody>                        
                        <tr>
                            <td>Loại thẻ</td>
                            <td>
                                <select name="card_type_id" style="width: 390px;border: 1px solid #ccc;height: 30px;">
                                    <option value="VTT">Viettel</option>
                                    <option value="VMS">Mobiphone</option>
                                    <option value="VNP">Vinaphone</option>
                                    <option value="FPT">Gate</option>
                                    <option value="VNM">Vietnammobile</option>
                                    <option value="MGC">Megacard</option>
                                    <option value="ONC">OnCash</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Mã thẻ</td>
                            <td><input type="text" value="" name="pin" style="width: 390px;border: 1px solid #ccc;height: 30px;"/></td>
                        </tr>
                        <tr>
                            <td>Seri</td>
                            <td><input type="text" value="" name="seri" style="width: 390px;border: 1px solid #ccc;height: 30px;"/></td>
                        </tr>

                    </tbody>
                </table>
				<center>
				<input class="btn btn-info" type="submit" value="Nạp thẻ"/> 
<div id="loading_napthe" style="display: none; float: center"> &nbsp;Xin mời chờ...</div><br>
<div class="label label-success" id="msg_success_napthe"></div><br>
<div class="label label-danger" id="msg_err_napthe"><?php echo $status;?></div><br>
				</center>
            </form>
        </div>
    </body>
</html>

