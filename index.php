<?php
require("PHPMailer/src/PHPMailer.php");
require("PHPMailer/src/SMTP.php");

if(isset($_POST['submit'])){

    $mailTo = $_POST['emailto'];
    $body = $_POST['emailBody'];

$mail = new PHPMailer\PHPMailer\PHPMailer();

//Enable SMTP debugging. 
$mail->SMTPDebug = 3;                               
//Set PHPMailer to use SMTP.
$mail->isSMTP();            
//Set SMTP host name                          
$mail->Host = "mail.smtp2go.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;                          
//Provide username and password     
$mail->Username = "pinoyfreecoder";                 
$mail->Password = 'Password_na_ginamit_mo';                           
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";                           
//Set TCP port to connect to 
$mail->Port = 2525;                                   

$mail->From = "admin@pinoyfreecoder.com";
$mail->FromName = "PinoyFreeCoder";

$mail->addAddress($mailTo, "PinoyFreeCoder");

$mail->isHTML(true);

$mail->Subject = "Test Email Notification";
$mail->Body = $body;
$mail->AltBody = "This is the plain text version of the email content";

if(!$mail->send()) 
{
    echo "Mailer Error: " . $mail->ErrorInfo;
} 
else 
{
    echo "Message has been sent successfully";
}

}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form  method="post" enctype="application/x-www-form-urlencoded">
        <label>Email To</label>
         <input type="email" name="emailto">
         <label>Content</label>
         <textarea name="emailBody" cols="30" rows="10"></textarea>
         <input type="submit" name="submit" value="Submit">
    </form>
</body>
</html>