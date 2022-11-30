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
//publisher;

const article = {
    id: '123456',
    name: 'Using Redis Pub/Sub with Node.js',
    blog: 'Logrocket Blog',
  };

app.get('/', (req, res) => {
  res.sendFile(__dirname + '/index.html');
});

redisSub.subscribe('general', (message) => {
    console.log(message); // 'message'
  });

io.on('connection', (socket) => {
    
    
    redisPub.publish('general', JSON.stringify(article));
    //publisher.disconnect();
    
});

server.listen(3000, () => {
  console.log('listening on *:3000');
});

/*
 

(async () => {

  

  
})();*/


//const redis = require('redis');

/*
(async () => {

  const client = redis.createClient();

  const subscriber = client.duplicate();

  await subscriber.connect();

  await subscriber.subscribe('general', (message) => {
    console.log(message); // 'message'
  });

})();*/