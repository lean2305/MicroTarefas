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

$utilizador = "SELECT * FROM utilizador where utilizador = '$logado' ";//buscar nome utilizador logado



$saldo = "SELECT * FROM utilizador  ";//buscar nome utilizador logado
$resultado_saldoo = mysqli_query($conn, $saldo);


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$saldo = filter_input(INPUT_GET, 'valor', FILTER_SANITIZE_NUMBER_INT);
$prova = filter_input(INPUT_GET, 'provas', FILTER_SANITIZE_NUMBER_INT);



$trabalhador = filter_input(INPUT_GET, 'trabalhador', FILTER_SANITIZE_NUMBER_INT);

$empregador = filter_input(INPUT_GET, 'empregador', FILTER_SANITIZE_NUMBER_INT);
$sqle = "SELECT * FROM provas WHERE id_prova='$id'";
  


if($res=mysqli_query($conn,$sqle)){
  

    $trabalhadorr= array();
    $valorr= array();
    $empregadorr= array();
    $provas = array();

 
}

$event= "DROP EVENT IF EXISTS $empregador$logado;";
$CONNT = mysqli_query($conn, $event);
$events= "DROP EVENT IF EXISTS $logado;";
$CONNT = mysqli_query($conn, $events);
$eventi= "DROP EVENT IF EXISTS $logado$empregador$logado;";
$CONNT = mysqli_query($conn, $eventi);


$reg=mysqli_fetch_assoc($res);

$trabalhadorr = $reg['trabalhador'] ; 
$valorr = $reg['valor'] ; 
$empregadorr = $reg['empregador'] ; 
$provas = $reg['provas'] ;


$result_historico="INSERT INTO historico_trabalho (empregador, trabalhador,valor,estado,prova) VALUES('$empregadorr','$trabalhadorr','$valorr','recusado','$provas')";


$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id)){
	$resultado_historico = mysqli_query($conn, $result_historico);
	$result_utilizador = "DELETE FROM provas WHERE id_prova='$id'";
	$resultado_utilizador = mysqli_query($conn, $result_utilizador);
	if(mysqli_affected_rows($conn)){
		$_SESSION['msg'] = "<p style='color:green;'>Usuário recusado com sucesso</p>";
		header("Location: index.php");
	}else{
		
		$_SESSION['msg'] = "<p style='color:red;'>Erro o usuário não foi recusado com sucesso</p>";
		header("Location: index.php");
	}
}else{	
	$_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
	header("Location: index.php");
}







header('Location: perfil.php');

?>