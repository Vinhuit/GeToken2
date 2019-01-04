<?php
if(($_GET['cmt']) && ($_GET['ngay'])){
if ($_GET['ngay'] == 30){
$vnd = array(0, 30000, 60000, 120000, 180000, 270000, 360000, 480000, 750000);
echo number_format($vnd[$_GET['cmt']]);
} elseif ($_GET['ngay'] == 60){
$vnd = array(0, 60000, 120000, 240000, 360000, 540000, 720000, 960000, 1500000);
echo number_format($vnd[$_GET['cmt']]);
} elseif ($_GET['ngay'] == 90){
$vnd = array(0, 90000, 180000, 360000, 540000, 810000, 1080000, 1440000, 2250000);
echo number_format($vnd[$_GET['cmt']]);
} else {
echo 'Không Rõ Kết Quả';
}
} 
?>