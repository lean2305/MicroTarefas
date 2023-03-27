
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



?>

<!DOCTYPE html>
<html>
<head>
	<title>Chat em Simultâneo</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		body {
			background-color: #f2f2f2;
			font-family: Arial, sans-serif;
			font-size: 14px;
			margin: 0;
			padding: 0;
		}
		.container {
			display: flex;
			flex-direction: column;
			height: 100vh;
			justify-content: center;
			align-items: center;
			padding: 10px;
		}
		.chatbox {
			border: 1px solid #ccc;
			border-radius: 5px;
			height: 400px;
			width: 600px;
			padding: 10px;
			overflow: auto;
			background-color: #fff;
			box-shadow: 0px 0px 5px #ccc;
		}
		.inputbox {
			display: flex;
			flex-direction: row;
			margin-top: 10px;
		}
		.inputbox input[type="text"] {
			flex: 1;
			padding: 10px;
			border: 1px solid #ccc;
			border-radius: 5px;
			font-size: 14px;
		}
		.inputbox button {
			padding: 10px;
			margin-left: 10px;
			background-color: #4CAF50;
			color: #fff;
			border: none;
			border-radius: 5px;
			font-size: 14px;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="chatbox">
			<!-- Mensagens serão adicionadas aqui dinamicamente -->
		</div>
		<div class="inputbox">
		  <input type="text" id="mensagem" placeholder="Digite sua mensagem...">
      <button onclick="enviarMensagem()">Enviar</button>
		</div>
	</div>
  <span id="logado" data-logado="<?php echo $logado; ?>"></span>
	<script>
		var ws = new WebSocket("ws://localhost:8080");

		// Quando uma mensagem é recebida pelo servidor WebSocket
		ws.onmessage = function(event) {
			var mensagem = event.data;
			var mensagensContainer = document.querySelector(".chatbox");
			var novaMensagem = document.createElement("div");
			novaMensagem.className = "message received";
			novaMensagem.innerHTML = "<p>" + mensagem + "</p>";
			mensagensContainer.appendChild(novaMensagem);
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
      novaMensagem.innerHTML = "<p>" + logado + ": " + mensagem + "</p>";
			mensagensContainer.appendChild(novaMensagem);
		}
	</script>
</body>
</html>
