// todo: add sanitizing
<?php
  if(isset($_POST['email'])) {
    $error_message = "";
    $email_exp = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
    
    $user_email = $_POST['email'];
    $email_subject = "User subscribtion";
    $to = "hello@monup.co";
    $headers = "Reply-To: $user_email \r\n";
    
    if(!preg_match($email_exp, $user_email)) {
      $error_message = 'The Email Address you entered does not appear to be valid.<br />';
    }
    mail($to, $email_subject, $headers);
    echo "should be sent";
  }
?>