<?php
  $loginPage = FALSE;
  $helpPage = TRUE;
  require_once "inc/page_setup.php";
  $users = readUsers();
  include 'inc/header.php';
?>

<div id="login">
  <?php if(isset($_POST['newUser'])):
    $newUser = trim($_POST['newUserName']);
    $newUser = filter_var($newUser, FILTER_SANITIZE_STRING); //Sanitize username
    $newUser = strtolower($newUser);

    $newPass = trim($_POST['newPassword']);
    $newPass = filter_var($newPass, FILTER_SANITIZE_STRING); //sanitize password
    $newPass2 = trim($_POST['newPassword2']);
    $newPass2 = filter_var($newPass2, FILTER_SANITIZE_STRING); //sanitize password

    $newEmail = trim($_POST['newEmail']);
    $newEmail = filter_var($newEmail, FILTER_SANITIZE_EMAIL); //Sanitize email
    $newEmail = strtolower($newEmail);
  ?>
    <?php if($newPass == $newPass2 && '' == userHashByName($users, $newUser)
      && filter_var($newEmail, FILTER_VALIDATE_EMAIL)):
      $h = password_hash($newPass, PASSWORD_BCRYPT );
      $input = "$newUser,$h,$newEmail\n";
      file_put_contents('users.csv', $input, FILE_APPEND);
      header("Location: https://$host$uri/login.php");
      exit();
    ?>
    <?php else:
      displaySignUp();
      echo "<p>Try Again.</p><br /><br/>";
    ?>
    <?php endif; ?>
  <?php else: displaySignUp()?>
  <?php endif; ?>
</div>

<?php include 'inc/footer.php'; ?>
