<?php
require_once __DIR__ .'/../assets/passwordLib.php';

class User {
	public $user_name; /* User's login name */
	public $hash; /* Hash of password */
	public $email; /* User's email */
	public $role; /* User's role: admin or customer */
}
function makeNewUser($u, $h, $e, $r) {
	$u = new User ();
	$u->user_name = (string)$u;
	$u->hash = (string)$h;
	$u->email = (string)$e;
	$u->role = (string)$r;
	if("astaven" == $u->user_name){
		echo "<p>we have a match<p><br />";
	}
	return $u;
}
function getUserFromRow($row){
	$user = makeNewUser($row['username'], $row['hash'], $row['email'], $row['role']);
	return $user;
}
function setupDefaultUsers() {
	$line1 = 'user_name,hash,email,role' . "\n";
	$line2 = 'astaven,$2a$10$xLNb4kaqLUxrncEnkor6buctTjNk8xjyU8M6sK/7alZtZLKmBL2ni,asa.staven@gmail.com,admin'. "\n";
	$line3 = 'ktmangus,$2a$07$AJNJsAhn0NI4Hq7Lat96kOPDGtLn/hzN5WluBLupges/wr5rlCFxq,ktmangus@rams.colostate.edu,admin'."\n";
	$line4 = 'ct310,$2a$10$l6vaA7Bkh866mDsM4Dt15ehp207cf.t64ucU7j0C0VJovRd99xVOi,nspatil@colostate.com,admin'. "\n";
	file_put_contents('users.csv', $line1);
	file_put_contents('users.csv', $line2, FILE_APPEND);
	file_put_contents('users.csv', $line3, FILE_APPEND);
	file_put_contents('users.csv', $line4, FILE_APPEND);
}
function writeUsers($users) {
    $fh = fopen ( 'users.csv', 'w+' ) or die ( "Can't open file" );
    fputcsv ( $fh, array_keys ( get_object_vars ( $users [0] ) ) );
    for($i = 0; $i < count ( $users ); $i ++) {
        fputcsv ( $fh, get_object_vars ( $users [$i] ) );
    }
    fclose ( $fh );
}
function readUsers() {
    if (! file_exists ( 'users.csv' )) {
        setupDefaultUsers ();
    }
    $users = array ();
    $fh = fopen ( 'users.csv', 'r' ) or die ( "Can't open file" );
    $keys = fgetcsv ( $fh );
    while ( ($vals = fgetcsv ( $fh )) != FALSE ) {
        if (count ( $vals ) > 1) {
            $u = new User ();
            for($k = 0; $k < count ( $vals ); $k ++) {
                $u->$keys [$k] = $vals [$k];
            }
            $users [] = $u;
        }
    }
    fclose ( $fh );
    return $users;
}
function userHashByName($users, $user_name) {
    foreach ( $users as $u ) {
        if ($u->user_name == $user_name) {
            return $u->hash;
        }
    }
    return '';
}
function emailByName($users, $user_name) {
    foreach ( $users as $u ) {
        if ($u->user_name == $user_name) {
            return $u->email;
        }
    }
    return '';
}
function getRole($users, $user_name) {
    foreach ( $users as $u ) {
        if ($u->user_name == $user_name) {
            return $u->role;
        }
    }
    return '';
}
function setPassword($users, $user_name, $h) {
    foreach ( $users as $u ) {
        if ($u->user_name == $user_name) {
            $u->hash = $h;
        }
    }
}
?>
