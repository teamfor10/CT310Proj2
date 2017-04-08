<?php
  $loginPage = FALSE;
  $helpPage = TRUE;
  require_once "inc/page_setup.php";
  if (!$dbh = setupDB()) {
    $users = readUsers();
  } else{
    $users = $dbh->loadUsers();
  }
  include 'inc/header.php';
?>
<div id="login">
  <?php if(isset($_POST['forgot'])):
    $choice = $_POST['userList'];
    $sendmail = emailByName($users, $choice);
    $subject = "CT310 HW6 Forgotten Password";
    $content = "https://$host$uri/passwordreset.php?key=";
    $str = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $urlKey = str_shuffle($str);
    $_SESSION['urlKey'] = $urlKey;
    $_SESSION['resetName'] = $choice;
    $content = $content.$urlKey;
    error_reporting(0);
    if(mail($sendmail, $subject, $content)){
      echo "<p>An email has been sent.</p><br />";
    } else{
      echo "<p>Something went wrong in sending your email.</p><br />";
    }
  ?>
  <?php else: displayEmailList($users) ?>
  <?php endif; ?>
</div>

<?php include 'inc/footer.php'; ?>
