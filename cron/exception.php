<?php
/* Exception and send mail*/
require_once('class.phpmailer.php');
function notify($title,$message)
{
$mailstatus='';
$mail             = new PHPMailer(); // defaults to using php "mail()"

$mail->IsSendmail(); // telling the class to use SendMail transport

$body             =  "TITLE : ".$title."MESSAGE : ".$message;

$mail->SetFrom('bcci_cron@bcci.com', 'BCCI CRON');

$mail->AddReplyTo('bcci_cron@bcci.com', 'BCCI CRON');

$address = "manimani1014@gmail.com";
$mail->AddAddress($address, "Mani");

//$address = "aditya@digitalchakra.in";
//$mail->AddAddress($address, "Aditya");
//$address = "manikandan@digitalchakra.in";
//$mail->AddAddress($address, "Mani");

$mail->Subject    = "BCCI CRON";

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!"; // optional, comment out and test

$mail->MsgHTML($body);
/*
$mail->AddAttachment("images/phpmailer.gif");      // attachment
$mail->AddAttachment("images/phpmailer_mini.gif"); // attachment
*/
if(!$mail->Send()) {
  $mailstatus='not sent';
} else {
$mailstatus='sent';
}
$log = "TITLE : ".$title."MESSAGE : ".$message." MAIL STATUS :".$mailstatus;
	throw new Exception(date("F j, Y, g:i a").$log);

	//mail(
}
?>
