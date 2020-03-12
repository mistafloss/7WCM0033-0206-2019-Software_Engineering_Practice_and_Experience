<!DOCTYPE html>
<html lang="en-US" dir="ltr">

  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>Estate agency Portal | 404 Error </title>


    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <meta name="theme-color" content="#ffffff">


    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700%7cPoppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <link href="{{ asset('css/theme.css')}}" rel="stylesheet">

  </head>


  <body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">


      <div class="container">
        <div class="row flex-center text-center min-vh-100">
          <div class="col-sm-11 col-md-9 col-lg-7 col-xl-6 col-xxl-5"><a class="d-block text-center mb-4" href=""><span class="text-sans-serif font-weight-extra-bold fs-5 d-inline-block">Estate agency portal - Backoffice</span></a>
            <div class="card">
              <div class="card-body p-5">
                <div class="display-1 text-200 fs-error">404</div>
                <p class="lead mt-4 text-800 text-sans-serif font-weight-semi-bold">The resource you are looking for does not exist.</p>
                <a href="{{route('backofficeDashboard')}}">Go back to Dashboard</a>
                <hr />
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{asset('js/jquery.min.js')}}"></script>
  </body>

</html>