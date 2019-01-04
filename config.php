<?php
$dbopts = parse_url(getenv('DATABASE_URL'));
$db->register(new Csanquer\Silex\PdoServiceProvider\Provider\PDOServiceProvider('pdo'),
               array(
                'pdo.server' => array(
                   'driver'   => 'pgsql',
                   'user' => $dbopts["user"],
                   'password' => $dbopts["pass"],
                   'host' => $dbopts["host"],
                   'port' => $dbopts["port"],
                   'dbname' => ltrim($dbopts["path"],'/')
                   )
               )
);
?>

<?php

$host = "localhost";

$username = "user";

$password = "pass";	

$dbname = "admin_vfbn";

$connection = mysql_connect($host,$username,$password);

if (!$connection)

  {

  die('Could not connect: ' . mysql_error());

  }

mysql_select_db($dbname) or die(mysql_error());

mysql_query("SET NAMES utf8");

$hometom = "yt3.herokuapp.com";

$title = "HỆ THỐNG VIP LIKE | VIP COMMENT | BOT COMMENT | BOT CẢM XÚC - VIPFBNOW.COM";

$logo = "yt3.herokuapp.com";

$logo2 = "yt3.herokuapp.com";

$phienban = "VIP LIKE 2017";

$adminfb = "https://www.facebook.com/100006670751625";

$adminname = "Đỗ Duy Thịnh";

$idfb = "100006670751625";

$home = 'yt3.herokuapp.com';

$avtmacdinh = "https://i.imgur.com/3xMwdBO.png";



$kmess = $set_user['kmess'] > 4 && $set_user['kmess'] < 10 ? $set_user['kmess'] : 10;

$page = isset($_REQUEST['page']) && $_REQUEST['page'] > 0 ? intval($_REQUEST['page']) : 1;

$start = isset($_REQUEST['page']) ? $page * $kmess - $kmess : (isset($_GET['start']) ? abs(intval($_GET['start'])) : 0);









?>
