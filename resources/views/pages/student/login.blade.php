<html>
<head>
    <link rel="stylesheet" href="{{asset('css/newLogin.css')}}">
    <title>Login</title>
</head>
<body>
    <div class="container">
            <div class="header">
            <h3>Welcome</h3>
            </div>
            <form action="{{route('studentLogin')}}" class="form-group" method="post" autocomplete="off">
                {{csrf_field()}}   
            <div>
                <i class="fa fa-envelope" id="email" aria-hidden="true"></i>
                <input type="email" name="email" id="email" placeholder="Email" value="{{request()->cookie(key: 'email');}}">

            </div>
            <div>
                <i class="fa fa-lock" id="lock"></i>
                <input type="password" name="password" id="password" placeholder="Password"  value="{{request()->cookie(key: 'password');}}">  
            </div>
            <div>
                <input type="checkbox" class="form-check-input" name="remember" value="remember" @if (Cookie::get('email') !== null){ checked } @endif>
                <label class="form-check-label">Remember me</label> <br><br>
            </div>
            <button type="submit" class="log-in" name="log-in">Log In</button>
            </form>
    </div>
</body>
</html>