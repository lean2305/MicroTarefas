<?php

session_start();


$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "conect";

$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

$value = $_GET['value'];
$empregador = $_GET['nome'];

echo $value;
echo $empregador;

if((!isset($_SESSION['user']) == true) and (!isset($_SESSION['Senha']) == true)){

    unset($_SESSION['user']);
    unset($_SESSION['Senha']);
    header('Location: login.php');
}
$logado =$_SESSION['user'];


$sql= "SELECT * FROM form where utilizador = '$empregador' ";//buscar tudo na tabela form onde for igual a sessão da pessoa
if($ress=mysqli_query($conn,$sql)){
  

    $avaliacao = array();
  
    $ioll = 0;
    
    while($regg=mysqli_fetch_assoc($ress)){
    
        $avaliacao[$ioll] = $regg['avaliacao'] ;  //buscar dados na form  coluna saldo
       

        $calculo =  $avaliacao[$ioll] + $value;
        $dividir = $calculo / 2;
        echo $dividir;
     

        $result_avaliacao="UPDATE form SET avaliacao = '$dividir' WHERE utilizador = '$empregador'  ";
        $resultado_avaliacao = mysqli_query($conn, $result_avaliacao);
    }}
?>