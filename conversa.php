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

$logado == '$logado';




$id_amigo = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);


//utilizador1

$form = "SELECT * FROM menssagem where id_amigo= '$id_amigo' AND user1 ='$logado' ";


if($ress=mysqli_query($conn,$form)){
  

    $valor_saldo = array();
  
    $ioll = 0;
    
    while($regg=mysqli_fetch_assoc($ress)){

       
        $valor_saldo[$ioll] = $regg['texto'] ;  
        




        echo $valor_saldo[$ioll] = $regg['texto'];
        $_SESSION['user1'] = "<p style='color:white;'>".$regg['texto'];"</p>";
        

    }
}
// Fim utilizador1


//utilizador2




$formm = "SELECT * FROM menssagem where id_amigo= '$id_amigo' AND user2 ='$logado'";
    

if($ress=mysqli_query($conn,$formm)){
  

    $valor_saldoo = array();
  
    $iolll = 0;
    $count =0;
    
    while($reggg=mysqli_fetch_assoc($ress)){

  
        $valor_saldoo[$ioll] = $reggg['texto'] ;  
        
        
        echo $valor_saldoo[$iolll] = $reggg['texto'];
        $_SESSION['user2'] = "<p style='color:white;'>".$reggg['texto'];"</p>";
        $count = $count +1;

    }}

//Fim utilizador2
header("Location: chat.php");



?>