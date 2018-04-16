
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>@yield('title')</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/blog/">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <!-- Custom styles for this template -->
    <link href="/css/app.css" rel="stylesheet">



 
  

  </head>


  <body>

  @if($message = session('message'))
  <div class="alert alert-success">
  {{ $message }}
  </div>
  @endif

  @if(auth()->check())
  <div> {{ auth()->user()->name}}</div>
        <a href="/logout">Logout</a>

  @else
  <a href="/login">Login</a>
  <a href="/register">Register</a>
  @endif

  

    @include('partials.header')



   




    <div class="container">

      <div class="row">
        <div class="col-sm-8 blog main">
        @yield('content')
        </div>

     
     

        <div class="col-sm-3  blog sidebar">
   @include('partials.sidebar')
   </div>

      </div><!-- /.row -->
     
    </div><!-- /.container -->
  

    @include('partials.footer')


  </body>
</html>
