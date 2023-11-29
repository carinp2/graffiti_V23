<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class common
{

	private $dbModelObj;
	private $root;

	public function __construct($dbModelObj)
	{
		$this->root = $_SERVER["DOCUMENT_ROOT"];
		$this->dbModelObj = $dbModelObj;
	}

	public function getSession()
	{
		if (!isset($_SESSION)) {
			session_start();
		}

		return $_SESSION;
	}

	public function editSession($sessionObj)
	{
		if (!isset($_SESSION)) {
			session_start();
		}

		foreach ($sessionObj as $key => $value) {
			$_SESSION[$key] = $value;
		}
	}

	public function killSession()
	{
		if (!isset($_SESSION)) {
			session_start();
		}

		foreach ($_SESSION as $key => $value) {
			unset($_SESSION[$key]);
		}

		//session_unset();
	}

	public function send_mail($to, $body, $subject, $attachments = false)
	{
		$mail = new PHPMailer(true);

		try {
			//Server settings
//            $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
			$mail->isSMTP();                                            //Send using SMTP
			$mail->Host = 'smtp.ceit.cc';                     //Set the SMTP server to send through
			$mail->SMTPAuth = true;                                   //Enable SMTP authentication
			$mail->Username = 'carin@ceit.cc';                     //SMTP username
			$mail->Password = 'C8r1npr3t!xxx';                               //SMTP password
//            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
			$mail->Port = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

			//Recipients
			$mail->setFrom('carin@ceit.cc', 'RESPROMT');
			$mail->addAddress($to);     //Add a recipient

			//Attachments
//            $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
//            $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name
			#attachments
			if (isset($attachments) && $attachments) {
				if (is_array($attachments)) {
					foreach ($attachments as $attachment) {
						$mail->addAttachment($attachment);
					}
				} else {
					$mail->addAttachment($attachments);
				}
			}

			//Content
			$mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = $subject;
			$mail->Body = $body;
//            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

			if ($mail->send()) {
				$sent = true;
			} else {
				$sent = false;
			}

		} catch (Exception $e) {
			$sent = false;
		}
		return $sent;
	}

//	TODO
	public function getText($vId, $vLanguage)
	{
		$vSQL = "SELECT ".$vLanguage." AS word FROM lk_language_text where id = ?";
		$vParams = array(&$vId);

		$vResult = $this->dbModelObj->query($vSQL, $vParams)->fetchArray();

		if (isset($vResult) && !empty($vResult)) {
			return $vResult['word'];
		} else {
			return false;
		}
	}

//TODO
	public function getLookupValue($vTable, $vField, $vWhereField, $vValue, $vOrderBy = '')
	{
		$vSQL = 'SELECT '.$vField.' FROM '.$vTable.' WHERE '.$vWhereField.' = ? '.$vOrderBy;
		$params = array(&$vValue);

		$result = $this->dbModelObj->query($vSQL, $params)->fetchAll();

		if (isset($result) && !empty($result)) {
			return $result;
		} else {
			return false;
		}
	}

	/**
	 * Uses the list of alphabets, numbers as base set, then picks using array index
	 * by using rand() function.
	 *
	 * @param int $length
	 * @return string
	 */
	public function makeRandomId($vId, $length = 6)
	{
		$stringStartSpace = '0123456789';
		$stringEndSpace = '0123456789';
		$stringLength = strlen($stringStartSpace);
		$randomStartString = '';
		$randomEndString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomStartString = $randomStartString.$stringStartSpace[rand(0, $stringLength - 1)];
		}
		$randomEndString = str_shuffle($randomStartString);

		return $randomStartString.$vId.$randomEndString;
	}

	public function cleanRandomId($vRandomId, $length = 6, $min_length = -6)
	{
		$vId = substr($vRandomId, $length, $min_length);
		return $vId;
	}

}