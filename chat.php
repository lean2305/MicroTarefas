
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

//Buscar o nome do utilizador da sessao 
$logado =$_SESSION['user'];


//Buscar dados da tabela trabalho
$assunto = mysqli_query($conn,"SELECT assunto FROM trabalho ");

//Buscar dados da tabela provas
$dado = mysqli_query($conn,"SELECT * FROM provas");

//Buscar dados da tabela utilizador
$saldo = mysqli_query($conn,"SELECT * FROM utilizador");//





//buscar tudo na tabela utilizador onde for igual a sessão da pessoa
$utilizador = "SELECT * FROM utilizador where utilizador = '$logado' ";

//Conecta com a sessão para obter o saldo para exibir
if($ress=mysqli_query($conn,$utilizador)){
  

    $valor_saldo = array();
  
    $ioll = 0;
    
    while($regg=mysqli_fetch_assoc($ress)){

        //buscar dados na utilizador  coluna saldo
        $valor_saldo[$ioll] = $regg['saldo'] ;  
        

        
     
$sql  ="SELECT * from arquivo where utilizador = '$logado' ";
$resultado = $conn->query($sql);


while ($linha = mysqli_fetch_array($resultado)){

    $album [] = $linha;

}
 


?>




<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Micro Tarefas</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="chat/style.css">
<meta http-equiv="refresh" content="600" >

</head>
<body>

<!-- Header contendo botões, saldo e nome do utilizador -->
<div class="wrapper">
 <div class="left-side">
 <svg xmlns="http://www.w3.org/2000/svg" onclick="parent.location='perfil.php'" width="20" height="20" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
  <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
</svg>
  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">
   <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path></svg>
  <svg viewBox="0 1 511 512" fill="currentColor"  onclick="parent.location='principal.php'">
   <path d="M498.7 222.7L289.8 13.8a46.8 46.8 0 00-66.7 0L14.4 222.6l-.2.2A47.2 47.2 0 0047 303h8.3v153.7a55.2 55.2 0 0055.2 55.2h81.7a15 15 0 0015-15V376.5a25.2 25.2 0 0125.2-25.2h48.2a25.2 25.2 0 0125.1 25.2V497a15 15 0 0015 15h81.8a55.2 55.2 0 0055.1-55.2V303.1h7.7a47.2 47.2 0 0033.4-80.4zm-21.2 45.4a17 17 0 01-12.2 5h-22.7a15 15 0 00-15 15v168.7a25.2 25.2 0 01-25.1 25.2h-66.8V376.5a55.2 55.2 0 00-55.1-55.2h-48.2a55.2 55.2 0 00-55.2 55.2V482h-66.7a25.2 25.2 0 01-25.2-25.2V288.1a15 15 0 00-15-15h-23A17.2 17.2 0 0135.5 244L244.4 35a17 17 0 0124.2 0l208.8 208.8v.1a17.2 17.2 0 010 24.2zm0 0"></path></svg>
  <svg viewBox="0 0 512 512" fill="currentColor" onclick="parent.location='mensagem.php'">
   <path d="M467 76H45a45 45 0 00-45 45v270a45 45 0 0045 45h422a45 45 0 0045-45V121a45 45 0 00-45-45zm-6.3 30L287.8 278a44.7 44.7 0 01-63.6 0L51.3 106h409.4zM30 384.9V127l129.6 129L30 384.9zM51.3 406L181 277.2l22 22c14.2 14.1 33 22 53.1 22 20 0 38.9-7.9 53-22l22-22L460.8 406H51.3zM482 384.9L352.4 256 482 127V385z"></path></svg>
  <svg viewBox="0 0 512 512" fill="currentColor" onclick="parent.location='defenicoes.php'">
   <path d="M272 512h-32c-26 0-47.2-21.1-47.2-47.1V454c-11-3.5-21.8-8-32.1-13.3l-7.7 7.7a47.1 47.1 0 01-66.7 0l-22.7-22.7a47.1 47.1 0 010-66.7l7.7-7.7c-5.3-10.3-9.8-21-13.3-32.1H47.1c-26 0-47.1-21.1-47.1-47.1v-32.2c0-26 21.1-47.1 47.1-47.1H58c3.5-11 8-21.8 13.3-32.1l-7.7-7.7a47.1 47.1 0 010-66.7l22.7-22.7a47.1 47.1 0 0166.7 0l7.7 7.7c10.3-5.3 21-9.8 32.1-13.3V47.1c0-26 21.1-47.1 47.1-47.1h32.2c26 0 47.1 21.1 47.1 47.1V58c11 3.5 21.8 8 32.1 13.3l7.7-7.7a47.1 47.1 0 0166.7 0l22.7 22.7a47.1 47.1 0 010 66.7l-7.7 7.7c5.3 10.3 9.8 21 13.3 32.1h10.9c26 0 47.1 21.1 47.1 47.1v32.2c0 26-21.1 47.1-47.1 47.1H454c-3.5 11-8 21.8-13.3 32.1l7.7 7.7a47.1 47.1 0 010 66.7l-22.7 22.7a47.1 47.1 0 01-66.7 0l-7.7-7.7c-10.3 5.3-21 9.8-32.1 13.3v10.9c0 26-21.1 47.1-47.1 47.1zM165.8 409.2a176.8 176.8 0 0045.8 19 15 15 0 0111.3 14.5V465c0 9.4 7.7 17.1 17.1 17.1h32.2c9.4 0 17.1-7.7 17.1-17.1v-22.2a15 15 0 0111.3-14.5c16-4.2 31.5-10.6 45.8-19a15 15 0 0118.2 2.3l15.7 15.7a17.1 17.1 0 0024.2 0l22.8-22.8a17.1 17.1 0 000-24.2l-15.7-15.7a15 15 0 01-2.3-18.2 176.8 176.8 0 0019-45.8 15 15 0 0114.5-11.3H465c9.4 0 17.1-7.7 17.1-17.1v-32.2c0-9.4-7.7-17.1-17.1-17.1h-22.2a15 15 0 01-14.5-11.2c-4.2-16.1-10.6-31.6-19-45.9a15 15 0 012.3-18.2l15.7-15.7a17.1 17.1 0 000-24.2l-22.8-22.8a17.1 17.1 0 00-24.2 0l-15.7 15.7a15 15 0 01-18.2 2.3 176.8 176.8 0 00-45.8-19 15 15 0 01-11.3-14.5V47c0-9.4-7.7-17.1-17.1-17.1h-32.2c-9.4 0-17.1 7.7-17.1 17.1v22.2a15 15 0 01-11.3 14.5c-16 4.2-31.5 10.6-45.8 19a15 15 0 01-18.2-2.3l-15.7-15.7a17.1 17.1 0 00-24.2 0l-22.8 22.8a17.1 17.1 0 000 24.2l15.7 15.7a15 15 0 012.3 18.2 176.8 176.8 0 00-19 45.8 15 15 0 01-14.5 11.3H47c-9.4 0-17.1 7.7-17.1 17.1v32.2c0 9.4 7.7 17.1 17.1 17.1h22.2a15 15 0 0114.5 11.3c4.2 16 10.6 31.5 19 45.8a15 15 0 01-2.3 18.2l-15.7 15.7a17.1 17.1 0 000 24.2l22.8 22.8a17.1 17.1 0 0024.2 0l15.7-15.7a15 15 0 0118.2-2.3z"></path>
   <path d="M256 367.4c-61.4 0-111.4-50-111.4-111.4s50-111.4 111.4-111.4 111.4 50 111.4 111.4-50 111.4-111.4 111.4zm0-192.8a81.5 81.5 0 000 162.8 81.5 81.5 0 000-162.8z"></path></svg>
  <svg viewBox="0 0 512 512" fill="currentColor" onclick="parent.location='sair.php'">
   <path d="M255.2 468.6H63.8a21.3 21.3 0 01-21.3-21.2V64.6c0-11.7 9.6-21.2 21.3-21.2h191.4a21.2 21.2 0 100-42.5H63.8A63.9 63.9 0 000 64.6v382.8A63.9 63.9 0 0063.8 511H255a21.2 21.2 0 100-42.5z"></path>
   <path d="M505.7 240.9L376.4 113.3a21.3 21.3 0 10-29.9 30.3l92.4 91.1H191.4a21.2 21.2 0 100 42.6h247.5l-92.4 91.1a21.3 21.3 0 1029.9 30.3l129.3-127.6a21.3 21.3 0 000-30.2z"></path></svg>
 </div>
 <div class="main-container">
  <div class="header">
   <div class="logo">Micro
    <span class="logo-det">Tarefas</span></div>
   <a class="header-link " href="principal.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M2 13.5V7h1v6.5a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5V7h1v6.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5zm11-11V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
  <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
</svg>
    Pagina principal
   </a>
  
   <a class="header-link active" href=""><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chat-dots" viewBox="0 0 16 16">
  <path d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
  <path d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z"/>
</svg>
    Chat
   </a>
   <a class="header-link" href="historico.php"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock-history" viewBox="0 0 16 16">
  <path d="M8.515 1.019A7 7 0 0 0 8 1V0a8 8 0 0 1 .589.022l-.074.997zm2.004.45a7.003 7.003 0 0 0-.985-.299l.219-.976c.383.086.76.2 1.126.342l-.36.933zm1.37.71a7.01 7.01 0 0 0-.439-.27l.493-.87a8.025 8.025 0 0 1 .979.654l-.615.789a6.996 6.996 0 0 0-.418-.302zm1.834 1.79a6.99 6.99 0 0 0-.653-.796l.724-.69c.27.285.52.59.747.91l-.818.576zm.744 1.352a7.08 7.08 0 0 0-.214-.468l.893-.45a7.976 7.976 0 0 1 .45 1.088l-.95.313a7.023 7.023 0 0 0-.179-.483zm.53 2.507a6.991 6.991 0 0 0-.1-1.025l.985-.17c.067.386.106.778.116 1.17l-1 .025zm-.131 1.538c.033-.17.06-.339.081-.51l.993.123a7.957 7.957 0 0 1-.23 1.155l-.964-.267c.046-.165.086-.332.12-.501zm-.952 2.379c.184-.29.346-.594.486-.908l.914.405c-.16.36-.345.706-.555 1.038l-.845-.535zm-.964 1.205c.122-.122.239-.248.35-.378l.758.653a8.073 8.073 0 0 1-.401.432l-.707-.707z"/>
  <path d="M8 1a7 7 0 1 0 4.95 11.95l.707.707A8.001 8.001 0 1 1 8 0v1z"/>
  <path d="M7.5 3a.5.5 0 0 1 .5.5v5.21l3.248 1.856a.5.5 0 0 1-.496.868l-3.5-2A.5.5 0 0 1 7 9V3.5a.5.5 0 0 1 .5-.5z"/>
</svg>
    Historico tarefas
   </a>
 
   <div class="user-info">
    <button class="button">All
     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
      <path d="M6 9l6 6 6-6"></path></svg>
    </button>
    <div class="user-name"><?php echo $logado; ?></div>
    <svg  class="profile" viewBox="-42 0 512 512" fill="currentColor">
     <path d="M210.4 246.6c33.8 0 63.2-12.1 87.1-36.1 24-24 36.2-53.3 36.2-87.2 0-33.9-12.2-63.2-36.2-87.2-24-24-53.3-36.1-87.1-36.1-34 0-63.3 12.2-87.2 36.1S87 89.4 87 123.3c0 33.9 12.2 63.2 36.2 87.2 24 24 53.3 36.1 87.2 36.1zm-66-189.3a89.1 89.1 0 0166-27.3c26 0 47.5 9 66 27.3a89.2 89.2 0 0127.3 66c0 26-9 47.6-27.4 66a89.1 89.1 0 01-66 27.3c-26 0-47.5-9-66-27.3a89.1 89.1 0 01-27.3-66c0-26 9-47.6 27.4-66zm0 0M426.1 393.7a304.6 304.6 0 00-12-64.9 160.7 160.7 0 00-13.5-30.3c-5.7-10.2-12.5-19-20.1-26.3a88.9 88.9 0 00-29-18.2 100.1 100.1 0 00-37-6.7c-5.2 0-10.2 2.2-20 8.5-6 4-13 8.5-20.9 13.5-6.7 4.3-15.8 8.3-27 11.9a107.3 107.3 0 01-66 0 119.3 119.3 0 01-27-12l-21-13.4c-9.7-6.3-14.8-8.5-20-8.5a100 100 0 00-37 6.7 88.8 88.8 0 00-29 18.2 114.4 114.4 0 00-20.1 26.3 161 161 0 00-13.4 30.3A302.5 302.5 0 001 393.7c-.7 9.8-1 20-1 30.2 0 26.8 8.5 48.4 25.3 64.4C41.8 504 63.6 512 90.3 512h246.5c26.7 0 48.6-8 65.1-23.7 16.8-16 25.3-37.6 25.3-64.4a437 437 0 00-1-30.2zm-44.9 72.8c-11 10.4-25.4 15.5-44.4 15.5H90.3c-19 0-33.4-5-44.4-15.5C35.2 456.3 30 442.4 30 424c0-9.5.3-19 1-28.1A272.9 272.9 0 0141.7 338a131 131 0 0110.9-24.7A84.8 84.8 0 0167.4 294a59 59 0 0119.3-12 69 69 0 0123.6-4.5c1 .5 3 1.6 6 3.6l21 13.6c9 5.6 20.4 10.7 34 15.1a137.3 137.3 0 0084.5 0c13.7-4.4 25.1-9.5 34-15.1a2721 2721 0 0027-17.2 69 69 0 0123.7 4.5 59 59 0 0119.2 12 84.5 84.5 0 0114.9 19.4c4.5 8 8.2 16.3 10.8 24.7a275.2 275.2 0 0110.8 57.8c.6 9 1 18.5 1 28.1 0 18.5-5.3 32.4-16 42.6zm0 0"></path></svg>
    <div class="hour"><?php   echo $valor_saldo[$ioll] = $regg['saldo']; ?>€</div>
    
   </div>
  </div>
  <div class="user-box first-box">
   
 
  <?php  }}    ?> <!--Fim do php codigo saldo -->
   
  </div>
   
  <div class="app-container">
  <div class="app-left">
   
    <div class="app-profile-box">
    <?php   foreach ($album as $foto)   {     ?>
     <img src="<?php echo "./foto/".$foto["nome"] ?>" alt="">
<?php   }     ?>
      <div class="app-profile-box-name">
      <?php echo $logado; ?>
        <button class="app-setting">
          
            <defs/>
            <circle cx="12" cy="12" r="3"/>
            <path d="M19.4 15a1.65 1.65 0 00.33 1.82l.06.06a2 2 0 010 2.83 2 2 0 01-2.83 0l-.06-.06a1.65 1.65 0 00-1.82-.33 1.65 1.65 0 00-1 1.51V21a2 2 0 01-2 2 2 2 0 01-2-2v-.09A1.65 1.65 0 009 19.4a1.65 1.65 0 00-1.82.33l-.06.06a2 2 0 01-2.83 0 2 2 0 010-2.83l.06-.06a1.65 1.65 0 00.33-1.82 1.65 1.65 0 00-1.51-1H3a2 2 0 01-2-2 2 2 0 012-2h.09A1.65 1.65 0 004.6 9a1.65 1.65 0 00-.33-1.82l-.06-.06a2 2 0 010-2.83 2 2 0 012.83 0l.06.06a1.65 1.65 0 001.82.33H9a1.65 1.65 0 001-1.51V3a2 2 0 012-2 2 2 0 012 2v.09a1.65 1.65 0 001 1.51 1.65 1.65 0 001.82-.33l.06-.06a2 2 0 012.83 0 2 2 0 010 2.83l-.06.06a1.65 1.65 0 00-.33 1.82V9a1.65 1.65 0 001.51 1H21a2 2 0 012 2 2 2 0 01-2 2h-.09a1.65 1.65 0 00-1.51 1z"/>
          </svg>
        </button>
      </div>
      
      <div class="switch-status">
        <input type="checkbox" name="switchStatus" id="switchStatus" checked>
        <label class="label-toggle" for="switchStatus"></label>
        <span class="toggle-text toggle-online">Online</span>
        <span class="toggle-text toggle-offline">Offline</span>
      </div>
    </div>



