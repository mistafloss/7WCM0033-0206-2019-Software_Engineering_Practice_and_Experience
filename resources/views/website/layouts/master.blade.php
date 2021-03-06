<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Havilah Housing </title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


        <!-- ===============================================-->
        <!--    Stylesheets-->
        <!-- ===============================================-->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link href="{{ asset('css/all.css')}}" rel="stylesheet">
        <link href="{{ asset('css/website.css')}}" rel="stylesheet">
        
        <script src="{{ asset('js/all.js') }}"></script>    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <style>
            .loading{
                display:none;
            }
            .footer {
  background-color: #f5f5f5;
}

.footer > .container {
  padding-right: 15px;
  padding-left: 15px;
}

        </style>
    </head>
       
        
    <body>
            @include('website.partials.header')
               @yield('content')
            @include('website.partials.footer')
    </body>    
    



    <!-- ===============================================-->
    <!--    Javascript-->
    <!-- ===============================================-->
  
  
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="{{ asset('js/website.js') }}"></script>    
    <script src="{{ asset('js/all.js') }}"></script>    
     
</body>
@yield('scripts')
</html>
