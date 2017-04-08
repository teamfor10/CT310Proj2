<?php
  $loginPage = FALSE;
  $helpPage = TRUE;
  require_once "inc/page_setup.php";
  $users = readUsers();
  include './inc/header.php';
?>
<div id="login">
  <?php if(isset($_POST['forgot'])):
    $choice = $_POST['userList'];
    $sendmail = emailByName($users, $choice);
    echo "<p>An email will be sent to $sendmail</p><br />";
    $subject = "CT310 HW6 Forgotten Password";
    $content = "https://$host$uri/passwordreset.php?key=";
    $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $urlKey = str_shuffle($str);
    $_SESSION['urlKey'] = $urlKey;
    $_SESSION['resetName'] = $choice;
    $content = $content.$urlKey;
    error_reporting(0);
    if(mail($sendmail, $subject, $content)){
            echo "<p>Your message has been sent successfully</p><br />";
    } else{
            echo "<p>Something went wrong in sending your message</p><br />";
    }
  ?>
  <?php else: displayEmailList($users) ?>
  <?php endif; ?>
</div>

<?php include './inc/footer.php'; ?>
