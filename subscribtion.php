<?php
  if(isset($_POST['email'])) {
    $error_message = "";
    $email_exp = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';

    $user_email = $_POST['email'];
    $email_subject = "User subscribtion";
    $to = "<yurets.ua@gmail.com>";
    $from = "no-reply@site.com";
    $headers = "From: <$user_email>" . "\r\n" .
    "Reply-To: <$user_email>";

    if(!preg_match($email_exp, $user_email)) {
      $error_message = 'The Email Address you entered does not appear to be valid.<br />';
    }
    $mail = mail($to, $email_subject, $headers, "-f " . $from);
    echo $mail;
    if ($mail) {
      echo "Thank you for using our mail form";
    } else {
      echo "Mail sending failed.";
    }
  }
?>
