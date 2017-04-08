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
<div>
  <?php
  $n = new User("user","hash","email","role");
  $n->user_name = "user";
  $n->hash = "hash";
  $n->email = "email";
  $n->role = "role";
  var_dump($n);
  echo "<br /><p>MY VALUES: $n->user_name, $n->hash, $n->email, $n->role</p>";
  echo "<br / > <br />";
  // print_r($users);
  // echo "<br / > <br />";
  foreach ($users as $u){
			echo var_dump($u);
      echo "<br />";
      echo "<p>MY VALUES: $u->user_name, $u->hash, $u->email, $u->role</p><br /><br />";
	}
  ?>
</div>
<div id="login">
  <?php if(isset($_POST['login'])):
    $time = date("H:i m/d/Y", time());
    $user = trim($_POST['username']);
    $user = filter_var($user, FILTER_SANITIZE_STRING); //Sanitize username
    $user = strtolower($user);
    $pass = trim($_POST['password']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING); //sanitize password
  ?>
    <?php if($user != $_SESSION['userName']):
      if (password_verify($pass, userHashByName($users, $user))) {
        echo "<p>Login was successful - $time</p>";
        $_SESSION ['startTime'] = $time;
        $_SESSION ['userName'] = $user;
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
