<?php
if (isset($_POST['action'])) { // Checking for submit form
	
	$my_email = 'richard@biggrockexcavating.com'; // Change with your email address
	
	if ($_POST['action'] == 'add') {
		$name		= trim(strip_tags(addslashes($_POST['name'])));
		$email		= trim(strip_tags(addslashes($_POST['email'])));
		$phone		= trim(strip_tags(addslashes($_POST['phone'])));
		$message	= trim(strip_tags(addslashes($_POST['message'])));
		
		if ($email != '' && $message != '' && $phone != '') {
			if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$headers = 'From: ' . $email . "\r\n";
				if ($name == '') $subject = 'Message from Guest';
				else $subject = 'Message from ' . $name;

				$fullMessage = "Message:\r\n" . $message . "\r\n\r\nPhone: " . $phone;
				
				mail($my_email, $subject, $fullMessage, $headers);
				
				echo 'success|<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert"><i class="ion-close"></i></button>Thank you! We will contact you shortly.</div>';
			} else {
				echo 'error|<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ion-close"></i></button>Please enter a valid email address.</div>';
			}
		} else {
			echo 'error|<div class="alert alert-danger"><button type="button" class="close" data-dismiss="alert"><i class="ion-close"></i></button>Please fill the all required fields.</div>';
		}
	}
} else { // Submit form false
	header('Location: index.html');	
}
?>