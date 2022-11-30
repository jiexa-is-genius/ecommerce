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

io.on('connection', (socket) => {
  
    redisSub.subscribe('csub', (message) => {
        var request = JSON.parse(message)
        var event = (typeof request.event != 'undefined') ? request.event : null;
        var to = (typeof request.to != 'undefined') ? request.to : null;
        var body = (typeof request.body != 'undefined') ? request.body : null;

        if (event != null && body != null) { 
            if (to != null) {
                to.forEach((clientId) => { socket.to(clientId).emit(event, body); })
            } else { 
                socket.emit(event, body);
            }
        }
    });

    socket.on('call', (req) => {
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