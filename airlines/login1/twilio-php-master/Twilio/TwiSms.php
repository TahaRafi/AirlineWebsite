<?php
// Require the bundled autoload file - the path may need to change
// based on where you downloaded and unzipped the SDK
require 'autoload.php';

// Use the REST API Client to make requests to the Twilio REST API
use Twilio\Rest\Client;

// Your Account SID and Auth Token from twilio.com/console
$sid = 'AC26e377d3155f6146458467fbfb9bd425';
$token = '0031e35795b51840c7d2d0ced3372f94';
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
?>