<!-- Adicionar amigos-->
<section>
<form  method="post" action="amigos.php">


  <div class="chat-list-header">
      <span>Adicionar Amigos</span>
  </div>

  <input class="friend-send-btn" type="text"  name="amigo"  placeholder="Insira o nome">
  <button class="chat-send-btn" type="submit">Adicionar</button>
  </form>
  <?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		} 
    
    ?>
</section>
<!--Fim adicionar amigos-->



    <div class="chat-list-wrapper">


      <div class="chat-list-header">Amigos<span class="c-number"><?php 
      
      $query= "SELECT id_amigo from amigos where utilizador = '$logado'";
      $query_run = mysqli_query($conn,$query);

      $row = mysqli_num_rows($query_run);

      echo $row ;
      
      
      ?></span>


      
        <svg class="list-header-arrow" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="feather feather-chevron-up" viewBox="0 0 24 24">
          <defs/>
          <path d="M18 15l-6-6-6 6"/>
        </svg>
      </div>

        <!-- Auto id_amigo-->
      <?php
//Setar a quantidade de itens por pagina
$qnt_result_pg = 1;
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;
//calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;
    $sql = "SELECT * FROM amigos Where utilizador =  '$logado'";//buscar tudo na tabela trabalho
		$result_utilizadors = "SELECT * FROM amigos Where utilizador =  '$logado' ";
		$resultado_utilizadors = mysqli_query($conn, $result_utilizadors);
