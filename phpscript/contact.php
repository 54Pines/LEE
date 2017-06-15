<?php
// EDIT A LINE BELOW AS REQUIRED
ob_start();

$email_to = "aaron@54pines.com";

// CUSTOME YOUR EMAIL SUBJECT

$email_subject = "New Prospect Lead From Legallee";

// COMPONENT FUNCTION
/**
 * @param $data
 * @return string
 */
function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}

/**
 * @param $string
 * @return mixed
 */
function clean_string($string) {
	$bad = array("content-type", "bcc:", "to:", "cc:", "href");
	return str_replace($bad, "", $string);
}

// GET DATA FROM AJAX

$contact_name    = test_input($_POST['name']);
$contact_email   = test_input($_POST['email']);
$contact_phone   = test_input($_POST['phone']);
$contact_message = test_input($_POST['message']);

$email_message = "From: ".clean_string($contact_name)."\n";

$email_message .= "Email: ".clean_string($contact_email)."\n";

$email_message .= "Phone: ".clean_string($contact_phone)."\n";

$email_message .= "Message: ".clean_string($contact_message)."\n";

$headers = 'info@54pines.com'."\r\n".

'X-Mailer: PHP/'.phpversion();

if (!empty($contact_name) && !empty($contact_email) && !empty($contact_phone) && !empty($contact_message)) {
	@mail($email_to, $email_subject, $email_message, $headers);
	// header('Location: http://54pines.com/LegalleeRedux/contactsuccess.php');
  echo "success";
}
exit();
