<!-- Includes -->
<?php
$loginPage = FALSE;
$helpPage = FALSE;
require_once "inc/page_setup.php";
if (!$dbh = setupDB()) {die;}
include 'inc/header.php';
?>
<form name='input' action="<?php echo $_SERVER['PHP_SELF']; ?>" method='post'> 

<input type='text' value='' id='increase' name='username' placeholder='Enter Username'/>

</form>

<?php include 'inc/footer.php'; 