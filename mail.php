<?php
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
//Load Composer's autoloader (created by composer, not included with PHPMailer)
if(isset($_POST["send"]))
{    
require 'Exception.php';
require 'PHPMailer.php';
require 'SMTP.php';
$name=$_POST["name"];
$em=$_POST["email"];
$ph=$_POST["phone"];
$sub=$_POST["subject"];
$comm=$_POST["comment"];
//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);
try {
//Server settings
$mail->isSMTP();//Send using SMTP
$mail->Host= 'smtp.gmail.com';//Set the SMTP server to send through
$mail->SMTPAuth   = true; //Enable SMTP authentication
$mail->Username   = 'brijeshpandey.tops@gmail.com';//SMTP username
$mail->Password   = 'edat oxtz fcfh iknw';//SMTP password
$mail->SMTPSecure = 'TLS';//Enable implicit TLS encryption
$mail->Port       = 587; //TCP port to connect to; use 587 
//Recipients
$mail->setFrom($_POST["email"], 'Mailer');
$mail->addAddress('brijeshpandey.tops@gmail.com', 'Admin'); //Add a recipient
//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Contact us enquiry customer details';
$mail->Body    = '<img src="https://media.lordicon.com/icons/wired/lineal/177-envelope-send.gif" alt="img" />
<p><b>Name :</b>$name</p>
<p><b>Email :</b>$em</p>
<p><b>Phone :</b>$ph</p>
<p><b>Subject :</b>$sub</p>
<p><b>Comment :</b>$comm</p>';
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
$mail->send();
// echo 'Message has been sent';
echo "<script>
Swal.fire({
title: 'Hey',
text: 'Thanks for contact with us we will contact with you soon!',
icon: 'success'
});

</script>";

} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>

<script src="https://cdn.jsdelivr.net/npmsweetalert2@11"></script>
