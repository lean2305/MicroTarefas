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

$remetente = $_GET['remetente'];


$result = mysqli_query($conn, "SELECT * from arquivo where utilizador = '$remetente'");
if ($row = mysqli_fetch_assoc($result)) {
  $caminhoImagem = $row['caminho_imagem'];
  echo "<img src='$caminhoImagem' alt='Imagem do remetente'>";
}


?>