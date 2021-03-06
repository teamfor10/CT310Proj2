<?php
  $loginPage = TRUE;
  $helpPage = FALSE;
  require_once "inc/page_setup.php";
  if (!$dbh = setupDB()) {
    $users = readUsers();
  } else{
    $users = $dbh->loadUsers();
  }
  include 'inc/header.php';
?>

<div id="login">
  <?php if(isset($_POST['login'])):
    $time = date("H:i m/d/Y", time());
    $user = trim($_POST['username']);
    $user = filter_var($user, FILTER_SANITIZE_STRING); //Sanitize username
    $user = strtolower($user);
    $pass = trim($_POST['password']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING); //Sanitize password
  ?>
    <?php if(password_verify($pass, userHashByName($users, $user))):
      if($user != $_SESSION['userName']){
        $_SESSION ['startTime'] = $time;
        $_SESSION ['userName'] = $user;
      }
      if(getRole($users, $user) == 'admin'){
          $_SESSION['userType'] = 'admin';
          
      }else{
          $_SESSION['userType'] = 'customer';
      }
      header("Location: https://$host$uri/index.php");
      exit();
    ?>
    <?php else:
      displayLogin();
      echo "<p>Login failed - $time</p><br /><br/>";
    ?>
    <?php endif; ?>
  <?php else: displayLogin()?>
  <?php endif; ?>
</div>

<?php include 'inc/footer.php'; ?>
