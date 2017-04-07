<?php

require_once "assets/passwordLib.php";

class User {
	public $user_name = 'johndoe'; /* User's login name */
	public $hash = ''; /* Hash of password */
	public $email = ''; /* User's email */
}
function makeNewUser($u, $h, $e) {
	$u = new User ();
	$u->user_name = $u;
	$u->hash = $h;
	$u->email = $e;
	return $u;
}
function setupDefaultUsers() {
	// $users = array ();
	// $i = 0;
	// $users [$i ++] = makeNewUser ( 'astaven', '$2a$10$xLNb4kaqLUxrncEnkor6buctTjNk8xjyU8M6sK/7alZtZLKmBL2ni', 'asa.staven@gmail.com' );
	// $users [$i ++] = makeNewUser ( 'ct310', '$2a$10$l6vaA7Bkh866mDsM4Dt15ehp207cf.t64ucU7j0C0VJovRd99xVOi', 'nspatil@colostate.com' );
	// writeUsers ( $users );
	$line1 = 'user_name,hash,email' . "\n";
	$line2 = 'astaven,$2a$10$xLNb4kaqLUxrncEnkor6buctTjNk8xjyU8M6sK/7alZtZLKmBL2ni,asa.staven@gmail.com'. "\n";
	$line3 = 'ct310,$2a$10$l6vaA7Bkh866mDsM4Dt15ehp207cf.t64ucU7j0C0VJovRd99xVOi,nspatil@colostate.com'. "\n";
	file_put_contents('users.csv', $line1);
	file_put_contents('users.csv', $line2, FILE_APPEND);
	file_put_contents('users.csv', $line3, FILE_APPEND);
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
    $res = '';
    foreach ( $users as $u ) {
        if ($u->user_name == $user_name) {
            $res = $u->hash;
        }
    }
    return $res;
}
function emailByName($users, $user_name) {
    $res = '';
    foreach ( $users as $u ) {
        if ($u->user_name == $user_name) {
            $res = $u->email;
        }
    }
    return $res;
}
function setPassword($users, $user_name, $h) {
    foreach ( $users as $u ) {
        if ($u->user_name == $user_name) {
            $u->hash = $h;
        }
    }
}
function printU($users) {
    foreach ( $users as $u ) {
        echo "<p>$u->user_name, $u->hash, $u->email</p><br />";
    }
}
?>
