<?php
$di = new RecursiveDirectoryIterator('../');
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
if(preg_match("/error_log/i",$filename))
{
$size = $file->getSize()+$size;
echo $filename . ' - ' . $file->getSize()/1024/1024 . ' Mb (Đã xoá xong) <br/>';
unlink($filename);
}
}
echo '<br>'.$size/1024/1024.;' Mb Đã được xóa';
?>