<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> @yield('title')</title>
</head>
<body>
    <nav>
        <a href="{{  route('home')  }}">inicio</a>
        <a href="{{  route('nosotros')  }}">nostros</a>

    </nav>
    <h1>@yield("encabezado")</h1>
    <p>@yield("contenido")</p>

    
    
</body>
</html>