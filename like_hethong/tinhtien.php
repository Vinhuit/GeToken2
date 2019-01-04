<?php
if(($_GET['like']) && ($_GET['ngay'])){
if ($_GET['ngay'] == 15){
$vnd = array(0, 15000, 30000, 50000, 70000, 100000, 150000, 200000);
echo number_format($vnd[$_GET['like']]);
} elseif ($_GET['ngay'] == 30){
$vnd = array(0, 30000, 50000, 80000, 120000, 170000, 250000, 340000);
echo number_format($vnd[$_GET['like']]);
} elseif ($_GET['ngay'] == 60){
$vnd = array(0, 60000, 100000, 160000, 240000, 340000, 500000, 640000);
echo number_format($vnd[$_GET['like']]);
} elseif ($_GET['ngay'] == 90){
$vnd = array(0, 90000, 150000, 240000, 360000, 410000, 750000, 980000);
echo number_format($vnd[$_GET['like']]);
} elseif ($_GET['ngay'] == 120){
$vnd = array(0, 120000, 250000, 320000, 420000, 580000, 1000000, 1320000);
echo number_format($vnd[$_GET['like']]);
} elseif ($_GET['ngay'] == 150){
$vnd = array(0, 240000, 300000, 400000, 540000, 650000, 1250000, 1660000);
echo number_format($vnd[$_GET['like']]);
} else {
echo 'Không Rõ Kết Quả';
}
} 
?>