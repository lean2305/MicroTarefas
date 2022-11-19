<?php 

//conexão
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "conect";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);



$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

echo $id;
//fim




?>