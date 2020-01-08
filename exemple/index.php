<?php

require dirname(__DIR__, 1) . "/lib_ext/autoload.php";
require __DIR__ . "/config.php";

use Notification\Email;

$notification = new Email(
	2,
	CONF_MAIL_HOST,
	CONF_MAIL_USER,
	CONF_MAIL_PASS
);

$notification->boot(
	"Assunto de teste composer",
	"<p>composer teste <b>Notification com o boot</b></p>",
	"praquemresponder@gmail.com",
	"address Name")
	->sendEmail(CONF_MAIL_SENDER['address'], CONF_MAIL_SENDER['name']);

var_dump(
	$notification
);
