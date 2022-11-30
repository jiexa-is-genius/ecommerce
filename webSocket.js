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

const article = {
    id: '123456',
    name: 'Using Redis Pub/Sub with Node.js',
    blog: 'Logrocket Blog',
};
  
/*
app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});
*/

redisSub.subscribe('csub', (message) => {
    console.log(message); // 'message'
  });

io.on('connection', (socket) => {
  redisPub.publish('ssub', JSON.stringify({
    'event': 'connection',
    'client': socket.id,
  }));

  io.on('conn', (req) => {
    console.log(req);
  });
});

server.listen(3000, () => {
  console.log('listening on *:3000');
});