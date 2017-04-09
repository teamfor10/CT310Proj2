<!-- Includes -->
<?php
$loginPage = FALSE;
$helpPage = FALSE;
require_once "inc/page_setup.php";
if (!$dbh = setupDB()) {die;}
include 'inc/header.php';
?>

<!-- create three coulumn with lg and md size  -->
<div class="container-fluid" id="content">
  <div id="home-message">
    <h2>Welcoming To Ingredients For You!</h2>
    <p>This is your first stop to a more beautiful dinner table!<br />
      We have the freshest ingredients in stock and we gain more <br />
      all of the time. Explore our wares and get a sense of that new<br />
      ingredient you need to put some excitement in the kitchen!<br />
      <strong>More Inventory coming soon!</strong></p>
      <br />
  </div>

<!-- Add Main Content here -->


</div>
<?php include 'inc/footer.php'; ?>
