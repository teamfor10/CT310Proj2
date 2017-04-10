<?php
require_once ("user.php");
require_once ("comment.php");
require_once ("ingredient.php");
require_once ("cart.php");

class Database extends PDO {
    public function __construct() {
            parent::__construct ( "sqlite:" . __DIR__ . "/../ify.db" );
    }
    function loadUsers(){
            $sql = "SELECT * FROM users";
            $result = $this->query ( $sql );
            $users = array ();
            foreach ( $result as $row ) {
                    $users [] = getUserFromRow ( $row );
            }
            return $users;
    }
    function updatePassword($u, $h){
            $sql = "UPDATE users SET hash = ?
                                            WHERE username = ?";
            $stm = $this->prepare( $sql );
            return $stm->execute(array($h, $u));
    }
    function loadComments(){
            $sql = "SELECT * FROM comments";
            $result = $this->query ( $sql );
            $coms = array ();
            foreach ( $result as $row ) {
                    $coms [] = getCommentFromRow ( $row );
            }
            return $coms;
    }
    function loadIngredients($coms){
            $sql = "SELECT * FROM ingredients";
            $result = $this->query ( $sql );
            $ings = array ();
            foreach ( $result as $row ) {
                    $ings [] = getIngredientsFromRow ( $row, $coms );
            }
            return $ings;
    }
    function addIngredient($ing, $pic, $cost){
            $sql = "INSERT INTO ingredients(name, file_name, price) VALUES (?, ?, ?)";
            $stm = $this->prepare($sql);
            return $stm->execute(array($ing, $pic, $cost));
    }

    function addComment($ip, $c, $a, $ing){
    $time = date("H:i m/d/Y", time());
    $sql = "INSERT INTO comments (ip,timestamp,comment,author,ingredient) VALUES (?,?,?,?,?)";
            $stm = $this -> prepare($sql);
            return $stm->execute(array(NULL, $time, $c, $a, $ing));
    }

    function upload($name, $image, $price, $description, $link){
            $this->addIngredient($name, $image, $price);
            $sql1 = "INSERT INTO comments (ip,timestamp,comment,author,ingredient) VALUES (NULL, NULL, $description, NULL, $name)";
            $sql2 = "INSERT INTO comments (ip,timestamp,comment,author,ingredient) VALUES (NULL, NULL, $link, NULL, $name)";

            $this -> exec($sql1);
            $this -> exec($sql2);
    }

    function addCart($user, $ing){
            $sql = "INSERT INTO shopping_cart VALUES (?, ?)";
            $stm = $this->prepare($sql);
            return $stm->execute(array($user, $ing));
    }
    function removeFromCart($user, $ing){
            $sql = "DELETE FROM shopping_cart WHERE user = ? AND ingredient = ?";
            $stm = $this->prepare($sql);
            return $stm->execute(array($user, $ing));
    }
    function emptyCart($user){
            $sql = "DELETE FROM shopping_cart WHERE user = ?";
            $stm = $this->prepare($sql);
            return $stm->execute(array($user));
    }
    function loadCart($ings){
        $sql = "SELECT * FROM shopping_cart";
        $result = $this->query ( $sql );
        $cart = array ();
        foreach ( $result as $row ) {
            $price = priceByName($ings, $row['ingredient']);
            $cart [] = getCartFromRow ( $row, $price );
        }
        return $cart;
    }
    function deleteComment(){}
    function editComment(){}
}
function setupDB() {
	try {
		$dbh = new Database();
		return $dbh;
	} catch ( PDOException $e ) {
		return FALSE;
	}
}
?>
