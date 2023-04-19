<?php
// Consulta SQL para selecionar as mensagens em ordem crescente do id_msg
$sql = "SELECT * FROM menssagem WHERE id_amigo = '$id_amigo' ORDER BY id_msg ASC";

// Executa a consulta SQL
$result = $conn->query($sql);

// Cria um array para armazenar as mensagens
$mensagens = array();

if ($result->num_rows > 0) {
    // Itera sobre todas as mensagens retornadas pela consulta SQL
    while($row = $result->fetch_assoc()) {
        // Adiciona os dados da mensagem ao array
        $mensagens[] = array(
            'sender' => $row['user1'],
            'text' => $row['texto'],
            'user2' => $row['user2']
        );
    }
} else {
    // Caso não haja mensagens, define o array como vazio
    $mensagens = array();
}

// Itera sobre o array de mensagens e exibe cada uma dentro da estrutura HTML
foreach ($mensagens as $msg) {
    // Verifica se a mensagem foi enviada pelo usuário logado
    if ($msg['sender'] == $logado) {
        // Se sim, exibe a mensagem do lado direito
        echo "<div class='message-wrapper'>
                  <div class='imagens'>
                      <img class='message-pp' src='./foto/download.png' alt='profile-pic'>
                  </div>
                  <div class='message-box-wrapper'>
                      <div class='message-box'>
                          <span class='message-sender'>".$msg['sender']."</span>
                          <p class='message-text'>".$msg['text']."</p>
                      </div>
                      <span class='message-time'>9h ago</span>
                  </div>
              </div>";
    } else {
        // Se não, exibe a mensagem do lado esquerdo
        echo "<div class='message-wrapper reverse'>
                  <div class='imagens'>
                      <img class='message-pp' src='./foto/26.png' alt='profile-pic'>
                  </div>
                  <div class='message-box-wrapper'>
                      <div class='message-box'>
                          <span class='message-sender'>".$msg['user2']."</span>
                          <p class='message-text'>".$msg['text']."</p>
                      </div>
                      <span class='message-time'>9h ago</span>
                  </div>
              </div>";
    }
}
?>