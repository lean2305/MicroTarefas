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





$atual =  addslashes($_POST["atual"]);
$nova = addslashes($_POST["nova"]);

$query = mysqli_query($conn,"SELECT * FROM utilizador WHERE utilizador = '".$logado." ' and password = '".$atual."' ");
$nr = mysqli_num_rows($query);


if($nr == 1)
{

    $result_password = "UPDATE utilizador SET password='$nova' WHERE utilizador='$logado'";
    $resultpass = $conn->query($result_password);
    header("Location: novapassword.php");

    
}

else if ($nr == 0)
{

    
    header("Location: login.html");
    


  // echo "utilizador não existe.";

}

?>