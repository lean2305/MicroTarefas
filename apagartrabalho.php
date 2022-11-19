<!-- Processar upload de imagem de perfil-->

<?php 

//conexão
session_start();

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "conect";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
//fim

if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['Senha']) == true)){

    unset($_SESSION['user']);
    unset($_SESSION['Senha']);
    header('Location: login.php');
}


$logado =$_SESSION['user'];

$usuario = "SELECT * FROM trabalho where usuario = '$logado' ";//buscar nome usuario logado

$arquivo = $_FILES['arquivo']['name'];

//vai remover a foto de perfil anterior
$sqlSelect = "SELECT *  FROM trabalho WHERE  usuario = '$logado'";

$result = $conn->query($sqlSelect);

if($result->num_rows > 0)
{
    $sqlDelete = "DELETE  FROM trabalho WHERE usuario = '$logado'";
    $resultDelete = $conn->query($sqlDelete);
}
//fim de remoção de imagem de perfil





   
    
header('Location: trabalhoativo.php');






?>