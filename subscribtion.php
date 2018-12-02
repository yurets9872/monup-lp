<?php
  function IsInjected($str) {
    $injections = array('(\n+)', '(\r+)', '(\t+)', '(%0A+)', '(%0D+)', '(%08+)', '(%09+)');
    $inject = join('|', $injections);
    $inject = "/$inject/i";
    
    if (preg_match($inject,$str)) {
      return true;
    } else {
      return false;
    }
  }
?>

<?php
  if(isset($_POST['email'])) {
    $email_exp = '/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/';
    $user_email = $_POST['email'];
    $subject = "User subscribtion";
    $to = "hello@monup.co";
    $message = 'Let me know when launching';
    $headers = array(
      "From: $user_email",
      "Reply-To: $user_email",
      "X-Mailer: PHP/" . PHP_VERSION
    );
    $headers = implode("\r\n", $headers);
    
    if(IsInjected($user_email)) {
      $response->result = false;
      $response->errorCode = 2;
      echo json_encode($response);
      exit;
    }
    
    if(!preg_match($email_exp, $user_email)) {
      $response->result = false;
      $response->errorCode = 1;
      echo json_encode($response);
    } else {
      $mail = mail($to, $subject, $message, $headers);
      $response->result = $mail;
      $response->errorCode = '';
      echo json_encode($response);
    }
  }
?>
