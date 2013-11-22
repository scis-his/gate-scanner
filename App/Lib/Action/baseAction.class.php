<?php
import("ORG.Util.Page");

class baseAction extends Action
{
	protected function _initialize()
	{
		
	}

	function exchangeEmail($stringReceiptEmail, $stringSubject, $stringBody)
	{
		require_once(dirname(__FILE__)."/../../ORG/SMTP/SMTP.class.php");
		$smtpserver = "mail.scischina.org"; //@SMTP Server Address
		$smtpserverport = 25; //SMTP PORT
		$smtpusermail = "webmaster@scischina.org"; //SMTP服务器的用户邮箱
		$smtpuser = "webmaster";//SMTP Authentication Username
		$smtppass = "web@scis";//SMTP Authentication Password
		$stringMailType = "HTML";//HTML or TXT
		$objSMTP = new SMTP($smtpserver,$smtpserverport,false,$smtpuser,$smtppass);
		$objSMTP->debug = false;
		return $objSMTP->sendmail($stringReceiptEmail, $smtpusermail, $stringSubject, $stringBody, $stringMailType);
	}

	function phpMailer($stringReceiptEmail, $stringSubject, $stringBody)
	{
		require_once(dirname(__FILE__)."/../../ORG/phpMailer/phpmailer.class.php");
		$mail = new PHPMailer;
		$mail->IsSendmail();
		$mail->From = 'webmaster@scischina.org';
		$mail->FromName = 'SCIS-HIS Webmaster';
		$mail->AddAddress($stringReceiptEmail);               // Name is optional
		//$mail->AddReplyTo('SCIS-HIS Webmaster', 'After School Activities');
		//$mail->AddCC('cc@example.com');
		//$mail->AddBCC('bcc@example.com');

		$mail->WordWrap = 50;                                 // Set word wrap to 50 characters
		//$mail->AddAttachment('/var/tmp/file.tar.gz');         // Add attachments
		//$mail->AddAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
		$mail->IsHTML(true);                                  // Set email format to HTML

		$mail->Subject = $stringSubject;
		$mail->Body    = $stringBody;
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

		if(!$mail->Send()) {
			return false;
			exit;
		}
		return true;
	}
}