<?php 
//error_reporting(0);
session_start();

define('PATH', 'http://localhost/ta/digilib');
define('HOST', 'localhost');
define('USER', 'root');
define('PASS', '');
define('DBNAME', 'digilib');

$con = mysqli_connect( HOST, USER, PASS, DBNAME ) or die('Gagal Memuat Database : '.mysqli_connect_error());

?>