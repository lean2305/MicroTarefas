<?php 

session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "conect";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$nome =  addslashes(filter_input(INPUT_POST,'user', FILTER_SANITIZE_STRING));
$senha = addslashes(filter_input(INPUT_POST,'Senha', FILTER_SANITIZE_STRING));
$pnome = addslashes(filter_input(INPUT_POST,'pnome', FILTER_SANITIZE_STRING));
$snome = addslashes(filter_input(INPUT_POST,'snome', FILTER_SANITIZE_STRING));

// Consulta SQL para verificar se o utilizador já existe
$query_verificar = "SELECT * FROM utilizador WHERE utilizador='$nome'";
$resultado_verificar = mysqli_query($conn, $query_verificar);

// Verifica se a consulta retornou algum resultado
if(mysqli_num_rows($resultado_verificar) > 0) {
    // O utilizador já existe
    header("Location: inscrever.html");
    exit();
} else {
    // O utilizador não existe, insere no banco de dados
    $result_utilizador="INSERT INTO utilizador (utilizador, password,nome,sobrenome) VALUES('$nome','$senha','$pnome','$snome')";
    $resultado_utilizador = mysqli_query($conn, $result_utilizador);

    if(mysqli_insert_id($conn)){
        header("Location: login.php");
    } else {
        header("Location: login.php");
    }

    // Insere um foto default
    $query = mysqli_query($conn, "INSERT INTO arquivo (nome,utilizador) VALUES('download.png','$nome')");
}

?>