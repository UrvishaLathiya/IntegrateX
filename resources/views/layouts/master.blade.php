<!DOCTYPE html>
<html lang="en" class="no-js">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <title>Student Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Sunshine - Responsive vCard Template" />
    <meta name="keywords" content="vcard, resposnive, retina, resume, jquery, css3, bootstrap, Sunshine, portfolio" />
    <meta name="author" content="lmtheme" />
    <link rel="shortcut icon" href="favicon.ico">

    <link rel="shortcut icon" href="{{ asset('images/final.webp')}}" />
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/transition-animations.css">
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="css/main.css" type="text/css">

    <link rel="stylesheet" href="{{ asset('css/animate.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" href="{{ asset('css/normalize.css')}}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ asset('css/pe-icon-7-stroke.css')}}">
    <link rel="stylesheet" href="{{ asset('css/transition-animations.css')}}">

    <script src="js/jquery-2.1.3.min.js"></script>
    <script src="js/modernizr.custom.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>
    @stack('styles')
  </head>

  <body>
    <!-- Loading animation -->
    <div class="preloader">
      <div class="preloader-animation">
        <div class="dot1"></div>
        <div class="dot2"></div>
      </div>
    </div>
    <!-- /Loading animation -->

    <div id="page" class="page">
      <!-- Header -->
      <header id="site_header" class="header mobile-menu-hide">
        <div class="my-photo">
          <img src="images/my_photo.png" alt="image">
          <div class="mask"></div>
        </div>

        <div class="site-title-block">
          <h1 class="site-title">
              @if(Session::has('student'))
                  <?php $student = Session::get('student'); ?>
                  <p>{{ $student->firstname }}</p>
          </h1>
          <p class="site-description">{{ $student->role }}</p>
          @endif
        </div>

        <!-- Navigation & Social buttons -->
        <div class="site-nav">
          <ul id="nav" class="site-main-menu">
            <li><a href="/home" data-animation="58" data-goto="1">Home</a></li>
            <li><a href="/about" >About me</a></li>
            <li><a href="/github" data-animation="61" data-goto="4">GitHub</a></li>
            <li><a href="/skill" data-animation="58" data-goto="5">Skill</a></li>
            <li><a href="/contact" data-animation="59" data-goto="6">Contact</a></li>
            <li><a href="/projects">Projects</a></li>
           <li><a href="/student-profile">My Profile</a></li>
           
           
            <!-- Logout Form (POST method) -->
            <li>
              <form action="{{ route('student.logout') }}" method="POST">
                @csrf
                <button type="submit">Logout (Student)</button>
            </form>
          
          </ul>
        </div>
        <!-- /Navigation & Social buttons -->
      </header>
      <!-- /Header -->

      <!-- Main Content -->
      <div id="main" class="site-main">
        <div class="pt-wrapper">
          <div class="subpages">
            @yield('content')
          </div>
        </div>
      </div>
    </div>

    <script src="js/bootstrap.min.js"></script>
    <script src="js/page-transition.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/validator.js"></script>
    <script src="js/jquery.shuffle.min.js"></script>
    <script src="js/masonry.pkgd.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/jquery.hoverdir.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>