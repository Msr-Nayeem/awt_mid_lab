<html lang="en">
  <head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Service</title>
   
  </head>
  <body class="p-3 m-0 border-0 bd-example">
    <nav class="navbar bg-light">
        <div class="container-fluid justify-content-start">
        <a class="btn btn-outline-success me-2" type="button" href="{{route('home')}}">Home</a>
        <a class="btn btn-outline-success me-2" type="button" href="{{route('service')}}">Service</a>
        <a class="btn btn-outline-success me-2" type="button" href="{{route('team')}}">Our Team</a>
        <a class="btn btn-outline-success me-2" type="button" href="{{route('contact')}}">Contact US</a>
        <a class="btn btn-outline-success me-2" type="button" href="{{route('about')}}">About Us</a>
        </div>
    </nav>
    <div class="container">
        <center><h2>This is service/product page</h2></center>
        </h1>
    </div>
    <div class="container">
    Services we provide -->
        <ol>
            @foreach($list as $lists)
            <li>{{$lists}}</li>
            @endforeach
        </ol>
    </div>
  </body>
</html>
