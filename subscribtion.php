<?php
  if(isset($_POST['email'])) {
    $error_message = "";
    $email_exp = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';

    $user_email = $_POST['email'];
    $subject = "User subscribtion";
    $to = "hello@monup.co";
    $message = 'hello';
    $headers = array(
      "From: $user_email",
      "Reply-To: $user_email",
      "X-Mailer: PHP/" . PHP_VERSION
    );

    if(!preg_match($email_exp, $user_email)) {
      $error_message = 'The Email Address you entered does not appear to be valid.<br />';
    }
    $mail = mail($to, $subject, $message, $headers);
    if ($mail) {
      echo "Thank you for using our mail form";
    } else {
      echo $headers;
    }
  }
?>
