const WebSocket = require('ws');
const mysql = require('mysql');

const server = new WebSocket.Server({ port: 8080 });

const connection = mysql.createConnection({
  host: 'localhost',
  user: 'root',
  password: '',
  database: 'conect',
});

connection.connect((error) => {
  if (error) {
    console.error('Erro ao conectar ao banco de dados:', error);
  } else {
    console.log('Conexão com o banco de dados estabelecida.');
  }
});

function inserirMensagem(mensagemJSON) {
  
  const { remetente, mensagem } = mensagemJSON;
  const user1 = 'admin';// Exemplo, você precisa definir o valor correto
  const user2 = 'aaaaaa';// Exemplo, você precisa definir o valor correto
  const id_amigo = 90; // Exemplo, você precisa definir o valor correto

  const query = `
    INSERT INTO menssagem (texto, user1, user2, id_amigo)
    VALUES (?, ?, ?, ?)
  `;
  const values = [mensagem, user1, user2, id_amigo];

  connection.query(query, values, (error, result) => {
    if (error) {
      console.error('Erro ao inserir mensagem no banco de dados:', error);
    } else {
      console.log('Mensagem inserida no banco de dados com sucesso.');
    }
  });
}

server.on('connection', (socket) => {
  console.log('Cliente conectado.');

  socket.on('message', (message) => {
    const mensagemJSON = JSON.parse(message);
    console.log('Mensagem recebida de', mensagemJSON.remetente, ':', mensagemJSON.mensagem);

    inserirMensagem(mensagemJSON);

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
