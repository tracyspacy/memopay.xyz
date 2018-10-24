<?php

require_once ('PHPMailer/src/PHPMailer.php');
require_once ('PHPMailer/src/SMTP.php');
require_once ('PHPMailer/src/Exception.php');

$mail = new PHPMailer\PHPMailer\PHPMailer;
$mail->isSMTP();
$mail->SMTPAuth = true;
$mail->SMTPSeccure = 'tls';
$mail->Host = '***********';
$mail->Port = '587';
$mail->isHTML();
$mail->Username = '***********';
$mail->Password = '**********';
$mail->Setfrom('************');
$mail->Subject = 'Request for a new campaign';

$company = $_POST['company'];
$contactperson = $_POST['contactperson'];
$email = $_POST['email'];
$admessage = $_POST['admessage'];
$date = $_POST['date'];
$amount = $_POST['amount'];

$mail->Body = "
    <html>
      <body>
                <h2> Request to run a new ad campaign </h2>
                <hr>
                <p> From company: <b> $company </b></p>
                <p> Contact person: <b> $contactperson </b></p>
                <p> E-mail: <b> $email </b></p>
                <p> Ad message: <b> $admessage </b></p>
                <p> Date of the campaign: <b> $date </b></p>
                <p> Amount of BCH addresses to reach: <b> $amount </b></p>
                <hr>
      </body>
    </html>";

$mail->AddAddress('**********');

$mail->Send();
if (headers_sent()) {
   echo("<script>location.href = 'home.html';</script>");
} else {
   exit(header("Location: home.html"));
}

?>
