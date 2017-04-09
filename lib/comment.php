<?php

class Comment {
  public $cid; /* Unique identifier */
  public $author; /* Creator of comment */
  public $ip; /* IP address of author */
  public $timestamp; /* Time of creation */
  public $comment; /* Text */
  public $ingredient; /* Ingredient comment belongs to */

public function __construct($id, $ip, $t, $c, $a, $ing) {
    $this->cid = $id;
    $this->author = $a;
    $this->ip = $ip;
    $this->timestamp = $t;
    $this->comment = $c;
    $this->ingredient = $ing;
  }
}
function makeNewComment($id, $ip, $t, $c, $a, $ing) {
	return new Comment ($id, $ip, $t, $c, $a, $ing);
}
function getCommentFromRow($row){
	$com = makeNewComment($row['cid'], $row['ip'], $row['timestamp'], $row['comment'],
    $row['author'], $row['ingredient']);
	return $com;
}

?>