if($res=mysqli_query($conn,$sql)){
  

  $utilizador = array();
  $amigo = array();

  $iol = 0;

while($reg=mysqli_fetch_assoc($res)){     
  
      $utilizador[$iol] = $reg['utilizador'] ;  //buscar dados na tabela trabalho coluna assunto
      $amigo[$iol] = $reg['amigo'] ;

      //Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id_amigo) AS num_result FROM amigos";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
  ?>
  <!-- fim auto ids-->
  

        <?php

            $sqli = "SELECT * FROM amigos where utilizador = '$logado' ";
          
  
  
            if($res=mysqli_query($conn,$sqli)){


                $tbl_amigo = array();


                $iol = 0;

                while($reg=mysqli_fetch_assoc($res)){

                    $tbl_amigo[$iol] = $reg['amigo'] ;  //buscar dados na tabela trabalho coluna amigo
                    $tbl_utilizador[$iol] = $reg['utilizador'] ;  //buscar dados na tabela trabalho coluna amigo
                   
                    

        
                    
 
  

?>


<?php   $sqlu  ="SELECT * from arquivo where utilizador = '$tbl_amigo[$iol]' ";
                    $resultadoo = $conn->query($sqlu);


                    while ($linhaa = mysqli_fetch_array($resultadoo)){

                      $albumm[$iol] = $linhaa;

} ?>


      <ul class="chat-list active">
        <li class="chat-list-item active">
        <?php   foreach ($albumm as $fotor)   {     ?>
          <img src="<?php echo "./foto/".$fotor["nome"] ?>" alt=""<?php   }     ?>>
          <?php echo "<a class='cards-button button' href='conversa.php?id=" . $reg['id_amigo'] . "'>Conversar</a><br>"; ?>
          <?php echo $reg['id_amigo'] ?>
          <span class="chat-list-name"><?php echo $tbl_amigo[$iol]; ?></span>
          
        </li>
      
                <?php
            
          
          }
          }

        $iol =$iol +1;//adicionar +1 na variavel iol
        ?>     <?php  }}    ?>
      </ul>


