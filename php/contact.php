  <?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $subject = $_POST['subject'];
//     $message = $_POST['message'];

//     $to = "zebakhtiyar786@gmail.com";

//     $email_subject = "New Contact Form Submission: $subject";

//     $email_body = "You have received a new message from your website contact form.\n\n";
//     $email_body .= "Name: $name\n";
//     $email_body .= "Email: $email\n";
//     $email_body .= "Subject: $subject\n";
//     $email_body .= "Message:\n$message\n";

//     $headers = "From: $name <$email>\r\n";
//     $headers .= "Reply-To: $email\r\n";
//     $headers .= "Content-type: text/plain; charset=UTF-8\r\n";

//     if (mail($to, $email_subject, $email_body, $headers)) {
//         echo "Thank you for contacting us. We will be in touch shortly.";
//     } else {
//         echo "Oops! Something went wrong. Please try again later.";
//     }
// } else {
//     header("Location: ../contact.html");
//     exit;
// }



	$errors = array();

	// Check if name has been entered
	if (!isset($_POST['name'])) {
		$errors['name'] = 'Please enter your name';
	}

	// Check if email has been entered and is valid
	if (!isset($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$errors['email'] = 'Please enter a valid email address';
	}
        
        // Check if phone has been entered and is valid
	// if (!isset($_POST['phone'])) {
	// 	$errors['phone'] = 'Please enter your phone number';
	// }
        
    //     // Check if city has been entered and is valid
	// if (!isset($_POST['city'])) {
	// 	$errors['city'] = 'Please enter your city name';
	// }
        
        // Check if phone has been entered and is valid
	if (!isset($_POST['subject'])) {
		$errors['subject'] = 'Please enter your subject';
	}

	//Check if message has been entered
	if (!isset($_POST['message'])) {
		$errors['message'] = 'Please enter your message';
	}

	$errorOutput = '';

	if(!empty($errors)){

		$errorOutput .= '<div class="alert alert-danger alert-dismissible" role="alert">';
 		$errorOutput .= '<button type="button" class="close mt-10" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';

		$errorOutput  .= '<ul>';

		foreach ($errors as $key => $value) {
			$errorOutput .= '<li>'.$value.'</li>';
		}

		$errorOutput .= '</ul>';
		$errorOutput .= '</div>';

		echo $errorOutput;
		die();
	}

	$name = $_POST['name'];
        // $phone = $_POST['phone'];
        $subject = $_POST['subject'];
        // $city = $_POST['city'];
	$email = $_POST['email'];
	$message = $_POST['message'];
	$from = $email;
	$to = 'zebakhtiyar786@gmail.com';  // please change this email id
	$subject = 'Contact Form : Advanced Industrial Service ';

	$body = "From: $name\n Subject: $subject\n E-Mail: $email\n Message:\n $message";

	$headers = "From: ".$from;

	//send the email
	$result = '';
	if (mail ($to, $subject, $body, $headers)) {
		$result .= '<div class="alert alert-success alert-dismissible" role="alert">';
 		$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
		$result .= 'Thank You! One of our business representatives will soon speak to you.';
		$result .= '</div>';

		echo $result;
		die();
	}

	$result = '';
	$result .= '<div class="alert alert-danger alert-dismissible" role="alert">';
	$result .= '<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>';
	$result .= 'Something bad happend during sending this message. Please try again later';
	$result .= '</div>';

	echo $result;
    
?> 
