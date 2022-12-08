<!DOCTYPE html>
<html lang="{{ ui::language() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ isset($title) ? $title . ' - ' : null }}{{ Config::get('app.name') }}</title>

    <link rel="shortcut icon" href="/img/ico.png" type="image/png">

    <link rel="stylesheet" href="/assets/bootstrap/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Montserrat:wght@300;400;500;600;700&family=Montserrat+Alternates:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
    @php
        $styles = [
            '/css/app.css',
        ];
    @endphp
    @foreach($styles as $path)
        <link rel="stylesheet" href="{{ $path }}">
    @endforeach

    @stack('css')

    @if(isset($keywords))
    <meta name="keywords" content="{{ $keywords }}">
    @endif

    @if(isset($description))
    <meta name="description" content="{{ $description }}">
    @endif

    @if(isset($noindex) and $noindex == true)
    <meta name="robots" content="noindex">
    @endif
    
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
        
        
        socket.call('tests.socket', {'bodyParams' : ['param 1', 'param 2']});
    </script>

</head>
<body>
    @yield('html')

    <script src="/assets/bootstrap/js/popper.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>

    <script src="/assets/jquery.js"></script>

    @include('v1.layouts.blocks.notifications')

    @php
        $scripts = [
            '/js/app.js',
        ];
    @endphp
    @foreach($scripts as $path)
        <script src="{{ $path }}"></script>
    @endforeach
    
    @stack('js')
</body>
</html>