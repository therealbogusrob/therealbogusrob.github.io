<?php 
  $errors = array();
  $name = "";
  $email = "";
  $phone = "";
  $comment = "";
  $from = "";
  $email_content = "";
  
  if (!empty($_REQUEST['name'])) 
  {
    $name = substr($_REQUEST['name'], 0, 255);
  } 
  
  if (!empty($_REQUEST['email'])) {
    $email = substr($_REQUEST['email'], 0, 255);
  }
  
  if (!empty($_REQUEST['phone'])) {
    $phone = substr($_REQUEST['phone'], 0, 100);
  } 

  if (!empty($_REQUEST['comment'])) {
    $comment = substr($_REQUEST['comment'], 0, 65535);
  }

  echo $_SERVER['REQUEST_METHOD'];
  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    //echo "Sending email";
    $from_header = "From: countrysideinn.ca - info request from " . $name;
    $to = "info@countrysideinn.ca"; 
    //$to = "robbie9@gmail.com";
    $subject = "countrysideinn.ca - Contact Us Form Submission";
    
    $email_content = "Message from " . $name . "\r\n" . 
    "Email: " . $email . "\r\n" .
    "Phone: " . $phone . "\r\n" . 
    "Message: " . $comment;
    if (mail($to, $subject, $email_content, $from_header)) {
    //   echo "Mail sent";
    // } else {
    //   echo "Mail error";
    }
  }

  // Print any error messages. 
  echo '<hr /><h3 align="center">Your mail was sent. Thank you!</h3><hr /><p>Below is the message that you sent.</p>'; 
  echo "Message: " . $name . "\r\n" .
       "Phone: " . $phone . "\r\n" . 
       "Email: " . $email . "\r\n" .
       "Comment: " . $comment . "\r\n";
  echo "From: " . $from_header;

?>