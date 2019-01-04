<?php
//**Config**//
include '../config.php';	
include './theme/css.php';
include './theme/js.php';

$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$/';
$fullname = isset($_POST['fullname']) ? $_POST['fullname'] : '';
$mail = isset($_POST['mail']) ? $_POST['mail'] : '';
$sdt = isset($_POST['sdt']) ? $_POST['sdt'] : '';
$username = isset($_POST['username']) ? $_POST['username'] : '';
$password = isset($_POST['password']) ? md5($_POST['password']) : '';
$avt = isset($_POST['avt']) ? $_POST['avt'] : '';
$about = isset($_POST['about']) ? $_POST['about'] : '';
$facebook= isset($_POST['facebook']) ? $_POST['facebook'] : '';
$code = md5($_POST['mail']);
$ip = $_SERVER['REMOTE_ADDR'];
{
$check = mysql_result(mysql_query("SELECT COUNT(*) FROM `ACCOUNT` WHERE `username`='$username'"), 0);
$checkmail = mysql_result(mysql_query("SELECT COUNT(*) FROM `ACCOUNT` WHERE `mail`='$mail'"), 0);
if (!preg_match("/^[a-zA-Z0-9]+$/",$username)) {
echo '<script>
toastr.error("Tên Tài Khoản Không Hợp Lệ.", "THÔNG BÁO");
</script>'; 
}else if(!$username || !$password){
echo '<script>
swal(
  "Lỗi...",
  "Vui Lòng Điền Đầy Đủ Thông Tin",
  "error"
);
  </script>'; 
}else if($check > 0){
echo '<script>
swal(
  "Lỗi...",
  "Tài khoản đã tồn tại",
  "error"
);
  </script>'; 
}else if($checkmail > 0){
echo '<script>
swal(
  "THÔNG BÁO",
  "Email Đã Tồn Tại Trên Hệ Thống",
  "error"
);
</script>';
}else{
mysql_query("INSERT INTO `ACCOUNT` SET
`fullname`='$fullname',
`mail`='$mail',
`sdt`='$sdt',
`username`='$username',
`password`='$password',
`vnd`=0,
`toida`=10,
`level`=1,
`kichhoat`=1,
`avt`='https://cdn3.iconfinder.com/data/icons/picons-social/57/46-facebook-512.png',
`about`='$about',
`facebook`='$facebook',
`ip`='$ip',
`macode`='$code'
");
echo '<script>
swal(
  "Thành Công",
  "Đăng ký thành công, Vui Lòng Kiểm Tra Email.",
  "success"
);
   </script>';
$to = $mail;
$subject = 'Xác Minh Tài Khoản VipFbnow.Com';
$from = 'vipfbnow@gmail.com';
 
// To send HTML mail, the Content-type header must be set
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-Type: text/html; charset=UTF-8' . "\r\n";
 
// Create email headers
$headers .= 'From: '.$from."\r\n".
    'Reply-To: '.$from."\r\n" .
    'X-Mailer: PHP/' . phpversion();
 
// Compose a simple HTML email message
$message = '<html><body>';
$message .= '<style>
.banner-color {
background-color: #eb681f;
         }
         .title-color {
         color: #0066cc;
         }
         .button-color {
         background-color: #0066cc;
         }
         @media screen and (min-width: 500px) {
         .banner-color {
         background-color: #0066cc;
         }
         .title-color {
         color: #eb681f;
         }
         .button-color {
         background-color: #eb681f;
         }
         }
      </style>
   </head>
   <body>
      <div style="background-color:#ececec;padding:0;margin:0 auto;font-weight:200;width:100%!important">
         <table align="center" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
            <tbody>
               <tr>
                  <td align="center">
                     <center style="width:100%">
                        <table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="margin:0 auto;max-width:512px;font-weight:200;width:inherit;font-family:Helvetica,Arial,sans-serif" width="512">
                           <tbody>
                              <tr>
                                 <td bgcolor="#F3F3F3" width="100%" style="background-color:#f3f3f3;padding:12px;border-bottom:1px solid #ececec">
                                    <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;width:100%!important;font-family:Helvetica,Arial,sans-serif;min-width:100%!important" width="100%">
                                       <tbody>
                                          <tr>
                                             <td align="left" valign="middle" width="50%"><span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">VipFbNow.Com</span></td>
                                             <td valign="middle" width="50%" align="right" style="padding:0 0 0 10px"><span style="margin:0;color:#4c4c4c;white-space:normal;display:inline-block;text-decoration:none;font-size:12px;line-height:20px">'.date('d/m/Y').'</span></td>
                                             <td width="1">&nbsp;</td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <tr>
                                 <td align="left">
                                    <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                       <tbody>
                                          <tr>
                                             <td width="100%">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td align="center" bgcolor="#8BC34A" style="padding:20px 48px;color:#ffffff" class="banner-color">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center" width="100%">
                                                                        <h1 style="padding:0;margin:0;color:#ffffff;font-weight:500;font-size:20px;line-height:24px">Xác Minh Tài Khoản</h1>
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                         <td align="center" style="padding:20px 0 10px 0">
                                                            <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                               <tbody>
                                                                  <tr>
                                                                     <td align="center" width="100%" style="padding: 0 15px;text-align: justify;color: rgb(76, 76, 76);font-size: 12px;line-height: 18px;">
                                                                        <h3 style="font-weight: 600; padding: 0px; margin: 0px; font-size: 16px; line-height: 24px; text-align: center;" class="title-color">Xin Chào: '.$fullname.'</h3>
                                                                        <p style="margin: 20px 0 30px 0;font-size: 15px;text-align: center;">Bạn vừa đăng ký thành công tài khoản <b>'.$username.'</b> tại hệ thống , vui lòng xác mình vào liên kết phía dưới để kích hoạt tài khoản của bạn hoặc nhấn <a href="http://vipfbnow.com/xacminh?code='.$code.'">vào đây để xác minh</a></p>
<div style="font-weight: 200; text-align: center; margin: 25px;"><a href="http://vipfbnow.com/xacminh?code='.$code.'" style="padding:0.6em 1em;border-radius:600px;color:#EEEEEE;font-size:14px;text-decoration:none;font-weight:bold" class="button-color">Xác Minh Ngay</a></div>                          
                                                                     </td>
                                                                  </tr>
                                                               </tbody>
                                                            </table>
                                                         </td>
                                                      </tr>
                                                      <tr>
                                                      </tr>
                                                      <tr>
                                                      </tr>
                                                   </tbody>
                                                </table>
                                             </td>
                                          </tr>
                                       </tbody>
                                    </table>
                                 </td>
                              </tr>
                              <tr>
';
$message .= '<td align="left">
<table bgcolor="#FFFFFF" border="0" cellspacing="0" cellpadding="0" style="padding:0 24px;color:#999999;font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                       <tbody>
                                          <tr>
                                             <td align="center" width="100%">
                                                <table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
                                                   <tbody>
                                                      <tr>
                                                         <td align="center" valign="middle" width="100%" style="border-top:1px solid #d9d9d9;padding:12px 0px 20px 0px;text-align:center;color:#4c4c4c;font-weight:200;font-size:12px;line-height:18px">Dịch Vụ Vip Like Facebook
                                                            <br><b>VipFbNow.Com Team</b>
                                                         </td>
                                                      </tr>
                                                   </tbody></table></td></tr><tr><td align="center" width="100%"><table border="0" cellspacing="0" cellpadding="0" style="font-weight:200;font-family:Helvetica,Arial,sans-serif" width="100%">
<tbody><tr><td align="center" style="padding:0 0 8px 0" width="100%"></td>';
$message .= '</tr></tbody></table></td></tr></tbody></table></td></tr></tbody></table></center></td></tr></tbody></table></div></body></html>';
mail($to, $subject, $message, $headers);
echo '<meta http-equiv=refresh content="2; URL=/index.php">';
}
exit;
}
?>