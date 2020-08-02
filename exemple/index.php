<?php

require dirname(__DIR__, 1) . "/lib_ext/autoload.php";
require __DIR__ . "/config.php";

use JuniorCorpse\NotifyToMail\Email;

$notification = new Email(
	2,
	CONF_MAIL_HOST, // criar difine em um arquivo config.php
	CONF_MAIL_USER,// criar difine em um arquivo config.php
	CONF_MAIL_PASS,// criar difine em um arquivo config.php
	'tls'
);

$notification->boot(
	"Assunto de teste composer",
	"<p>composer teste <b>Notification com o boot</b></p>",
	"recipienth@arthworks.com.br",
	"address Name")
	->sendEmail(CONF_MAIL_SENDER['address'], CONF_MAIL_SENDER['name']);

var_dump(
	$notification
);
