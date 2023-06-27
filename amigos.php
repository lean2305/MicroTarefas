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

$amigo =  addslashes($_POST["amigo"]);



$query = mysqli_query($conn,"SELECT * FROM utilizador WHERE utilizador ='$amigo'");
$nr = mysqli_num_rows($query);




$verifica = "SELECT * FROM amigos WHERE utilizador ='$logado'";


if($ress=mysqli_query($conn,$verifica)){
  

    $pedido_verifica = array();
  
    $ioll = 0;
    $duplicado = 0;
    
    while($regg=mysqli_fetch_assoc($ress)){

        //buscar dados na utilizador  coluna saldo
        $pedido_verifica[$ioll] = $regg['amigo'] ;  

        if($pedido_verifica[$ioll] == $amigo){

            $duplicado = $duplicado  + 1;
                

        }
  
        else{
            
        }

        $ioll = $ioll + 1;

        
    }}

if($duplicado !=1){
if($amigo != $logado){
    if($nr == 1)
    {
    
        $novo_amigo="INSERT INTO amigos (utilizador, amigo) VALUES('$logado','$amigo')";
        $resultado_novo_amigo = mysqli_query($conn, $novo_amigo);
    
        $_SESSION['msg'] = "<p style='color:green;'>Adicionado com sucesso</p>";
        header("Location: chat.php");
        
    }
    
    else if ($nr == 0)
    {
    
        
        $_SESSION['msg'] = "<p style='color:red;'>Adicionado sem sucesso!</p>";
        header("Location: chat.php");
    
    
      // echo "utilizador não existe.";
    
    }
    
}

else
    {
    
        
        $_SESSION['msg'] = "<p style='color:red;'>Não podes te adicionar a ti proprio!</p>";
        header("Location: chat.php");
    
    
      // echo "utilizador não existe.";
    
    }


}
else{
    $_SESSION['msg'] = "<p style='color:red;'>Duplicado!</p>";
        header("Location: chat.php");
}
  
?>
