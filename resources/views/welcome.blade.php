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
    </script>
</head>
<body>
    
</body>
</html>