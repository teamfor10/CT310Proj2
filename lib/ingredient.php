<?php
require_once ("comment.php");

class Ingredient {
    public $name; /* Ingredient name */
    public $file_name; /* File name of ingredient pic */
    public $price; /* Cost of ingredient */
    public $comments; /* Comments on ingredient page */
    public function __construct($n, $f, $p, $c) {
    $this->name = $n;
    $this->file_name = $f;
    $this->price = $p;
    $this->comments = $c;
    }
        
}
function makeNewIngredient($n, $f, $p, $c) {
	return new Ingredient ($n, $f, $p, $c);
}
function getIngredientsFromRow($row, $coms){
  $comment = array();
  foreach($coms as $c){
    if($c->ingredient == $row['name']){
      $comment [] = $c->comment;
    }
  }
   $user = makeNewIngredient($row['name'], $row['file_name'], $row['price'], $comment);
   return $user;
}
function picByName($ings, $name) {
    foreach ( $ings as $i ) {
        if ($i->name == $name) {
            return $i->file_name;
        }
    }
    return '';
}
function priceByName($ings, $name) {
    foreach ( $ings as $i ) {
        if ($i->name == $name) {
            return $i->price;
        }
    }
    return '';
}
function textByName($ings, $name) {
    foreach ( $ings as $i ) {
        if ($i->name == $name) {
            return $i->comments;
        }
    }
    return '';
}
?>
