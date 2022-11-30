const express = require('express');
const app = express();
const http = require('http');
const server = http.createServer(app);
const { Server } = require("socket.io");
const io = new Server(server);
const redis = require('redis');

const redisClient = redis.createClient();
const redisSub = redisClient.duplicate();
const redisPub = redisClient.duplicate();

redisSub.connect()
redisPub.connect()
  
/*
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});
*/

redisSub.subscribe('csub', (message) => {
  console.log(message); // 'message'

  //io.to(socketid).emit('message', 'for your eyes only');
});

io.on('connection', (socket) => {
  
  redisPub.publish('ssub', JSON.stringify({
    'event': 'connection',
    'client': socket.id,
  }));

  socket.on('conn', (req) => {
    req.client = socket.id,
    redisPub.publish('ssub', JSON.stringify(req));
  });

  socket.on("disconnect", (req) => { 
    redisPub.publish('ssub', JSON.stringify({
      'event': 'disconnect',
      'client': socket.id,
    }));  
  });

});

server.listen(3000, () => {
  console.log('WebSocket server runned on *:3000');
});