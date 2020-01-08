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


	/**
	 * Email constructor.
	 * @param int $smtpDegug
	 * @param string $host
	 * @param string $user
	 * @param string $passwd
	 * @param string $smtpSecure
	 * @param int $port
	 * @param string $charSEt
	 * @param string $language
	 */
	public function __construct(
		int $smtpDegug,
		string $host,
		string $user,
		string $passwd,
		string $smtpSecure = PHPMailer::ENCRYPTION_STARTTLS,
		int $port = 587,
		string $charSEt = 'utf-8',
		string $language = 'br'
	) {
		$this->data = new \stdClass();

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
	}

	/**
	 * @param string $subject
	 * @param string $body
	 * @param string $recipient
	 * @param string $recipientName
	 * @return Email
	 */
	public function boot(string $subject, string $body, string $recipient, string $recipientName): Email
	{
		$this->data->subject = $subject;
		$this->data->body = $body;
		$this->data->recipient_mail = $recipient;
		$this->data->recipient_name = $recipientName;
		return $this;
	}

	/**
	 * @param string $filePath
	 * @param string $fileName
	 * @return Email
	 */
	public function attach(string $filePath, string $fileName): Email {
		$this->data->attach[$filePath] = $fileName;
		return $this;
	}

	/**
	 * @param string $fromAddressMail
	 * @param string $fromNameAddressMail
	 * @return bool
	 */
	public function sendEmail(string $fromAddressMail, string $fromNameAddressMail): bool
	{
		try {
			$this->mail->Subject = $this->data->subject;
			$this->mail->msgHTML($this->data->body);
			$this->mail->addAddress($this->data->recipient_mail, $this->data->recipient_name);
			$this->mail->setFrom($fromAddressMail, $fromNameAddressMail);

			if (!empty($this->data->attach)) {
				foreach ($this->data->attach as $path => $name) {
					$this->mail->addAttachment($path, $name);
				}
			}

			$this->mail->send();
			return true;
		} catch (Exception $e) {
			echo "Erro ao enviar o e-mail: {$this->mail->ErrorInfo} {$e->getMessage()}";
			return false;
		}
	}

	/**
	 * @return PHPMailer
	 */
	public function mail(): PHPMailer
	{
		return $this->mail;
	}
}