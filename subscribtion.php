// todo: add sanitizing
<?php
  $error_message = "";
  $email_exp = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
  
  $user_email = $_POST['email'];
  $email_subject = "User subscribtion";
  $to = "hello@monup.co";
  $headers = "Reply-To: $user_email \r\n";
  echo $user_email;
  mail($to, $email_subject, $headers);
?>