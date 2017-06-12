<?php

use Twilio\Rest\Client;
$username=$_POST['name'];
$password=$_POST['password'];

$username=stripcslashes($username);
$password=stripcslashes($password);
$username=mysql_real_escape_string($username);
$password=mysql_real_escape_string($password);

mysql_connect("localhost","root","");
mysql_select_db("affanaireline");

$result=mysql_query("select * from register where username='$username' and password='$password'") or die("Failed to query database ".mysql_error());

$row=mysql_fetch_array($result) ;

if($username!="" && $password!="")
{
	




if($row['username']==$username && $row['password']==$password)
{
echo "login succssful";
//////////////////////////////////////////////////////////////////////////////////////////////////////
////////////////////////////////////////////php mailer///////////////////////////////////////////////
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
$mail->Body    = 'You login AFFAN AIRLINE!</b>';
$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}
//////////////////////////////////////////////////////////////////////////////////////////////////////


//////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////SEND SMS///////////////////////////////////////////////////
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

header( 'Location: http://localhost/airlines/login1/index1.html' );



}
else
header( 'Location: http://localhost/airlines/login1/incorrect.html' );

}
else
	
header( 'Location: http://localhost/airlines/login1/incorrect.html' );
 
 ////////////////////////////
 
 
 //if
   
       
	
////////////////////////////////////////////////////////////////////////////////////////////////////////
?>