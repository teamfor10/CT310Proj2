<?php
require_once ("user.php");
require_once ("comment.php");
require_once ("ingredient.php");

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
    function getIngredient($ing){
            $sql1 = "SELECT * FROM ingredients
                                                    WHERE name = $ing";
            $sql2 = "SELECT * FROM comments
                                                    WHERE ingredient = $ing";
            $result1 = $this->query ( $sql1 );
            $result2 = $this->query ( $sql2 );

            $info = array ();
            // foreach ( $result1 as $row ) {
            // 	$albums [] = Album::getAlbumFromRow ( $row );
            // }
            return $info;
    }

    function addIngredient($ing, $pic, $cost){
            $sql = "INSERT INTO ingredients VALUES ($ing, $pic, $cost)";
            $stm = $this -> prepare($sql);
            return $stm->execute(array($user, $ing));
    }

    function addComment($ip, $c, $a, $ing){
    $time = date("H:i m/d/Y", time());
    $sql = "INSERT INTO comments (ip,timestamp,comment,author,ingredient) VALUES (?,?,?,?,?)";
            $stm = $this -> prepare($sql);
            return $stm->execute(array(NULL, $time, $c, $a, $ing));
    }

    function upload($name, $file_name, $price, $description, $link){
            $sql1 = "INSERT INTO comments VALUES (0, NULL, NULL, $description, NULL, $name)";
            $sql2 = "INSERT INTO comments VALUES (0, NULL, NULL, $link, NULL, $name)";
            addIngredient($name, $file_name, $price);
    }

    function addCart($user, $ing){
            $sql = "INSERT INTO shopping_cart VALUES (?, ?)";
            $stm = $this -> prepare($sql);
            return $stm->execute(array($user, $ing));
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
