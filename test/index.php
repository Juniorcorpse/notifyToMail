<?php

require dirname(__DIR__, 1) . "/lib_ext/autoload.php";

use Notificarion\Email;

define("MAIL_PASS", "sua senha aqui");
$notification = new Email(
	2,
	"test@test.com",
	"user test",
	MAIL_PASS,
	"test@test.com",
	"Test"
);
$notification->sendEmail(
	"Assunto de teste composer",
	"<p>composer teste <b>Notification</b></p>",
	"recipient@gmail.com",
	"recipient_name",
	"recipient@gmail.com",
	"address Name"
);

var_dump(
	$notification
);
