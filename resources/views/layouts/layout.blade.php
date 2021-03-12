<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @yield('headsection')
    <link rel="stylesheet" href="{{ url('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('css/style.css') }}">
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  </head>

<body>
 <div id="general">
      @include('layouts.partial.nav')
      
      @include('layouts.partial.leftimage')
        @include('layouts.partial.rightimage')

        @yield('content')
        
    
      
    
       
    
      @include('layouts.partial.footer')
    </div>
    
      @include('layouts.partial.footerscript')
      @yield('pagefooterscript')



</body>
</html>




