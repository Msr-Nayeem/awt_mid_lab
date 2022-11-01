<html lang="en">

  <head>
    <title>Login to system</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">


  </head>
  <body class="img js-fullheight" style="background-image: url(bg.jpg);">
    <div class="container">
      @yield('content')
    </div>
    @yield('scriptList')
  </body>
</html>