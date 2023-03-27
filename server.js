const WebSocket = require('ws');

const server = new WebSocket.Server({ port: 8080 });

server.on('connection', (socket) => {
  console.log('Cliente conectado.');

  socket.on('message', (message) => {
    const mensagemJSON = JSON.parse(message);
    console.log('Mensagem recebida de', mensagemJSON.remetente, ':', mensagemJSON.mensagem);
    server.clients.forEach((client) => {
      if (client !== socket && client.readyState === WebSocket.OPEN) {
        client.send(message);
        
      }
    });
  });

  socket.on('close', () => {
    console.log('Cliente desconectado.');
  });
});
