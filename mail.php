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
$mail->Body ="
<div style='width:100%; background:#f5f7fa; padding:20px; font-family:Arial, sans-serif;'>

  <div style='max-width:600px; margin:auto; background:#ffffff; border-radius:10px; padding:25px; box-shadow:0 4px 12px rgba(0,0,0,0.1);'>

    <div style='text-align:center; margin-bottom:20px;'>
      <img src='https://media.lordicon.com/icons/wired/lineal/177-envelope-send.gif' width='120' alt='Email Sent' />
      <h2 style='margin-top:10px; color:#333;'>New Contact Form Submission</h2>
    </div>

    <div style='font-size:15px; color:#444; line-height:1.6;'>

      <p><b>Name:</b> $name</p>
      <p><b>Email:</b> $em</p>
      <p><b>Phone:</b> $ph</p>
      <p><b>Subject:</b> $sub</p>

      <div style='margin-top:20px; padding:15px; background:#f0f8ff; border-left:4px solid #007bff;'>
        <p style='margin:0;'><b>Message:</b><br>$comm</p>
      </div>

    </div>

    <div style='text-align:center; margin-top:30px;'>
      <img src='https://media.lordicon.com/icons/wired/lineal/975-check.gif' width='80' alt='Success' />
      <p style='color:#777; font-size:14px;'>This message was sent from your website contact form.</p>
    </div>

  </div>

</div>
";

$mail->send();
// echo 'Message has been sent';
echo "<script>
alert('Thanks for contact with us we will contact with you soon')
window.location='index.html';
</script>";
} catch (Exception $e) {
echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
}

?>

<script src="https://cdn.jsdelivr.net/npmsweetalert2@11"></script>
