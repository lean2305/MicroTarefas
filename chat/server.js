const WebSocket = require('ws');

const server = new WebSocket.Server({ port: 8080 });

// Evento acionado quando um cliente se conecta ao servidor WebSocket
server.on('connection', (socket) => {
  console.log('Cliente conectado.');

  // Evento acionado quando o servidor recebe uma mensagem de um cliente
  socket.on('message', (message) => {
    const mensagemJSON = JSON.parse(message);
    console.log('Mensagem recebida de', mensagemJSON.remetente, ':', mensagemJSON.mensagem);

    // Envia a mensagem recebida para todos os clientes conectados, exceto o remetente original da mensagem
    server.clients.forEach((client) => {
      if (client !== socket && client.readyState === WebSocket.OPEN) {
        client.send(message);
      }
    });
  });

  // Evento acionado quando um cliente se desconecta do servidor WebSocket
  socket.on('close', () => {
    console.log('Cliente desconectado.');
  });
});
