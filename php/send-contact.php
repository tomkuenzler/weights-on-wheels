<?php

	$name = @trim(stripslashes($_POST['name'])); 
	$email = @trim(stripslashes($_POST['email']));
	$subject = @trim(stripslashes($_POST['subject']));
	$phone = @trim(stripslashes($_POST['phone']));
	$message = @trim(stripslashes($_POST['message']));
	$captcha = $_POST['g-recaptcha-response'];
	$secretKey = "6LdNqBsUAAAAAJG0bLd76mynuo8nTcC_BnlbccOi";
	$ip = $_SERVER['REMOTE_ADDR'];
	$response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
	$responseKeys = json_decode($response,true);
	if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are spammer ! Get the @$%K out</h2>';
        } else {
          echo '<h2>Thanks for posting comment.</h2>';
        }

	$email_from = $email;
	$email_to = 'weightsonwheelsnj@gmail.com';//replace with your email

	$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Phone: ' . $phone . "\n\n" . 'Message: ' . $message;

	$success = @mail($email_to, $body, 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Phone: ' . $phone . "\n\n" . 'Message: ' . $message);
	
	if ($_POST["submit"] != "Send Message") 
	 die();
?>

<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<script>alert("Thank you for contacting us. We will get back to you as soon as possible.");</script>
	<meta HTTP-EQUIV="REFRESH" content="0; url=../index.html"> 
</head>