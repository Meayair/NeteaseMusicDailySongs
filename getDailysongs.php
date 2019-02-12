<?php
require 'Meting.php';
use Metowolf\Meting;
$api = new Meting('netease');
@$songslist = file_get_contents("./DailySongs.json");
$songslist = json_decode($songslist,true);
if(!isset($songslist[$date]))
{
$cookie = '__f_=1543581887358; _ntes_nnid=450c79285478bab1d7c364a471de40e7,1543581885615; _ntes_nuid=450c79285478bab1d7c364a471de40e7; UM_distinctid=167b0a13a64303-017ebf7b2d1471-3c604504-1fa400-167b0a13a657fe; WM_TID=n%2FoNMVXxoAtABUEVRUZpf98ByUZkEn2v; __utmz=94650624.1547516640.9.6.utmcsr=lackk.com|utmccn=(referral)|utmcmd=referral|utmcct=/nav/; __utma=94650624.1690422798.1544856615.1547516640.1547534334.10; usertrack=ezq0pFxH+pGo0FcIDrYyAg==; _ga=GA1.2.1184824484.1548221075; _iuqxldmzr_=32; WM_NI=NSqAeGsjh0npXhP3yPlTt9J6bBC6Q7aM%2B2bo34oPXOHJitR6syZkNUKtT68thG8x9u2kZ8frPO6UJUXJcSRPoZdkr%2BfJtQG54TOzR9sJrzVuQd0Le9O%2B%2F1PB5uz%2BqPHQRzI%3D; WM_NIKE=9ca17ae2e6ffcda170e2e6eea8c97997eebfb0ee73b7968aa7d54a878e8fbaee6da3b58bd9d47ce9e99db4d42af0fea7c3b92a8e8dbfa2e84db1b6a8d1ed7c9cb8a0d4fc5cb08cbcdac93ea29e8dd7d43da393e5d3e165f1eca1b1db458c96a795d13eb1a7968ccd5f89ac9cd7bb80ac99f899bc7ff2b596d9e57a9491fab6c95f9c96adb4d15cad86ac8cf121a696bcb2c63ff88c819bd133b196be9bd57f93bc00ade8338df5e1d2d34af7abb6ccf45c8c8f9e9bcc37e2a3; CNZZDATA1272960468=1588334571-1544852114-%7C1549960858; MUSIC_U=af0b4739d4e7529bb8212c68883f0a2bf15112e6ddb44db0b5af742da1f0211b239f350f4c2970075fd0bc4ca2ef7ca5af9e62a8590fd08a; __csrf=1d04de2587a817da74f7e7630ca83e2f; JSESSIONID-WYYY=3PvuuJUA%2FgDPrCTmtYo2se0cWWB3X6uKZFPsFVDOuwio2%2BDBAoyfV4TSY5%2F2rDR6A%5ClbS4sAkWv%2Fp6xNbsPQ7QVZK98O9BoqaQjY6yyCjnjeFRidmZV5afTHHmyWzXkzOgEyXfXuMV%2FptQWh4Yh0yEngOvXudkNMoN0vkTo4%2BeTNJhP1%3A1549966144109';
$song = $api->cookie($cookie)->dailysongs();
$date = date("Ymd",time()-21600);
$songslist[$date] = $song;
}
if(file_put_contents("./DailySongs.json",json_encode($songslist)))echo "ok";
