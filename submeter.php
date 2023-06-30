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


//Obter nome do utilizador da sessao 
$logado =$_SESSION['user'];


//Obter dados
$empregador = filter_input(INPUT_POST,'assunto', FILTER_SANITIZE_STRING);
$provas = filter_input(INPUT_POST,'w3review', FILTER_SANITIZE_STRING);
$valor = filter_input(INPUT_POST,'valor', FILTER_SANITIZE_STRING);



$verifica = "SELECT * FROM trabalho WHERE utilizador='$empregador'";

//Conecta com a sessão para obter o saldo para exibir
if($ress=mysqli_query($conn,$verifica)){
  

    $valorr = array();
  
    $ioll = 0;
    
   
    while($regg=mysqli_fetch_assoc($ress)){
        //buscar dados na utilizador  coluna saldo
        $valorr = $regg['valor'] ;  

        if($valor == $valorr ){
            //Inserir na tabela
                                    
          

        

// Generate a random number
$randomNumber = rand(1000, 9999);

// Create event names with random numbers
$event = "CREATE EVENT ${logado}${empregador}${randomNumber} ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 10080 MINUTE ON COMPLETION NOT PRESERVE DO UPDATE utilizador SET saldo = saldo + $valor WHERE utilizador='$logado';";
$events = "CREATE EVENT ${empregador}${randomNumber} ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 10080 MINUTE ON COMPLETION NOT PRESERVE DO UPDATE utilizador SET saldo = saldo - $valor WHERE utilizador='$empregador';";
$eventi = "CREATE EVENT ${empregador}${logado}${empregador}${randomNumber} ON SCHEDULE AT CURRENT_TIMESTAMP + INTERVAL 10080 MINUTE ON COMPLETION NOT PRESERVE DO DELETE FROM provas WHERE trabalhador='$logado';";

// Execute the queries
$CONNT = mysqli_query($conn, $event);
$CONNTs = mysqli_query($conn, $events);
$CONNTi = mysqli_query($conn, $eventi);


$arquivo = $_FILES['arquivo']['name'];

//vai remover a foto de perfil anterior
$sqlSelect = "SELECT * FROM provas ";
            
$result = $conn->query($sqlSelect);

            
//pasta onde vai ser guardado

$_UP['pasta'] = 'print/';


//Tamanho máximo do arquivo em Bytes
$_UP['tamanho'] = 1024*1024*100; //5mb

//Array com a extensões permitidas
$_UP['extensoes'] = array('png', 'jpg', 'jpeg', 'gif');

//Renomeiar
$_UP['renomeia'] = false;
 


//Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especificado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

//Verifica se houve algum erro com o upload. Sem sim, exibe a mensagem do erro
if($_FILES['arquivo']['error'] != 0){
die("Não foi possivel fazer o upload, erro: <br />". $_UP['erros'][$_FILES['arquivo']['error']]);
exit; //Para a execução do script
}

//Faz a verificação da extensao do arquivo
$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
if(array_search($extensao, $_UP['extensoes'])=== false){		
echo "
<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/pap/perfil.php'>
<script type=\"text/javascript\">
    alert(\"A imagem não foi cadastrada extesão inválida.\");
</script>
";
}

//Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']){
echo "
<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/pap/perfil.php'>
<script type=\"text/javascript\">
    alert(\"Arquivo muito grande.\");
</script>
";
}

//O arquivo passou em todas as verificações, hora de tentar move-lo para a pasta foto
else{
//Primeiro verifica se deve trocar o nome do arquivo
if($UP['renomeia'] == true){
//Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
$nome_final = time().'.jpg';
}else{
//mantem o nome original do arquivo
$nome_final = $_FILES['arquivo']['name'];
}
//Verificar se é possivel mover o arquivo para a pasta escolhida
if(move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta']. $nome_final)){
//Upload efetuado com sucesso, exibe a mensagem


  $result_utilizador="INSERT INTO provas (empregador,provas,trabalhador,valor,estado,print) VALUES('$empregador','$provas','$logado','$valor','pendente','$nome_final')";
  $resultado_utilizador = mysqli_query($conn, $result_utilizador);



echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/pap/perfil.php'>
    <script type=\"text/javascript\">
        alert(\"Imagem cadastrada com Sucesso.\");
    </script>
";	
}else{
    
//Upload não efetuado com sucesso, exibe a mensagem
echo "
    <META HTTP-EQUIV=REFRESH CONTENT = '0;URL=http://localhost/pap/testes.php'>
    <script type=\"text/javascript\">
        alert(\"Imagem não foi cadastrada com Sucesso.\");
    </script>
";
}
}


            //Retornar a pagina principal   
            header("Location: principal.php");

        }
        else{
            header("Location: chat.php");
        }
    }
}








?>
