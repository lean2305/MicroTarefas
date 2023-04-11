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



//echo "Nome: $nome <br>";

$result_utilizador="INSERT INTO utilizador (utilizador, password,nome,sobrenome) VALUES('$nome','$senha','$pnome','$snome')";

$resultado_utilizador = mysqli_query($conn, $result_utilizador);


if(mysqli_insert_id($conn)){

        
        
    header("Location: login.php");

}else{
  
    header("Location: login.php");
}


    //Vai usar um foto default
    
    $query = mysqli_query($conn, "INSERT INTO arquivo (
        nome,utilizador) VALUES('download.png','$nome')");
     
    



?>