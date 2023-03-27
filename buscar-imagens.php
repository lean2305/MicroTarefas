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

if (isset($_GET['user'])) {
    // Buscar o nome do utilizador a partir do parâmetro GET
    $usuario = $_GET['user'];

    // Selecionar a imagem do usuário
    $result = mysqli_query($conn, "SELECT * from arquivo where utilizador = '$usuario'");

    // Exibir a imagem do usuário
    if ($row = mysqli_fetch_assoc($result)) {
        echo "<img class='message-pp' src='./foto/" . $row['nome'] . "' alt=''>";
    }
} else {
    // Se o parâmetro GET 'user' não estiver definido, buscar a imagem do usuário logado
    $logado = $_SESSION['user'];
    $result = mysqli_query($conn, "SELECT * from arquivo where utilizador = '$logado'");

    // Exibir a imagem do usuário logado
    if ($row = mysqli_fetch_assoc($result)) {
        echo "<img class='message-pp' src='./foto/" . $row['nome'] . "' alt=''>";
    }
    }


?>
