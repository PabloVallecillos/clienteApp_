<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Jekyll v3.8.5">
        <title>Laravel</title>
        <link href="{{ url('assets/css/bootstrap.min.css') }}" rel="stylesheet"> <!-- PROBLEMA --> <!-- soluxion  url te devuelve la url la ruta actual mas esa cadena --> 
        <link href="{{ url ('assets/css/jumbotron.css') }}" rel="stylesheet"><!-- PROBLEMA -->
        <link href="{{ url ('assets/css/own.css') }}" rel="stylesheet"><!-- PROBLEMA -->
    </head>
    <body>
        
        <main role="main">
           
            <div class="container">
                    <!-- CONTENIDO A RELLENAR -->
                    
                    @yield('contenido') <!-- crea un espacio que puedes rellenar en otros archivos  -->
                    <!-- en un archivo blade.php que este es de laravel  -->
            </div>
        </main>
       
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script>window.jQuery || document.write('<script src="{{ url('assets/js/jquery-3.3.1.slim.min.js') }}"><\/script>')</script>
        <!-- PROBLEMA -->
        <script src="{{ url ('assets/js/bootstrap.bundle.min.js') }}"></script> <!-- PROBLEMA -->
        <script type="text/javascript" src="{{ url('assets/js/main.js') }}"></script>
    </body>
</html>