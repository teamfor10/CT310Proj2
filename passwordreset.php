<?php
  $loginPage = FALSE;
  $helpPage = TRUE;
  require_once "inc/page_setup.php";
  // $users = readUsers();
  if (!$dbh = setupDB()) {
    die;
    // $users = readUsers();
  }
  include 'inc/header.php';
?>
<div id="login">
  <?php if(isset($_POST['newPass']) ):
    $newPass = trim($_POST['passReset']);
    $newPass = filter_var($newPass, FILTER_SANITIZE_STRING); //sanitize password
    $newPass2 = trim($_POST['passReset2']);
    $newPass2 = filter_var($newPass2, FILTER_SANITIZE_STRING); //sanitize password
  ?>
    <?php if($newPass == $newPass2):
      $h = password_hash($newPass, PASSWORD_BCRYPT);
      $user_name = $_SESSION['resetName'];
      setPassword($users, $user_name, $h);
      writeUsers($users);
      header("Location: https://$host$uri/login.php");
      exit();
    ?>
    <?php else:
      displayReset();
      echo "<p>Try Again.</p><br /><br/>";
    ?>
    <?php endif; ?>
  <?php else:
    $key = '';
    if(isset($_GET['key'])){
      $key = $_GET['key'];
    }
    $cmpKey = $_SESSION['urlKey'];
    if($_SESSION['userName'] != "Guest" || ($key == $cmpKey && $key != '')){
      displayReset();
    } else{ // Keys do not match
      header("Location: https://$host$uri/login.php");
      exit();
    }
  ?>
  <?php endif; ?>
</div>

<?php include 'inc/footer.php'; ?>
