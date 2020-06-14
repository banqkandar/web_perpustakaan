<?php

$host="localhost";
$user="root";
$pass="";
$db="perpus";

$koneksi = new mysqli($host, $user, $pass, $db);
if ($koneksi->connect_error){
	die('Error : ('.$$koneksi->connect_errno.')'.$$koneksi->connect_error);
}

?>