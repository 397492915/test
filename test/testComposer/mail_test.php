<?php

include "../vendor/autoload.php";
// Create the Transport
$transport = Swift_SmtpTransport::newInstance('smtp.163.com', 25)
	->setUsername('kaiziwangkai3@163.com')
	->setPassword('1043015688');
$mailer = Swift_Mailer::newInstance($transport);
$message = Swift_Message::newInstance('Wonderful Subject')
	->setFrom(array('kaiziwangkai3@163.com' => 'kai'))
	->setTo(array('397492915@qq.com'))
	->setBody('Here is the message itself');
$result = $mailer->send($message);
echo $result;
