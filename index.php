<?php

require __DIR__."/lib_ext/autoload.php";

use Notificarion\Email;

$notification = new Email();
$notification->sendEmail(
	"Assunto de teste composer",
	"<p>composer teste <b>Notification</b></p>",
	"souzajrmar@gmail.com",
	"soujrmar",
	"abbathdeath@gmail.com",
	"ArthWorks"
	);

var_dump(
	$notification
);
