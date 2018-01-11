<?php
/* 
*    memecached
*/
//echo extension_loaded('Memcached');
//$m = new Memcached();
//$m->addServer('127.0.0.1', 11211);
//var_dump($m->getStats());
//var_dump(get_class_methods($m));

/*
*    mongodb
*/

$doc = array(
	"name" => "MongoDB",
	"age" => 50,
	"sex" => false,
);
$con = new MongoClient('mongodb://kevin:123456@127.0.0.1:27017/test');
//$con = new MongoClient('mongodb://127.0.0.1:27017');
$con = $con->test;
$con->users->insert($doc);
$result = $con->users->find();
$return = array();
foreach($result as $id => $value){
	$temp['id'] = $id;
	$temp['name'] = $value['name'];
	$temp['age'] = $value['age'];
	array_push($return,$temp);
}
var_dump($return);
$count = $con->users->count();
var_dump($count);
