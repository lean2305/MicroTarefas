<?php
// Obter o valor de 'id' do parâmetro GET
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);  

// Montar a resposta da solicitação GET
$response = "O valor de 'id' é: " . $id;

// Enviar a resposta para 'conversa.js'
echo $response;
?>
