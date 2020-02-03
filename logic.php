<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php 
			// Import PHPMailer classes into the global namespace
			// These must be at the top of your script, not inside a function
			use PHPMailer\PHPMailer\PHPMailer;
			use PHPMailer\PHPMailer\SMTP;
			use PHPMailer\PHPMailer\Exception;
			// Load Composer's autoloader
			require 'vendor/autoload.php';
			require("vendor/phpmailer/phpmailer/src/PHPMailer.php");
			require("vendor/phpmailer/phpmailer/src/SMTP.php");
			require 'credential.php';
			
			$mail = new PHPMailer(true);
			$senderMail = $_POST["Email-name"];
			$subject = $_POST["subject"];
			$message = $_POST["message"];
			
			try {
				
			//$mail->SMTPDebug = 1;                               // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = EMAIL;                 // SMTP username
			$mail->Password = PASS;                           // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to
			$mail->setFrom(EMAIL, 'ArgosTech');
			$mail->addAddress('argosryt@gmail.com');     // Add a recipient
			$mail->addReplyTo(EMAIL);
			
			// Content
				$mail->isHTML(true);                                  // Set email format to HTML
				$mail->Subject = $subject;
				$mail->Body    = $senderMail . ' has sent: ' . $message;
				$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

				$mail->send();
				echo 'Message has been sent';
			} catch (Exception $e) {
				echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
			}
		
	 ?>
	 
	 <script>
	 window.onload = function() 
	 {
    // similar behavior as an HTTP redirect
    window.location.replace("/ArgosTechNew/thanks.php");
	}
	 </script>
    
</body>
</html>