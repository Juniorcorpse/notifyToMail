<?php


namespace Notification;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{

	/** @var array */
	private $data;


	/** @var \stdClass */
	private $mail;


	public function __construct(
		int $smtpDegug,
		string $host,
		string $user,
		string $passwd,
		string $setFromEmail,
		string $setFromName,
		string $smtpSecure = PHPMailer::ENCRYPTION_STARTTLS,
		int $port = 587,
		string $charSEt = 'utf-8',
		string $language = 'br'
	) {
		/*$this->data = new \stdClass();*/
		$this->mail = new PHPMailer(true);
		//Server settings
		$this->mail->SMTPDebug = $smtpDegug;          // Enable verbose debug output
		$this->mail->isSMTP();                        // Send using SMTP
		$this->mail->Host = $host;                    // Set the SMTP server to send through
		$this->mail->SMTPAuth = true;                 // Enable SMTP authentication
		$this->mail->Username = $user;                // SMTP username
		$this->mail->Password = $passwd;              // SMTP password
		$this->mail->SMTPSecure = $smtpSecure;        // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS |PHPMailer::ENCRYPTION_STARTTLS` also accepted
		$this->mail->Port = $port;                    // TCP port to connect to
		$this->mail->CharSet = $charSEt;
		$this->mail->setLanguage($language);
		$this->mail->isHTML(true);
		//Recipients
		$this->mail->setFrom($setFromEmail, $setFromName);
	}

	public function sendEmail(
		$subject,
		string $body,
		string $recipient,
		string $recipientName,
		string $addressMail,
		string $addressName
	) {

		$this->mail->Subject = (string)$subject;
		$this->mail->Body = $body;

		$this->mail->addReplyTo($recipient, $recipientName);
		$this->mail->addAddress($addressMail, $addressName);

			try {
				$this->mail->send();
			} catch (Exception $e) {
				echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
			}
	}
}