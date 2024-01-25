<html xmlns='http://www.w3.org/1999/xhtml' lang='es'>
  <head>
    <meta charset='utf-8' />
    <title>@yield('titulo') - Moviles</title>
    <link rel='stylesheet' href='{{ asset("css/styles.css") }}'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  </head>
  <body>
  

    @yield('contenido')

  </body>
</html>

<!-- NOTAS MIAS -->
<!-- Yield: Indica dónde se debe insertar el contenido específico de una vista en la plantilla base -->