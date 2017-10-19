<?php
        $name;
        $subject;
        $email;
        $phone;
        $message;
        $captcha;
        if(isset($_POST['name'])){
          $name=$_POST['name'];
        }if(isset($_POST['subject'])){
          $subject=$_POST['subject'];
        }if(isset($_POST['email'])){
          $email=$_POST['email'];
        }if(isset($_POST['phone'])){
          $phone=$_POST['phone'];
        }if(isset($_POST['message'])){
          $email=$_POST['message'];
        }if(isset($_POST['g-recaptcha-response'])){
          $captcha=$_POST['g-recaptcha-response'];
        }
        if(!$captcha){
          echo '<script language="javascript">';
		  echo 'alert("Please check the captcha, unless you are a robot")';
		  echo '</script>';
          exit;
        }
        $secretKey = "6LdNqBsUAAAAAJG0bLd76mynuo8nTcC_BnlbccOi";
        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);
        if(intval($responseKeys["success"]) !== 1) {
          echo '<h2>You are a bot, please leave.</h2>';
        } else {
          echo '<h2>Thanks for posting message.</h2>';
        }

        $email_from = $email;
		$email_to = 'tkotter24@gmail.com';//replace with your email

		$body = 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Phone: ' . $phone . "\n\n" . 'Message: ' . $message;

		$success = @mail($email_to, $body, 'Name: ' . $name . "\n\n" . 'Email: ' . $email . "\n\n" . 'Subject: ' . $subject . "\n\n" . 'Phone: ' . $phone . "\n\n" . 'Message: ' . $message);
?>