<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'sendEmail')
{
	
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .= "From: <".$_REQUEST['con_email'].">" . "\r\n";
	$headers .= "Cc: ".$_REQUEST['con_email'] . "\r\n";
	
	$message = "First Name : ".$_REQUEST['con_fname']. "<br />";
	$message .= "Last Name : ".$_REQUEST['con_lname']. "<br />";
	$message .= "Email : ".$_REQUEST['con_email']. "<br />";
	$message .= "Phone : ".$_REQUEST['con_phone']. "<br />";
	$message .= "Message : ".$_REQUEST['con_message']. "<br />";
	
	if (mail($to,$subject,$message,$headers) ){
		
		$send_arr['response'] = 'success';
		$send_arr['message'] = 'Your message has been sent.';
		
		} else{
			
		$send_arr['response'] = 'error';
		$send_arr['message'] = "You message couldn't be sent. Please try later!";
			
			}
	echo json_encode($send_arr);
	exit;
	// Create a new PHPMailer instance
	$mail = new PHPMailer(exceptions: true);
	try {
		  // Configure the PHPMailer instance
		  $mail->isSMTP();
		  $mail->Host = 'sandbox.smtp.mailtrap.io';
		  $mail->SMTPAuth = true;
		  $mail->Username = 'bc13dd73b4c6c9';
		  $mail->Password = 'e68ebc5b1394ea';
		  $mail->SMTPSecure = 'tls';
		  $mail->Port = 2525;
		 
		  // Set the sender, recipient, subject, and body of the message 
		  $mail->setFrom($email);
		  $mail->addAddress($email);
		  $mail->setFrom($fromEmail);
		  $mail->Subject = $emailSubject;
		  $mail->isHTML( isHtml: true);
		  $mail->Body = "<p>Name: {$name}</p><p>Email: {$email}</p><p>Message: {$message}</p>";
	   
		  // Send the message
		  $mail->send () ;
		  $successMessage = "<p style='color: green; '>Thank you for contacting us :)</p>";
	} catch (Exception $e) {
		  $errorMessage = "<p style='color: red; '>Oops, something went wrong. Please try again later</p>";
echo $errorMessage;
}
}

?>