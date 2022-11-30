<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <script src="/socket.io/socket.io.js"></script>
    <script>
        var socket = io('http://localhost:3000', { transports: ['websocket', 'polling', 'flashsocket'] });
        
        var request = new XMLHttpRequest ();
        request.open ('GET', document.location, false);
        request.send(null);

        socket.passport = {
            'headers': request.getAllResponseHeaders().toLowerCase(),
            'cookies': document.cookie,
        }
        
        socket.call = function($event, $request) {
            var request = socket.passport;
            if(typeof $request != 'undefined') { request.body = $request; }
            request.event = $event;
            //console.log($request);
            socket.emit('call', request);
        }
        
        socket.on('connect', () => { socket.call('connect'); });
        //socket.on('chat.message', (req) => { console.log(req); });
    </script>
</head>
<body>
    
</body>
</html>