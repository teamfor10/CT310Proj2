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
    <?php if(isset($_POST['addTo'])):
        $dbh->addCart($_POST['userIng'], $_POST['ingName']);
        header ( "Location: https://$host$uri/index.php" );
        exit();
    ?>
    <?php elseif(isset($_GET['ingred'])):
        $choice = $_GET['ingList'];        
        $pic = picByName($ings, $choice);
        $price = priceByName($ings, $choice);
        
        echo "<style>body {text-align: center;}</style>
        <body>
          <h1>$choice</h1>
          <img  src='./uploads/$pic' alt='igdt 2' width='250' height='auto'>";
          if(isset($_POST['usercomment'])){
            // Sanitize comments
            $_POST['comments'] = filter_var($_POST['comments'], FILTER_SANITIZE_STRING);
            $dbh->addComment('', $_POST['comments'], $_SESSION['userName'], $choice);
            $coms = $dbh->loadComments();
            $ings = $dbh->loadIngredients($coms);
          }
          comment();
          //if($_SESSION['userType'] == 'admin'){ comment();}
          $text = textByName($ings, $choice);
          $size = count($text);
          for($num = 0; $num < $size; $num++){
                $c = $text[$num];
                if (strpos($c, 'www') !== false || strpos($c, 'http') !== false) {
                  echo "<p style='font-size: 10px;'>content and image comes from <a href='$c'>$c</a></p>";
                }else{ echo "<p>$c</p></br>";}
          }
        
          if($_SESSION['userType'] == 'customer'){ 
          $var = $_SESSION['userName'];
          echo "<div class='addCart'>
                <form method='POST' action='#'>
                    <input type='hidden' name='userIng' value='$var'>
                    <input type='hidden' name='ingName' value='$choice'>
                    <input type='submit' name='addTo'value='Add To Cart'>
                </form>
                </div>";
          }
          echo "</body>";
    ?>
    
    <?php else: displayIngredientList($ings) ?>
    <?php endif; ?>
</div>



<?php include 'inc/footer.php'; ?>
