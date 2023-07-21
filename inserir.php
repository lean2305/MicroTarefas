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


$utilizador = "SELECT * FROM utilizador where utilizador = '$logado' ";//buscar tudo na tabela utilizador onde for igual a sessão da pessoa
if($ress=mysqli_query($conn,$utilizador)){
  

    $valor_saldo = array();
  
    $ioll = 0;
    
    while($regg=mysqli_fetch_assoc($ress)){
    
        $valor_saldo[$ioll] = $regg['saldo'] ;  //buscar dados na utilizador  coluna saldo
        



?>

<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Customer Management UI</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
<link rel="stylesheet" href="css/inserir.css">

</head>
<body>
<!-- partial:index.partial.html -->
<div class="wrapper">
 <div class="left-side">
  <svg xmlns="http://www.w3.org/2000/svg" onclick="parent.location='perfil.php'" width="20" height="20" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
    <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
  </svg>
 
  <svg viewBox="0 1 511 512" fill="currentColor" class="active" onclick="parent.location='principal.php'">
   <path d="M498.7 222.7L289.8 13.8a46.8 46.8 0 00-66.7 0L14.4 222.6l-.2.2A47.2 47.2 0 0047 303h8.3v153.7a55.2 55.2 0 0055.2 55.2h81.7a15 15 0 0015-15V376.5a25.2 25.2 0 0125.2-25.2h48.2a25.2 25.2 0 0125.1 25.2V497a15 15 0 0015 15h81.8a55.2 55.2 0 0055.1-55.2V303.1h7.7a47.2 47.2 0 0033.4-80.4zm-21.2 45.4a17 17 0 01-12.2 5h-22.7a15 15 0 00-15 15v168.7a25.2 25.2 0 01-25.1 25.2h-66.8V376.5a55.2 55.2 0 00-55.1-55.2h-48.2a55.2 55.2 0 00-55.2 55.2V482h-66.7a25.2 25.2 0 01-25.2-25.2V288.1a15 15 0 00-15-15h-23A17.2 17.2 0 0135.5 244L244.4 35a17 17 0 0124.2 0l208.8 208.8v.1a17.2 17.2 0 010 24.2zm0 0"></path></svg>
  <svg viewBox="0 0 512 512" fill="currentColor">
   <path d="M467 76H45a45 45 0 00-45 45v270a45 45 0 0045 45h422a45 45 0 0045-45V121a45 45 0 00-45-45zm-6.3 30L287.8 278a44.7 44.7 0 01-63.6 0L51.3 106h409.4zM30 384.9V127l129.6 129L30 384.9zM51.3 406L181 277.2l22 22c14.2 14.1 33 22 53.1 22 20 0 38.9-7.9 53-22l22-22L460.8 406H51.3zM482 384.9L352.4 256 482 127V385z"></path></svg>
  <svg viewBox="0 0 512 512" fill="currentColor">
   <path d="M272 512h-32c-26 0-47.2-21.1-47.2-47.1V454c-11-3.5-21.8-8-32.1-13.3l-7.7 7.7a47.1 47.1 0 01-66.7 0l-22.7-22.7a47.1 47.1 0 010-66.7l7.7-7.7c-5.3-10.3-9.8-21-13.3-32.1H47.1c-26 0-47.1-21.1-47.1-47.1v-32.2c0-26 21.1-47.1 47.1-47.1H58c3.5-11 8-21.8 13.3-32.1l-7.7-7.7a47.1 47.1 0 010-66.7l22.7-22.7a47.1 47.1 0 0166.7 0l7.7 7.7c10.3-5.3 21-9.8 32.1-13.3V47.1c0-26 21.1-47.1 47.1-47.1h32.2c26 0 47.1 21.1 47.1 47.1V58c11 3.5 21.8 8 32.1 13.3l7.7-7.7a47.1 47.1 0 0166.7 0l22.7 22.7a47.1 47.1 0 010 66.7l-7.7 7.7c5.3 10.3 9.8 21 13.3 32.1h10.9c26 0 47.1 21.1 47.1 47.1v32.2c0 26-21.1 47.1-47.1 47.1H454c-3.5 11-8 21.8-13.3 32.1l7.7 7.7a47.1 47.1 0 010 66.7l-22.7 22.7a47.1 47.1 0 01-66.7 0l-7.7-7.7c-10.3 5.3-21 9.8-32.1 13.3v10.9c0 26-21.1 47.1-47.1 47.1zM165.8 409.2a176.8 176.8 0 0045.8 19 15 15 0 0111.3 14.5V465c0 9.4 7.7 17.1 17.1 17.1h32.2c9.4 0 17.1-7.7 17.1-17.1v-22.2a15 15 0 0111.3-14.5c16-4.2 31.5-10.6 45.8-19a15 15 0 0118.2 2.3l15.7 15.7a17.1 17.1 0 0024.2 0l22.8-22.8a17.1 17.1 0 000-24.2l-15.7-15.7a15 15 0 01-2.3-18.2 176.8 176.8 0 0019-45.8 15 15 0 0114.5-11.3H465c9.4 0 17.1-7.7 17.1-17.1v-32.2c0-9.4-7.7-17.1-17.1-17.1h-22.2a15 15 0 01-14.5-11.2c-4.2-16.1-10.6-31.6-19-45.9a15 15 0 012.3-18.2l15.7-15.7a17.1 17.1 0 000-24.2l-22.8-22.8a17.1 17.1 0 00-24.2 0l-15.7 15.7a15 15 0 01-18.2 2.3 176.8 176.8 0 00-45.8-19 15 15 0 01-11.3-14.5V47c0-9.4-7.7-17.1-17.1-17.1h-32.2c-9.4 0-17.1 7.7-17.1 17.1v22.2a15 15 0 01-11.3 14.5c-16 4.2-31.5 10.6-45.8 19a15 15 0 01-18.2-2.3l-15.7-15.7a17.1 17.1 0 00-24.2 0l-22.8 22.8a17.1 17.1 0 000 24.2l15.7 15.7a15 15 0 012.3 18.2 176.8 176.8 0 00-19 45.8 15 15 0 01-14.5 11.3H47c-9.4 0-17.1 7.7-17.1 17.1v32.2c0 9.4 7.7 17.1 17.1 17.1h22.2a15 15 0 0114.5 11.3c4.2 16 10.6 31.5 19 45.8a15 15 0 01-2.3 18.2l-15.7 15.7a17.1 17.1 0 000 24.2l22.8 22.8a17.1 17.1 0 0024.2 0l15.7-15.7a15 15 0 0118.2-2.3z"></path>
   <path d="M256 367.4c-61.4 0-111.4-50-111.4-111.4s50-111.4 111.4-111.4 111.4 50 111.4 111.4-50 111.4-111.4 111.4zm0-192.8a81.5 81.5 0 000 162.8 81.5 81.5 0 000-162.8z"></path></svg>
  <svg viewBox="0 0 512 512" fill="currentColor">
   <path d="M255.2 468.6H63.8a21.3 21.3 0 01-21.3-21.2V64.6c0-11.7 9.6-21.2 21.3-21.2h191.4a21.2 21.2 0 100-42.5H63.8A63.9 63.9 0 000 64.6v382.8A63.9 63.9 0 0063.8 511H255a21.2 21.2 0 100-42.5z"></path>
   <path d="M505.7 240.9L376.4 113.3a21.3 21.3 0 10-29.9 30.3l92.4 91.1H191.4a21.2 21.2 0 100 42.6h247.5l-92.4 91.1a21.3 21.3 0 1029.9 30.3l129.3-127.6a21.3 21.3 0 000-30.2z"></path></svg>
 </div>
 <div class="main-container">
  <div class="header">
   <div class="logo">Micro
    <span class="logo-det">Tarefas</span></div>
   <a class="header-link active" href="#"><svg viewBox="-6 0 512 512" fill="currentColor">
     <path d="M227.7 357.5a15.1 15.1 0 0021.3 0l54-54a15.1 15.1 0 10-21.4-21.3l-43.3 43.2-19.7-19.7a15.1 15.1 0 00-21.4 21.4zm0 0"></path>
     <path d="M250.1 439.8a120.1 120.1 0 10-120-120c0 66.2 53.8 120 120 120zm0-209.7a89.9 89.9 0 010 179.5 89.9 89.9 0 010-179.5zm0 0"></path>
     <path d="M451.3 32.2h-27.5v-17a15.1 15.1 0 00-30.3 0v17h-29.7v-17a15.1 15.1 0 00-30.2 0v17h-167v-17a15.1 15.1 0 00-30.2 0v17h-29.7v-17a15.1 15.1 0 00-30.2 0v17H48.9A49 49 0 000 81v382A49 49 0 0048.9 512h402.4a49 49 0 0049-48.9v-382a49 49 0 00-49-49zm18.7 431c0 10.2-8.4 18.6-18.7 18.6H49A18.7 18.7 0 0130.2 463V158H470zM30.2 81c0-10.3 8.4-18.7 18.7-18.7h27.6v17.1a15.1 15.1 0 0030.2 0v-17h29.7v17a15.1 15.1 0 0030.3 0v-17h166.9v17a15.1 15.1 0 0030.2 0v-17h29.7v17a15.1 15.1 0 0030.3 0v-17h27.5c10.3 0 18.7 8.3 18.7 18.6v46.6H30.2zm0 0"></path>
    </svg>
    Pagina principal
   </a>
   <a class="header-link" href="historico.php"><svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="currentColor">
     <path d="M10 13a2 2 0 110-4 2 2 0 010 4zm0-2.5a.5.5 0 100 1 .5.5 0 000-1z"></path>
     <path d="M20.3 11.8h-8.8a.8.8 0 010-1.6h8.8a.8.8 0 010 1.6zM8.5 11.8H3.7a.8.8 0 010-1.6h4.8a.8.8 0 010 1.6zM15 19a2 2 0 110-4 2 2 0 010 4zm0-2.5a.5.5 0 100 1 .5.5 0 000-1z"></path>
     <path d="M20.3 17.8h-3.8a.8.8 0 010-1.6h3.8a.8.8 0 010 1.6zM13.5 17.8H3.7a.8.8 0 010-1.6h9.8a.8.8 0 010 1.6z"></path>
     <path d="M21.3 23H2.6A2.8 2.8 0 010 20.2V3.9C0 2.1 1.2 1 2.8 1h18.4C22.9 1 24 2.2 24 3.8v16.4c0 1.6-1.2 2.8-2.8 2.8zM2.6 2.5c-.6 0-1.2.6-1.2 1.3v16.4c0 .7.6 1.3 1.3 1.3h18.4c.7 0 1.3-.6 1.3-1.3V3.9c0-.7-.6-1.3-1.3-1.3z"></path>
     <path d="M23.3 6H.6a.8.8 0 010-1.5h22.6a.8.8 0 010 1.5z"></path>
    </svg>
    Historico tarefas
   </a>
   
   <div class="user-info">
    <button class="button">All
     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down">
      <path d="M6 9l6 6 6-6"></path></svg>
    </button>
    <div class="user-name"> <?php echo $logado; ?></div>
    <svg class="profile" viewBox="-42 0 512 512" fill="currentColor">
     <path d="M210.4 246.6c33.8 0 63.2-12.1 87.1-36.1 24-24 36.2-53.3 36.2-87.2 0-33.9-12.2-63.2-36.2-87.2-24-24-53.3-36.1-87.1-36.1-34 0-63.3 12.2-87.2 36.1S87 89.4 87 123.3c0 33.9 12.2 63.2 36.2 87.2 24 24 53.3 36.1 87.2 36.1zm-66-189.3a89.1 89.1 0 0166-27.3c26 0 47.5 9 66 27.3a89.2 89.2 0 0127.3 66c0 26-9 47.6-27.4 66a89.1 89.1 0 01-66 27.3c-26 0-47.5-9-66-27.3a89.1 89.1 0 01-27.3-66c0-26 9-47.6 27.4-66zm0 0M426.1 393.7a304.6 304.6 0 00-12-64.9 160.7 160.7 0 00-13.5-30.3c-5.7-10.2-12.5-19-20.1-26.3a88.9 88.9 0 00-29-18.2 100.1 100.1 0 00-37-6.7c-5.2 0-10.2 2.2-20 8.5-6 4-13 8.5-20.9 13.5-6.7 4.3-15.8 8.3-27 11.9a107.3 107.3 0 01-66 0 119.3 119.3 0 01-27-12l-21-13.4c-9.7-6.3-14.8-8.5-20-8.5a100 100 0 00-37 6.7 88.8 88.8 0 00-29 18.2 114.4 114.4 0 00-20.1 26.3 161 161 0 00-13.4 30.3A302.5 302.5 0 001 393.7c-.7 9.8-1 20-1 30.2 0 26.8 8.5 48.4 25.3 64.4C41.8 504 63.6 512 90.3 512h246.5c26.7 0 48.6-8 65.1-23.7 16.8-16 25.3-37.6 25.3-64.4a437 437 0 00-1-30.2zm-44.9 72.8c-11 10.4-25.4 15.5-44.4 15.5H90.3c-19 0-33.4-5-44.4-15.5C35.2 456.3 30 442.4 30 424c0-9.5.3-19 1-28.1A272.9 272.9 0 0141.7 338a131 131 0 0110.9-24.7A84.8 84.8 0 0167.4 294a59 59 0 0119.3-12 69 69 0 0123.6-4.5c1 .5 3 1.6 6 3.6l21 13.6c9 5.6 20.4 10.7 34 15.1a137.3 137.3 0 0084.5 0c13.7-4.4 25.1-9.5 34-15.1a2721 2721 0 0027-17.2 69 69 0 0123.7 4.5 59 59 0 0119.2 12 84.5 84.5 0 0114.9 19.4c4.5 8 8.2 16.3 10.8 24.7a275.2 275.2 0 0110.8 57.8c.6 9 1 18.5 1 28.1 0 18.5-5.3 32.4-16 42.6zm0 0"></path></svg>
    <div class="hour"><?php   echo $valor_saldo[$ioll] = $regg['saldo']; ?>€</div>

   </div>
  </div>
  <div class="user-box first-box">
   
  <?php  }}    ?>
   
   
  </div>
   <!-- codigo saldo -->
  <div class="user-box second-box">
   <div class="cards-wrapper" style="--delay: 1s">
    <div class="cards-header">
     <div class="cards-view">
     <form  method="POST" action="inserirr.php"  >

