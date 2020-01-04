<?php


namespace Notificarion;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

class Email
{

	/** @var \stdClass */
	private $mail;

	public function __construct()
	{
		$this->mail = new PHPMailer(true);

		//Server settings
		$this->mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
		$this->mail->isSMTP();                                            // Send using SMTP
		$this->mail->Host       = 'smtp.sendgrid.net';                    // Set the SMTP server to send through
		$this->mail->SMTPAuth   = true;                                   // Enable SMTP authentication
		$this->mail->Username   = 'apikey';                               // SMTP username
		$this->mail->Password   = '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';// SMTP password
		$this->mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
		$this->mail->Port       = 587;                                    // TCP port to connect to
		$this->mail->CharSet    = 'utf-8';
		$this->mail->setLanguage('br');
		$this->mail->isHTML(true);


		//Recipients
		$this->mail->setFrom('souzajrmar@gmail.com', 'JrSouza');
	}

	public function sendEmail(string $subject, string $body, string $recipient, string $recipientName, string $addressMail, string $addressName)
	{
		$this->mail->Subject = $subject;
		$this->mail->Body = $body;
		$this->mail->addReplyTo($recipient, $recipientName);
		$this->mail->addAddress($addressMail, $addressName);

		try{
			$this->mail->send();
		}catch (Exception $e){
			echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
		}
	}

}