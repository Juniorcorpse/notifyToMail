<?php

require dirname(__DIR__, 1) . "/lib_ext/autoload.php";
require __DIR__."/config.php";

use Notification\Email;

$notification = new Email(
	2,
	CONF_MAIL_HOST,
	CONF_MAIL_USER,
	CONF_MAIL_PASS,
	CONF_MAIL_SENDER['address'],
	CONF_MAIL_SENDER['name']
);
$notification->sendEmail(
	"Assunto de teste composer",
	"<p>composer teste <b>Notification</b></p>",
	"souzajrmar@gmail.com",
	CONF_MAIL_SENDER['name'],
	"souzajrmar@gmail.com",
	"address Name"
);

var_dump(
	$notification
);
