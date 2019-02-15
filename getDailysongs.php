<?php
require 'Meting.php';
use Metowolf\Meting;
$api = new Meting('netease');
@$songslist = file_get_contents("./DailySongs.json");
$songslist = json_decode($songslist,true);
$date = date("Ymd",time()-21600);
$i=0;
foreach ($songslist as $value) {
    if($value['date']==$date)
    $i=1;
}
if(!$i)
{
$cookie = '';//此处填写自己的cookie 如何获取cookie：https://www.meayair.com/archives/33.html
$song = $api->cookie($cookie)->dailysongs();
$songslist[] = array(
    "list" =>$song,
    "date" =>$date
    );
}
rsort($songslist);
if(file_put_contents("./DailySongs.json",json_encode($songslist)))echo "ok";
