<?php

include "../vendor/autoload.php";
 
// create a log channel
$log = new Monolog\Logger('name');
$log->pushHandler(new Monolog\Handler\StreamHandler('./log.log', Monolog\Logger::WARNING));
  
// add records to the log
$log->addWarning('Foo');
$log->addError('Bar');
