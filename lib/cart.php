<?php

class Cart {
  public $owner; /* User */
  public $ingredient; /* Ingredient name */
  public $price; /* Ingredient price */

public function __construct($o, $i, $p) {
    $this->owner = $o;
    $this->ingredient = $i;
    $this->price = $p;
  }
}
function makeNewCart($o, $i, $p) {
	return new Cart ($o, $i, $p);
}
function getCartFromRow($row, $price){
	$cart = makeNewCart($row['user'], $row['ingredient'], $price);
	return $cart;
}

?>
