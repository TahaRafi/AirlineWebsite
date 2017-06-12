<?php
include('db_connect.php');
use Twilio\Rest\Client;
$first_name=['firstname'];
$last_name=['lastname'];
$username=$_POST['name'];
$email=$_POST['email'];
$number=$_POST['number'];
$password=$_POST['password'];


$result = "INSERT INTO register(first_name,last_name,username,password,phone,email) VALUES ('$first_name','$last_name','$username','$password','$number','$email')";




mysqli_query($connection,$result);
 if( $result )
 {
	 echo "successfull";
	 ///////////////////////////////////////////////////////////mail service////////////////////////////////
	 require 'PHPMailer-master/PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'app.smtp2go.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = '';                 // SMTP username
$mail->Password = '';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 2525;                                    // TCP port to connect to

$mail->setFrom('', 'Mailer');
$mail->addAddress('', 'Joe User');     // Add a recipient
$mail->addAddress('');               // Name is optional
$mail->addReplyTo('', 'Information');
$mail->addCC('cc@example.com');
$mail->addBCC('bcc@example.com');

$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = 'Affan Airline';
$mail->Body    = 'Conguration sir you are successfully registered to our website and sms also send to your number!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}

 ///////////////////////////////////////////////////////php mailer
 
 ///////////////////////////////////////////////////////////////////////////////////////
 
 /////////////////////////////sms service////////////////////////////////////////////////
 // Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require 'twilio-php-master/Twilio/autoload.php';

// Use the REST API Client to make requests to the Twilio REST API


// Your Account SID and Auth Token from twilio.com/console
$sid = '';
$token = '';
$client = new Client($sid, $token);

// Use the client to do fun stuff like send text messages!
$client->messages->create(
    // the number you'd like to send the message to
    '+15015032704',
    array(
        // A Twilio phone number you purchased at twilio.com/console
        'from' => '+15015032704',
        // the body of the text message you'd like to send
        'body' => "Hey Jenny! Good luck on the bar exam!"
    )
);

echo "Message send";
 
 ////////////////////////////
 header( 'Location: http://localhost/airlines/login1/index1.html' );
 
 }//if
        
      else
	  {
		  echo "no"; 
		  
	  }
       
	
	
   
//echo '<script type="text/javascript">
  //      window.location = "http://localhost/usmanAirline/contact.php"
    //  </script>';
	  
	 

?>