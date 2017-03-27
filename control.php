<?php
  session_name('IFY_00');
  session_start();
  function comment(){
    if(isset($_SESSION['username'])){
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
          <p>password is case-sensitive</p>
        </div>
      </div>
    </div>";
  }

?>