<center>
<div  class="utilizador">
    <h1 style="font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;">Inserir trabalho</h1>

    <input  class="activity card" style="color:white;" type="text" id="assunto" name="assunto" placeholder="Assunto"><br>
    <textarea class="activity card"  maxlength="350" style="color:white;" id="w3review" name="w3review" rows="5" cols="50" placeholder="Descrição da tarefa"></textarea><br>

    <input class="activity card"  style="color:white;" type="text" id="valor" name="valor" placeholder="valor ex:0.05 (valor por pessoa)" me-5 onchange="this.value = this.value.replace(/,/g, '.')"/><br>
   

</div>
</center>


     <select class="select" name="select">
        <option name="inserir" value="" disabled selected>Categoria</option> 
        <?php 

$sql ='SELECT * FROM categoria';

if($res=mysqli_query($conn,$sql)){

    $categoria = array();

    $iol = 0;

    while($reg=mysqli_fetch_assoc($res)){

    $categoria[$iol] = $reg['categoria'];
    $id_categotia[$iol] = $reg['id_categoria'];


?>
        
        <option name="inserir" value="<?php echo $id_categotia[$iol]; ?>" ><?php echo $categoria[$iol]; ?></option> 
        
        


        <?php
        
    }}
        
        ?>
    </select>
    <br>   <button class="button" type="submit" name="btn" class="btn btn-primary btn-block btn-large">Publicar</button>
 
    <?php 
    
    if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        } 
        
        
        
    ?>
   </div>


</form>
     </div>
     <div class="cards-header-date">
    <!-- div sem conteudo--->
     </div>
    
    </div>
   
   </div>
   
   
<!-- partial -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script><script src="./script.js"></script>



</div></div></div></body>
</html>
