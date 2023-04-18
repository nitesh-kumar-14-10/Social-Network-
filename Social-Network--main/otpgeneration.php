<?php

require_once __DIR__ . '/vendor/autoload.php';

use Twilio\Rest\Client;

// Set your account SID and auth token here
$account_sid = 'AC179be38b16643847aa6362ee9f27f0e';
$auth_token = 'a502732c6a544b90855012a9e337f407';

// Set your Twilio phone number here
$twilio_phone_number = '+919341930826';

// Check if phone_no is set in $_POST array
if(isset($_POST['phone_no'])) {

  // Get the user's phone number and generate an OTP
  $phone_no = $_POST['phone_no'];
  $otp = rand(100000, 999999);

  // Send the OTP to the user's phone number via Twilio
  $client = new Client($account_sid, $auth_token);
  $message = $client->messages->create(
      $phone_no,
      array(
          'from' => $twilio_phone_number,
          'body' => 'Your OTP is ' . $otp,
      )
  );

  // Store the OTP in a session variable for later verification
  session_start();
  $_SESSION['otp'] = $otp;

  echo 'OTP sent to ' . $phone_no . ' via SMS';
}
else {
  echo 'Phone number not provided in request';
}
