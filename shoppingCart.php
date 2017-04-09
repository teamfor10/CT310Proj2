<?php
$loginPage = FALSE;
$helpPage = FALSE;
require_once "inc/page_setup.php";
if (!$dbh = setupDB()) {die;}
else{
    $coms = $dbh->loadComments();
    $ings = $dbh->loadIngredients($coms);
    $cart = $dbh->loadCart($ings);
  }
include 'inc/header.php';

$userCart = setCart($cart);
$u = $_SESSION['userName'];

if(isset($_POST['remove'])){
    foreach($userCart as $i){
        $name = str_replace(' ', '_', $i->ingredient);
         if(isset($_POST[$name])){
            $lg = $name;
            $dbh->removeFromCart($_SESSION['userName'], $i->ingredient);
        }
    }
    $coms = $dbh->loadComments();
    $ings = $dbh->loadIngredients($coms);
    $cart = $dbh->loadCart($ings);
    $userCart = setCart($cart);
} elseif(isset($_POST['mail'])){
    $users = $dbh->loadUsers();
    $emails = array();
    foreach($users as $user){
        if($user->user_name == $_SESSION['userName'] || $user->role == 'admin'){
            $emails [] = emailByName($users, $user->user_name);
        }
    }
    $subject = "CT310 IFY Invoice";
    $content = "You have purchased\n";
    foreach($userCart as $c){
        $ing1 = $c->ingredient;
        $price1 = $c->price;
        $content = $content."$ing1\t$price1\n";
    }
    error_reporting(0);
    foreach($emails as $email){
        mail($email, $subject, $content);
    }
    $dbh->emptyCart($_SESSION['userName']);
    header ( "Location: https://$host$uri/showIngredients.php" );
    exit();
}

?>

<div class='modal-dialog'>
    <div class='loginmodal-container'>
    <?php echo "<h1>$u's Shopping Cart</h1><br />"; ?>
      <form method='POST' action='#'>
        <?php
            foreach($userCart as $i){
                $ing = $i->ingredient;
                $price = $i->price;
                echo "<input type='checkbox' name='$ing'>
                <label for='$ing'>$ing   $price</label><br />";
            }
        ?>
       <input type='submit' name='remove' class='login loginmodal-submit' value='Remove'>
       <input type='submit' name='mail' class='login loginmodal-submit' value='Mail'>
      </form>
    </div>
</div>

<?php include 'inc/footer.php'; ?>
<?php
    function setCart($cart){
    $ret = array();
    foreach ($cart as $c){
        if($_SESSION['userName'] == $c->owner){
            $ret[] = $c;
        }
    }
    return $ret;
    }
?>
