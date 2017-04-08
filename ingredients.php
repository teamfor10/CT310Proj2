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
  <?php
    foreach($coms as $c){
      echo "<p>cid: $c->cid, author: $c->author, ip: $c->ip, time: $c->timestamp,
       comment: $c->comment, ing: $c->ingredient</p><br />";
    }
    echo "<br />";
    foreach($ings as $i){
      echo "<p>name: $i->name, file: $i->file_name, price: $i->price, com: $i->comments</p><br />";
    }
  ?>
</div>

<?php include 'inc/footer.php'; ?>