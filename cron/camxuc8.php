<?php
/**
 ** Class name: VipFbNow.Com
 ** Author: Đỗ Duy Thịnh - fb.com/100006670751625
 ** Date: 20/08/2017 
 ** Tested: OK 20/10/2017 09:00:00
 */
set_time_limit(0);
require("../config.php");
$gettoken = mysql_query("SELECT * FROM `CAMXUC` ORDER BY RAND() LIMIT 70,10");
while ($row = mysql_fetch_array($gettoken)){
$matoken= $row['access_token'];
$check = json_decode(file_get_contents('https://graph.facebook.com/me?access_token='.$matoken),true);
if(!$check[id]){
@mysql_query("DELETE FROM botcx
            WHERE
               access_token ='".$matoken."'
         ");
continue;
}
$camxuc =  $row['camxuc'];
$idfb = $row['user_id'];
like($idfb,$camxuc,$matoken);
}

function _req($url){
   $opts = array(
            19913 => 1,
            10002 => $url,
            10018 => 'vipfbnow.com',
            );
   $ch=curl_init();
   curl_setopt_array($ch,$opts);
   $result = curl_exec($ch);
   curl_close($ch);
   return $result;
  }

function getData($dir,$token,$params){
    $param = array(
        'access_token' => $token,
        );
   if($params){ 
       $arrayParams=array_merge($params,$param);
       }else{
       $arrayParams =$param;
       }
   $url = getUrl('graph',$dir,$arrayParams);
   $result = json_decode(_req($url),true);
   if($result[data]){
       return $result[data];
       }else{
       return $result;
       }
   }

function getUrl($domain,$dir,$uri=null){
   if($uri){
       foreach($uri as $key =>$value){
           $parsing[] = $key . '=' . $value;
           }
       $parse = '?' . implode('&',$parsing);
       }
   return 'https://' . $domain . '.facebook.com/' . $dir . $parse; 
   }

function getLog($x,$y){
if(!is_dir('log')){   mkdir('log');   }

   if(file_exists('loger/lk_'.$x)){
       $log=file_get_contents('loger/lk_'.$x);
       }else{
       $log=' ';
       }

  if(ereg($y[id],$log)){
       return false;
       }else{
if(strlen($log) > 5000){
   $n = strlen($log) - 5000;
   }else{
  $n= 0;
   }
       saveFile('loger/lk_'.$x,substr($log,$n).' '.$y[id]);
       return true;
      }
 }

function saveFile($x,$y){
   $f = fopen($x,'w');
             fwrite($f,$y);
             fclose($f);
   }


function like($me,$c,$token){
$home=getData('me/home',$token,array(
   'fields' => 'id,from,comments.limit(100),comments.id',
   'limit' => 3,
   )
);

foreach($home as $post){
     if($post[id]){ if(getLog($me,$post) && $me!=$post[from][id]){
          print getData($post[id].'/reactions',$token,array(
                        'method' => 'post',
                        'type' => ''.$c.'',
                         )
                 );
           } }
}
}
?>