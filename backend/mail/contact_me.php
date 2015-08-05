<?php
require_once "../vendor/autoload.php";

// Check for empty fields
if(empty($_POST['name'])  		||
   empty($_POST['email']) 		||
   empty($_POST['phone']) 		||
   empty($_POST['message'])	||
   !filter_var($_POST['email'],FILTER_VALIDATE_EMAIL))
   {
	echo "No arguments Provided!";
	return false;
   }
	
$name = $_POST['name'];
$email_address = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];


$mail = new PHPMailer;

$mail->isSMTP();
$mail->SMTPAuth = true;

$mail->Host = 'smtp.gmail.com';
$mail->Username = 'kenekonomail@gmail.com';
$mail->Password = 'maerngonobae';
$mail->SMTPSecure = 'ssl';
$mail->port = 465;

$mail->isHTML();
$mail->Subject = 'Pesan baru bro dari contact form! :D';
$mail->Body = 'Dari: ' . $name . ' - ' . $email_address . '<p>Pesanya bilang begini: ' . $message . '</p>'; 
$mail->FromName = 'kenekono.com - Contact';
$mail->addAddress('kenekonomail@gmail.com', 'Kenekono');

$mail->send();

return true;   


// Create the email and send the message
// $to = 'yourname@yourdomain.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $to = 'fahrybaharudin@gmail.com'; // Add your email address inbetween the '' replacing yourname@yourdomain.com - This is where the form will send a message to.
// $email_subject = "Website Contact Form:  $name";
// $email_body = "You have received a new message from your website contact form.\n\n"."Here are the details:\n\nName: $name\n\nEmail: $email_address\n\nPhone: $phone\n\nMessage:\n$message";
// $headers = "From: noreply@yourdomain.com\n"; // This is the email address the generated message will be from. We recommend using something like noreply@yourdomain.com.
// $headers .= "Reply-To: $email_address";	
// mail($to,$email_subject,$email_body,$headers);

?>