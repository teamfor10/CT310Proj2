<?php
  include 'lib/control.php';
  include 'inc/header.php';
  if (!$dbh = setupDB()) {die;}

  if(isset($_POST['submit'])){
   $dbh -> addCart();
  // needs a name and user who submitted the order
  }

?>
<style>
body {text-align: center;}
</style>
<body>
<h1>Maple Sugar</h1>
<img  src="./images/maplesugar.jpg" alt="igdt 2" width="250" height="auto">
<p>Maple sugar is harvested from the sugar maple tree.<br>
Maple sugar is a type of sweetener most commonly used in Canada and the United States.<br>
The sugar is what is left over after the sap of the sugar maple is boiled<br>
Maple sugar was first used by native americans because it was easy to transport and lasted a long time.</p>

<p style="font-size: 10px;">content and image comes from <a href="https://en.wikipedia.org/wiki/Maple_sugar">Wikipedia</a></p>

<div class="addCart">
  <from>
    <input id="addTo" type="submit" value="Submit">
  </form>
</div>
<?php comment() ?>
</body>
<?php include 'inc/footer.php'; ?>