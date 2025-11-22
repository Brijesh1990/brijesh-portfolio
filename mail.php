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
$mail->Password   = 'jadu teyl wqkz ggjb';//SMTP password
$mail->SMTPSecure = 'TLS';//Enable implicit TLS encryption
$mail->Port       = 587; //TCP port to connect to; use 587 
//Recipients
$mail->setFrom($_POST["email"], 'Mailer');
$mail->addAddress('brijeshpandey.tops@gmail.com', 'Admin'); //Add a recipient
//Content
$mail->isHTML(true);                                  //Set email format to HTML
$mail->Subject = 'Contact us enquiry customer details';

$mail->Body = "<div style='width:100%; background:#0f0f0f; padding:30px; font-family:Arial, sans-serif;'>

  <div style='max-width:650px; margin:auto; background:#1b1b1b; border-radius:14px; 
      padding:30px; color:#e6e6e6; 
      background:linear-gradient(145deg, #1a1a1a, #111); 
      box-shadow:0 8px 20px rgba(0,0,0,0.6);'>

    <!-- Animated Header -->
    <div style='text-align:center; margin-bottom:25px;'>
      <img src='https://media.lordicon.com/icons/wired/lineal/177-envelope-send.gif' width='130' alt='Message' />
      <h2 style='color:#fff; margin-top:10px; letter-spacing:1px;'>New Contact Form Submission</h2>
    </div>

    <!-- Info Fields with Icons -->
    <div style='font-size:15px; color:#dcdcdc; line-height:1.7;'>

      <p style='margin:10px 0;'>
        <img src='https://img.icons8.com/fluency/20/user-male-circle.png' />
        <b style='margin-left:5px;'>Name:</b> $name
      </p>

      <p style='margin:10px 0;'>
        <img src='https://img.icons8.com/color/20/new-post.png' />
        <b style='margin-left:5px;'>Email:</b> $em
      </p>

      <p style='margin:10px 0;'>
        <img src='https://img.icons8.com/fluency/20/phone.png' />
        <b style='margin-left:5px;'>Phone:</b> $ph
      </p>

      <p style='margin:10px 0;'>
        <img src='https://img.icons8.com/fluency/20/topic.png' />
        <b style='margin-left:5px;'>Subject:</b> $sub
      </p>

      <!-- Highlighted Message Box -->
      <div style='margin-top:20px; padding:15px; 
          background:#202733; border-left:4px solid #4da3ff; 
          border-radius:6px;'>
        <p style='margin:0;'>
          <img src='https://img.icons8.com/fluency/20/speech-bubble-with-dots.png' />
          <b style='margin-left:5px;'>Message:</b><br/>
          $comm
        </p>
      </div>

    </div>

    <!-- CTA Button -->
    <div style='text-align:center; margin-top:35px;'>
      <a href='#' 
         style='background:#4da3ff; padding:12px 25px; 
         color:#000; text-decoration:none; font-weight:bold; 
         border-radius:25px; display:inline-block;
         box-shadow:0 4px 12px rgba(77,163,255,0.6);'>
         View Details
      </a>
    </div>

    <!-- Footer -->
    <div style='text-align:center; margin-top:25px;'>
      <img src='https://media.lordicon.com/icons/wired/lineal/975-check.gif' width='80' />
      <p style='color:#888; font-size:13px; margin-top:10px;'>
        This email is automatically generated from your website.
      </p>
    </div>

  </div>

</div>";


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
