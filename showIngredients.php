<?php
  $loginPage = FALSE;
  $helpPage = FALSE;
  require_once "inc/page_setup.php";
  if (!$dbh = setupDB()) {die;}
  else{
    $coms = $dbh->loadComments();
    $ings = $dbh->loadIngredients($coms);
  }
  include 'inc/header.php';
?>

<div>
    <?php if(isset($_GET['ingred'])):
        $choice = $_GET['ingList'];        
        $pic = picByName($ings, $choice);
        $price = priceByName($ings, $choice);
        $text = textByName($ings, $choice);
        
        echo "<style>body {text-align: center;}</style>
        <body>
          <h1>$choice</h1>
          <img  src='./uploads/$pic' alt='igdt 2' width='250' height='auto'>
          <p>$text[0]</p>
          <p style='font-size: 10px;'>content and image comes from <a href='$text[1]'>$text[1]</a></p>";
          comment();
          echo "</body>
            <div class='addCart'>
                <form>
                    <input id='addTo' type='submit' value='Add To Cart'>
                </form>
            </div>";
            if(isset($_POST['submit'])){
                $dbh -> addCart();
            // needs a name and user who submitted the order
            }
    ?>
    
    <?php else: displayIngredientList($ings) ?>
    <?php endif; ?>
</div>



<?php include 'inc/footer.php'; ?>
