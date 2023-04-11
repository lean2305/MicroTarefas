const WebSocket = require('ws');

const server = new WebSocket.Server({ port: 8080 });

server.on('connection', (socket) => {
  console.log('Cliente conectado.');

  socket.on('message', (message) => {
    console.log('Mensagem recebida:', message);
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

const socket = new WebSocket('ws://localhost:8080');

socket.onopen = () => {
  console.log('Conexão estabelecida.');
};

socket.onmessage = (event) => {
  console.log('Mensagem recebida:', event.data);
};

socket.onclose = () => {
  console.log('Conexão fechada.');
};

function sendMessage(message) {
    socket.send(message);
  }