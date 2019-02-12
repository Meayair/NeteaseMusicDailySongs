<?php
require 'Meting.php';
use Metowolf\Meting;
$api = new Meting('netease');
@$songslist = file_get_contents("./DailySongs.json");
$songslist = json_decode($songslist,true);
if(!isset($songslist[$date]))
{
$cookie = '';//此处填写自己的cookie 如何获取cookie：https://www.meayair.com/archives/33.html
$song = $api->cookie($cookie)->dailysongs();
$date = date("Ymd",time()-21600);
$songslist[$date] = $song;
}
if(file_put_contents("./DailySongs.json",json_encode($songslist)))echo "ok";
