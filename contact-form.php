<?php

/* Candidate Contact Form */

// Email To 
$email_to = "thiago@maneschy.com";


// Default Subject
$email_subject = 'Contato do site Arthur Bisneto';
	
	
// Success Message
$success_message = "Obrigado pelo contato!";



	
/* Error Handling */

$error = false;
$error_message = '';

	

	
/* Email Field */
if(isset($_POST['email']) && !empty($_POST['email'])){
	
	$email = $_POST['email'];
	
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
	
		$error = true;
		$error_message .= 'Email não válido<br>';
		
	}
	
}else{
	
	$error = true;
	$error_message .= 'Por favor, preencha seu email corretamente.<br>';
	
}




/* First Name */
if(isset($_POST['c_name']) && !empty($_POST['c_name'])){
	
	$first_name = $_POST['c_name'];
	
}else{

	$error = true;
	$error_message .= 'Por favor, preencha seu nome corretamente<br>';
	
}




/* Subject */
if(isset($_POST['c_email']) && !empty($_POST['c_email'])){
	
	$subject = $_POST['c_email'];
	
}



/* Message */
if(isset($_POST['c_message']) && !empty($_POST['c_message'])){
	
	$message = $_POST['c_message'];
	
}




/* Error Handle */
if($error == true){
	
	echo '<p class="error">'.$error_message.'</p>';

}else{
	
	
	/* Prepare Mail */
	
	$headers = 	'From: '. $email . "\r\n" .
				'Reply-To: '. $email . "\r\n" .
				'X-Mailer: PHP/' . phpversion();
	
	
	
	/* Message */
	$email_message = 	"Nome: " . $first_name . "\r\n" .
						"Email: " . $email . "\r\n" ;
						
	
	
		
	if(isset($message))
		$email_message .= "Mensagem ou denúncia: " . $message . "\r\n";
	
	
	/* Send Email */
	mail($email_to, $email_subject, $email_message, $headers);
	
	
	
	/* Success Message */
	echo '<p class="success">'.$success_message.'</p>';


}




?>