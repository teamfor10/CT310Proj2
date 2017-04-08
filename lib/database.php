<?php
require_once ("support.php");
class Database extends PDO {
	public function __construct() {
		parent::__construct ( "sqlite:" . __DIR__ . "/../ify.db" );
	}

	function printUsers(){
		$sql = "SELECT * FROM users";
		$result = $this->query ( $sql );
		$users = array ();
		foreach ( $result as $row ) {
			$users [] = getUserFromRow ( $row );
			$a = $row['username'];
			$b = $row['hash'];
			$c = $row['email'];
			$d = $row['role'];
			echo "<p>$a, $b, $c, $d</p><br />";
			$user = makeNewUser($row['username'], $row['hash'], $row['email'], $row['role']);
		}
	}

	function addIngredient($ing, $pic, $cost){

	}
	function addComment($author, $ip, $time, $text, $ing){

	}
	function deleteComment(){
		// Anyone see this issues with the way I am deleting?
	// 	$sql = "DELETE FROM album WHERE album_id = $album";
	// 	if ($this->exec ( $sql ) === FALSE) {
	// 		echo '<pre class="bg-danger">';
	// 		print_r ( $this->errorInfo () );
	// 		echo '</pre>';
	// 		return FALSE;
	// 	}
	// 	return TRUE;
	}
	function editComment(){
		// $sql = "UPDATE album SET title = :title, rank = :rank, year = :year,
		// 		artist_id = :artist_id WHERE album_id = :id";
		// $stm = $this->prepare ( $sql );
		// return $stm->execute ( array (
		// 		":title" => $album->title,
		// 		":rank" => $album->rank,
		// 		":year" => $album->year,
		// 		":artist_id" => $album->artist->id,
		// 		":id" => $album->id
		// ) );
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