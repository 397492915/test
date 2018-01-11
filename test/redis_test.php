<?php

$redis = new Redis();
$redis->pconnect('127.0.0.1',6379);

//$redis->watch('feedback_1');
//$redis->set('feedback_1','hhh');
//$redis->multi();
//$redis->set('feedback_1','yyy');
//var_dump($redis->exec());
//echo $redis->get('feedback_1');
var_dump($redis->lpush('feedback','ffffffffff','fasdfa',3));
var_dump($redis->lrange('feedback',0,-1));
var_dump($redis->llen('feedback'));
