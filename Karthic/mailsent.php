<?php
require 'PHPMailer/PHPMailerAutoload.php';

$mail = new PHPMailer();

$mail->IsSMTP();

$mail->SMTPDebug = 2;

$mail->Debugoutput = 'html';

$mail->Host = 'smtp.gmail.com';

$mail->Port = 587;

$mail->SMTPSecure = 'tls';

$mail->SMTPAuth = true;

$mail->Username = 'pkarthic0512@gmail.com';

$mail->Password = "me=karthic1994";

$mail->setFrom('sample@gmail.com', 'Sathi System');

$mail->addReplyTo('rireki@gmail.com', 'Sathi System');

$mail->AddAddress('pkarthic0512@gmail.com');

$mail->IsHTML(true);

$mail->Subject    = "nice";

$mail->msgHTML('23bj34');

$mail->AltBody    = "To view the message, please use an HTML compatible email viewer!";

$mail->Body    = "Hai I composed";

if(!$mail->Send())
{
  echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
  echo "Message sent!";
}
?>