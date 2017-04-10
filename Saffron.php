<?php
  include 'lib/control.php';
  include 'inc/header.php';
  if (!$dbh = setupDB()) {die;}

//   if(isset($_POST['submit'])){
//    $dbh -> addCart();
//   // needs a name and user who submitted the order
//   }

?>

<style>
body {text-align: center;}
</style>

<body>
<h1>Saffron</h1>
<img  src="./images/saffron.jpg" alt="igdt 2" width="250" height="auto">
<p>
Saffron (pronounced /ˈsæfrən/ or /ˈsæfrɒn/) is a spice derived from the flower of Crocus sativus, commonly known as the "saffron crocus". Saffron crocus grows to 20–30 cm (8–12 in) and bears up to four flowers, each with three vivid crimson stigmas, which are the distal end of a carpel. The styles and stigmas, called threads, are collected and dried to be used mainly as a seasoning and colouring agent in food. Saffron, long among the world's most costly spices by weight, is native to Southwest Asia and was probably first cultivated in or near Greece. As a genetically monomorphic clone, it was slowly propagated throughout much of Eurasia and was later brought to parts of North Africa, North America, and Oceania.
</p>

<p style="font-size: 10px;">content and image comes from <a href="https://en.wikipedia.org/wiki/Saffron">Wikipedia</a></p>

<div class="addCart">
  <form>
    <input id="addTo" type="submit" value="Submit">
  </form>
</div>
<?php comment() ?>
</body>
<?php include 'inc/footer.php'; ?>