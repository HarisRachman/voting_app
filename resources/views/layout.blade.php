<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i&display=swap" rel="stylesheet">

    <title>Voting System</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('resource/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    
    <!-- Additional CSS Files -->
    {{-- <link rel="stylesheet" href="{{ asset('resource/assets/css/fontawesome.css') }}"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('resource/assets/css/templatemo-stand-blog.css') }}">
    <link rel="stylesheet" href="{{ asset('resource/assets/css/owl.css') }}">

    <style>
      .card {
          margin: 10px;
          background-color: #fff;
          /* padding: 10px; */
          border-radius: 8px;
          box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
          display: flex;
      }
      .participant {
          display: flex;
          align-items: center;
          justify-content: space-between;
      }
      .participant img {
          width: 80px;
          height: auto;
          border-radius: 10%;
          margin-right: 15px;
      }
      .info {
          flex-grow: 1;
          text-align: left;
      }
      .votes {
        font-size: 1.5em;
      }

      @media screen and (max-width: 768px) {
        .navbar .navbar-brand h2 {
          font-size: 0.875em;
        }
      }
    </style>

<!--

TemplateMo 551 Stand Blog

https://templatemo.com/tm-551-stand-blog

-->
  </head>

  <body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>  
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
          <a class="navbar-brand" href="index.html"><h2>Real Visindotama<em>.</em></h2></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="https://realvisindotama.com/">Home
                  <span class="sr-only">(current)</span>
                </a>
              </li> 
              <li class="nav-item active">
                <a class="nav-link" href="about.html">Road To Star 2024</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->

    @yield('content')

    
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <ul class="social-icons">
              <li><a href="#">Facebook</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Behance</a></li>
              <li><a href="#">Linkedin</a></li>
              <li><a href="#">Dribbble</a></li>
            </ul>
          </div>
          <div class="col-lg-12">
            <div class="copyright-text">
              <p>Copyright 2020 Stand Blog Co.
                    
                 | Design: <a rel="nofollow" href="https://templatemo.com" target="_parent">TemplateMo</a></p>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <script src="{{ asset('resource/scripts.js') }}"></script>

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('resource/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('resource/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Additional Scripts -->
    <script src="{{ asset('resource/assets/js/custom.js') }}"></script>
    <script src="{{ asset('resource/assets/js/owl.js') }}"></script>
    <script src="{{ asset('resource/assets/js/slick.js') }}"></script>
    <script src="{{ asset('resource/assets/js/isotope.js') }}"></script>
    <script src="{{ asset('resource/assets/js/accordions.js') }}"></script>

    <script language = "text/Javascript"> 
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>
  </body>
</html>