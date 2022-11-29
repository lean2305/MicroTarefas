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



$assunto = filter_input(INPUT_POST,'assunto', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST,'w3review', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST,'valor', FILTER_SANITIZE_STRING);
$categoria = filter_input(INPUT_POST,'inserir', FILTER_SANITIZE_STRING);





$result_usuario="INSERT INTO trabalho (assunto, descricao,valor,usuario,categoria) VALUES('$assunto','$descricao','$valor','$user','$categoria')";


$resultado_usuario = mysqli_query($conn, $result_usuario);


if(mysqli_insert_id($conn)){

        
    header("Location: principal.php");

}

else{
    header("Location: principal.php");
    //else menssagem de erro caso tenha algum erro como por exemplo
    //não pode ter 2 trabalhos ativos ão mesmo tempo


}



?>
