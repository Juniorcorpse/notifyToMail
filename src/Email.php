<?php


namespace JuniorCorpse\NotifyToMail;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email
{

	 /** @var array */
	 private $data;

	 /** @var PHPMailer */
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
		string $smtpSecure,
		int $port = 587,
		string $charSEt = 'utf-8',
		string $language = 'br'		
		
	) {
		$this->mail = new PHPMailer(true);
        $this->data = new \stdClass();
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
		$this->data->recipient_email = $recipient;
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
 * @param string $email
 * @return bool
 */
function is_email(string $email): bool
{
	return filter_var($email, FILTER_VALIDATE_EMAIL);
}

	/**
	 * @param string $fromAddressMail
	 * @param string $fromNameAddressMail
	 * @return bool
	 */
	public function sendEmail(string $from, string $fromName): bool
	{
		if (empty($this->data)) {
			echo "<b>Erro ao enviar o e-mail com parametros vasios:</b> ";
			return false;
		}

		if (!$this->is_email($this->data->recipient_email)) {		
			echo "<b>O e-mail de destinatário não é válido:</b> ";
			return false;
			exit;
		}
		
		if (!$this->is_email($from)) {
			echo "<b>O e-mail de remetente não é válido:</b> ";
            return false;
		}
		
		try {
			$this->mail->Subject = $this->data->subject;
            $this->mail->msgHTML($this->data->body);
            $this->mail->addAddress($this->data->recipient_email, $this->data->recipient_name);
			$this->mail->setFrom($from, $fromName);
			

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
	public function attempt($from){
		if (empty($this->data)) {
			echo "Erro ao enviar o e-mail com parametros vasios: {$this->mail->ErrorInfo} {$e->getMessage()}";
			return false;
		}
		if (!is_email($this->data->recipient_email)) {		
			echo "O e-mail de destinatário não é válido: {$this->mail->ErrorInfo} {$e->getMessage()}";
			return false;
		}
		
		if (!is_email($from)) {
			echo "O e-mail de remetente não é válido: {$this->mail->ErrorInfo} {$e->getMessage()}";
            return false;
		}
		return true;
	}

	/**
	 * @return PHPMailer
	 */
	public function mail(): PHPMailer
	{
		return $this->mail;
	}

	
}