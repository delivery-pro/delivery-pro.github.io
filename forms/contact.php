<?php
  // https://github.com/ChrishonWyllie/PHP-Email-Form
  $name = $_GET['name'];
  $email = $_GET['email'];
  $message = $_GET['message'];
  // $human = intval($_GET['human']);
  $from = $email; 
  
  // The address that the email will be sent to
  $to = 'deliverypro.cloud@gmail.com'; 
  
  $subject = $_GET['subject'];
  
  $body = "From: $name\n E-Mail: $email\n Message:\n $message";

  // Check if name has been entered
  if (!$_GET['name']) {
    $err = 'Please enter your name!';
  }
  
  // Check if email has been entered and is valid
  if (!$_GET['email'] || !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL)) {
    $err = 'Please enter a valid email address!';
  }
  
  //Check if message has been entered
  if (!$_GET['message']) {
    $err = 'Please enter your message!';
  }
  //Check if simple anti-bot test is correct
  // if ($human !== 5) {
  //   $err = 'Your anti-spam is incorrect';
  // }

  // If there are no errors, send the email
  if (!$err) {
    if (mail ($to, $subject, $body, $from)) {
      echo 'OK';
    } else {
      die("Sorry there was an error sending your message. $err");
    }
  }
?>
