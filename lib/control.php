<?php
  session_name('IFY_02');
  session_start();
  $host = $_SERVER['HTTP_HOST'];
  $uri = rtrim(dirname($_SERVER['PHP_SELF']), '/\\');
  if(!isset($_SESSION['startTime'])){
    $_SESSION['startTime'] = date("H:i m/d/Y", time());
  }
  if(!isset($_SESSION['userName'])){
    $_SESSION['userName'] = "Guest";
  }
  if(!isset($_SESSION['urlKey'])){
    $_SESSION['urlKey'] = "";
    $_SESSION['resetName'] = "";
  }
  if (!$loginPage && !$helpPage && ($_SESSION ['userName'] == "Guest")) {
    header ( "Location: https://$host$uri/login.php" );
    exit ();
  }


  function comment(){
    if($_SESSION['userType'] == 'admin'){
      echo "<div id='comment'>";
      if(isset($_POST['usercomment'])){
        // Sanitize comments
        $_POST['comments'] = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);
        echo "<p>" . $_POST['comments'] . "</p>";
      }
      else{
        echo "<form method='POST' action='#'>
          <textarea name='comments'></textarea><br />
          <input type='submit' name='usercomment' value='Submit'>
        </form>";
      }
      echo "</div>";
    }
  }

  // Login menu functionality from http://bootsnipp.com/snippets/featured/clean-modal-login-form
  function displayLogin() {
    echo "<a href='#' data-toggle='modal' data-target='#login-modal'>Login</a>
    <div class='modal fade' id='login-modal' tabindex='-1' role='dialog'
      aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
      <div class='modal-dialog'>
        <div class='loginmodal-container'>
            <h1>Login Here</h1><br>
          <form method='POST' action='#'>
            <input type='text' name='username' placeholder='Username'>
            <input type='password' name='password' placeholder='Password'>
            <input type='submit' name='login' class='login loginmodal-submit' value='Login'>
          </form>
          <!--<p><a href='signup.php'>Do Not Have Credentials?</a></p>-->
          <p><a href='./fmp.php'>Forgot Your Password?</a></p>
        </div>
      </div>
    </div>";
  }

function displaySignUp(){
  echo "<div class='modal-dialog'>
    <div class='loginmodal-container'>
      <h1>Enter Credentials</h1><br>
      <form method='POST' action='#'>
        <input type='text' name='newUserName' placeholder='Username'>
        <input type='email' name='newEmail' placeholder='Email'>
        <input type='password' name='newPassword' placeholder='Password'>
        <input type='password' name='newPassword2' placeholder='Confirm Password'>
        <input type='submit' name='newUser' class='login loginmodal-submit' value='Submit'>
      </form>
    </div>
  </div>";
}

function displayEmailList($users){
  echo "<div class='modal-dialog'>
    <div class='loginmodal-container'>
      <h1>Select Username</h1><br>
        <form method='POST' action='#'>
          <select name='userList'>";
            foreach ($users as $u) {
              $flag = ($u->user_name == $_SESSION['userName']) ? 'selected' : '';
              echo "\t\t\t\t<option value='$u->user_name' $flag > $u->user_name </option>\n";
            }
          echo "</select>
          <input type='submit' name='forgot' class='login loginmodal-submit' value='Send Email'>
        </form>
      </div>
    </div>";
}

function displayReset(){
  echo "<div class='modal-dialog'>
    <div class='loginmodal-container'>
    <h1>Enter New Password</h1><br>
      <form method='POST' action='#'>
        <input type='password' name='passReset' placeholder='Password'>
        <input type='password' name='passReset2' placeholder='Confirm Password'>
        <input type='submit' name='newPass' class='login loginmodal-submit' value='Submit'>
      </form>
    </div>
  </div>";
}

function displayIngredientList($ings){
  echo "<div class='modal-dialog'>
    <div class='loginmodal-container'>
      <h1>Select Ingredient</h1><br>
        <form method='GET' action='#'>
          <select name='ingList'>";
            foreach ($ings as $i) {
              echo "\t\t\t\t<option value='$i->name' > $i->name </option>\n";
            }
          echo "</select>
          <input type='submit' name='ingred' class='login loginmodal-submit' value='Select'>
        </form>
      </div>
    </div>";
}

?>
