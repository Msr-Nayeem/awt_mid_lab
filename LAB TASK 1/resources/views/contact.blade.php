<html lang="en">
  <head>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Contact us</title>
   
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
        <center><h2>Contact Us</h2></center>
        <ol>
            @foreach($contact as $contacts)
                <li>{{$contacts->namee}} from {{$contacts->address}} <u><I>mail: {{$contacts->mail}}</i></u></li>
            @endforeach
        </ol>

    </div>
  </body>
</html>
