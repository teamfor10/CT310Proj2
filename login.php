<?php
  include 'control.php';
  include 'header.php';

  $logins = array("ct310" => "3aaec86181ee6974b99d893b4c1eb5b5",
  "astaven" => "d24774b6154a7fd12fa4965eb7381088",
  "cokin" => "9e10098c382708a8f24c4219058565fc");
?>

<!--can we get the log in to just display automatically when opening the page?-->

<div id="login">
  <?php if(isset($_POST['login'])):
    $time = date("H:i m/d/Y", time());
    $user = trim($_POST['username']);
    $user = filter_var($user, FILTER_SANITIZE_STRING); //Sanitize username
    $user = strtolower($user);
    $pass = trim($_POST['password']);
    $pass = filter_var($pass, FILTER_SANITIZE_STRING); //sanitize password
  ?>
    <?php if(array_key_exists($user, $logins) && $logins[$user] == md5($pass)):
      echo "<p>Login was successful - $time</p>";
      $_SESSION['username'] = $user;
      $_SESSION['startTime'] = $time;
    ?>
    <?php else:
      displayLogin();
      echo "<p>Login failed - $time</p><br /><br/>";
    ?>
    <?php endif; ?>
  <?php else: displayLogin()?>
  <?php endif; ?>
</div>

<?php include 'footer.php'; ?>
