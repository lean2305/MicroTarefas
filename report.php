<?php

session_start();


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "conect";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['Senha']) == true)){

    unset($_SESSION['user']);
    unset($_SESSION['Senha']);
    header('Location: login.php');
}



$logado =$_SESSION['user'];

$user = $_SESSION['user'];//vai buscar o nome de usuario da sessao 
//
$id = filter_input(INPUT_POST,'assunto', FILTER_SANITIZE_STRING);
$justificacao = filter_input(INPUT_POST,'w3review', FILTER_SANITIZE_STRING);



$result_usuario="INSERT INTO report (id_historico,justificacao) VALUES('$id','$justificacao')";


$resultado_usuario = mysqli_query($conn, $result_usuario);


if(mysqli_insert_id($conn)){

        
    header("Location: historico.php");

}



?>