<!-- Amizade adicionado por outras pessoas-->
<?php


$sqli = "SELECT * FROM amigos where amigo = '$logado' ";



if($res=mysqli_query($conn,$sqli)){


    $tbl_amigo = array();


    $iol = 0;

    while($reg=mysqli_fetch_assoc($res)){
      $tbl_amigos[$iol] = $reg['utilizador'] ;  //buscar dados na tabela trabalho coluna amigo
     
    
     
?>

<?php   $sqlu  ="SELECT * from arquivo where utilizador = '$tbl_amigos[$iol]' ";
                    $resultadoo = $conn->query($sqlu);


                    while ($linhal = mysqli_fetch_array($resultadoo)){
                      
                       $albummm[$iol] = $linhal;

} ?>
      

      <ul class="chat-list active">
        <li class="chat-list-item active">
       
         
        <?php   foreach ($albummm as $fotor)   {     ?>
          <img src="<?php echo "./foto/".$fotor["nome"] ?>" alt=""<?php   }     ?>>
          <?php echo "<a class='cards-button button' href='conversa.php?id=" . $reg['id_amigo'] . "'>Conversar</a><br>"; ?>
          <?php echo $reg['id_amigo'] ?>
          
          <span class="chat-list-name"><?php echo $tbl_amigos[$iol]; ?></span>
          
          
        </li>
        
                <?php
            
          
          }
          }

        $iol =$iol +1;//adicionar +1 na variavel iol
        ?>
      </ul>


