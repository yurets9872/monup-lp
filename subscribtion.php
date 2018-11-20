<?php
  $user_email = $_POST['email'];
  $email_subject = "User subscribtion";

  $to = "hello@monup.co";
  $headers = "Reply-To: $user_email \r\n";
  mail($to, $email_subject, $headers);
?>