<!--Fim amizade adicionado por outras pessoas-->
    </div>
  </div>
  <?php

  
  ?>
  <div class="app-main">
  <div class="container">
 
		<div class="chatbox">
			<!-- Mensagens serão adicionadas aqui dinamicamente -->
		</div>
    
  <span id="logado" data-logado="<?php echo $logado; ?>"></span>
  </div>

  <div class="chat-input-wrapper">
      <button class="chat-attachment-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-paperclip" viewBox="0 0 24 24">
          <defs></defs>
          <path d="M21.44 11.05l-9.19 9.19a6 6 0 01-8.49-8.49l9.19-9.19a4 4 0 015.66 5.66l-9.2 9.19a2 2 0 01-2.83-2.83l8.49-8.48"></path>
        </svg>
      </button>
      <div class="input-wrapper">
          <input type="text" id="mensagem" class="chat-input" placeholder="Digite sua mensagem...">
        <button class="emoji-btn">
        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="feather feather-smile" viewBox="0 0 24 24">
          <defs></defs>
          <circle cx="12" cy="12" r="10"></circle>
          <path d="M8 14s1.5 2 4 2 4-2 4-2M9 9h.01M15 9h.01"></path>
        </svg>
      </button>
      </div>
      <button class="chat-send-btn" onclick="enviarMensagem()">Enviar</button>
    </div>
	<script>
		var ws = new WebSocket("ws://localhost:8080");

		// Quando uma mensagem é recebida pelo servidor WebSocket
		ws.onmessage = function(event) {
    var mensagemBlob = event.data;
    mensagemBlob.text().then(function(mensagem) {
        var mensagensContainer = document.querySelector(".chatbox");
        var novaMensagem = document.createElement("div");
        novaMensagem.className = "message received";
        
        novaMensagem.innerHTML = "<div class='message-wrapper reverse'><img class='message-pp' src='https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=2550&amp;q=80' alt='profile-pic'><div class='message-box-wrapper'><div class='message-box'>" + mensagem + "";
        mensagensContainer.appendChild(novaMensagem);
    });
}
function enviarMensagem() {
    var mensagemInput = document.getElementById("mensagem");
    var mensagem = mensagemInput.value;
    ws.send(mensagem);
    mensagemInput.value = "";
    var mensagensContainer = document.querySelector(".chatbox");
    var novaMensagem = document.createElement("div");
    novaMensagem.className = "message sent";
    var logado = document.getElementById("logado").getAttribute("data-logado");
    novaMensagem.innerHTML = `<div class="message-wrapper">
    
                                  <img class="message-pp" src="https://images.unsplash.com/photo-1587080266227-677cc2a4e76e?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&amp;ixlib=rb-1.2.1&amp;auto=format&amp;fit=crop&amp;w=934&amp;q=80" alt="profile-pic">
                                  <div class="message-box-wrapper">
                                      <div class="message-box">
                                          <span class="message-sender">${logado}</span>
                                          <p class="message-text">${mensagem}</p>
                                      </div>
                                      <span class="message-time">9h ago</span>
                                  </div>
                              </div>`;
    mensagensContainer.appendChild(novaMensagem);
}

	</script>
  
</div>
</body>
</html>
