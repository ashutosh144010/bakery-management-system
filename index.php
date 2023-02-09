<?php
include 'connection.php';  // including connection file 
session_start();    // starting the session
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Material Design Bootstrap</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts -->

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

  <!-- Bootstrap core CSS -->
  <link href="assets/vendore/mdbBootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="assets/vendore/mdbBootstrap/css/mdb.min.css" rel="stylesheet">
  <style type="text/css">
    html,
    body,
    header,
    .view {
      height: 100%;
    }


    @media (min-width: 600px) {

      .navbar.scrolling-navbar.top-nav-collapse {
        padding-top: 5 px;
        padding-bottom: 5 px;
        background-color: #880e4f !important;
      }

      .dip-pink {
        color: #880e4f !important;
      }

      .c-tittle {
        color: #880e4f !important;
        font-family: 'Great Vibes', cursive !important;
        font-size: 2rem !important;
        font-weight: 600 !important;
      }

    }
  </style>
</head>

<body class="medical-lp">

  <!--Navigation & Intro-->
  <header>

    <!--Navbar-->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top scrolling-navbar">
      
        <a class="navbar-brand" href="#" style="font-family: 'Great Vibes', cursive;"><strong>Sweet
            Bakery</strong></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!--Links-->
          <ul class="navbar-nav mr-auto smooth-scroll">
            <li class="nav-item">
              <a class="nav-link" href="#home">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="user/store.php" data-offset="80">Store</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#features" data-offset="80">Features</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#services" data-offset="20">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#aboutus" data-offset="80">About us</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contactus" data-offset="80">Contact Us</a>
            </li>
          </ul>

            <?php

            // if session is active as admin then logout button is provided after icon 
            // else if sessio is active as  user then logout button is provided after the user icon
            // else provide with the login option

                if (isset($_SESSION['admin'])) { ?>

                    <div>
                        <p class="white-text mt-3 mr-2"> <i class="fas fa-user"></i> <?php echo $_SESSION['admin'] ?></p>
                    </div>

                    <div>
                        <a type="button" role="button" href="logout.php" class="btn btn-outline-light btn-sm btn-rounded waves-effect">Logout</a>
                    </div>

                <?php } else if (isset($_SESSION['user'])) { ?>

                    <div>
                        <p class="white-text mt-3 mr-2"><i class="fas fa-user"></i> <?php echo $_SESSION['user'] ?></p>
                    </div>

                    <div>
                        <a type="button" role="button" href="logout.php" class="btn btn-outline-light btn-sm btn-rounded waves-effect">Logout</a>
                    </div>

                <?php } else { ?>

                    <a type="button" role="button" href="user/login.php" class="btn btn-outline-light btn-sm btn-rounded waves-effect">Login</a>
                <?php } ?>

        </div>
     
    </nav>
    <!--/Navbar-->

    <!--Intro Section-->
    <section id="home" class="view"
      style="background-image: url('assets/img/background.jpg'); background-repeat: no-repeat; background-size: cover; background-position: center center;">
      <div class="mask rgba-black-light">
        <div class="container h-100 d-flex justify-content-center align-items-center">
          <div class="row pt-5 mt-3">
            <div class="col-12 col-md-6 text-center text-md-left">
              <div class="white-text">
                <!--there is animation  in shope now button and delay is given as 0.3 s-->
                <h1 class="h1-responsive font-weight-bold mt-md-5 mt-0 wow fadeInLeft" data-wow-delay="0.3s"> <span
                    style="font-family: 'Great Vibes', cursive; font-size: 140px;">Sweet bakery</span></br>
                  vit chennai</h1>
                <hr class="hr-light wow fadeInLeft" data-wow-delay="0.3s">
                <p class="wow fadeInLeft mb-3" data-wow-delay="0.3s">
                  Sweet Shop offers the best
                  cakes and sweets for you.
                  We guarantee the quality of all the cakes we
                  provide as they are baked using the freshest ingredients.
                  iste.
                </p>
                <br>
                <a href="user/store.php" class="btn btn-unique btn-rounded font-weight-bold ml-lg-0 wow fadeInLeft"
                  data-wow-delay="0.3s">Shop
                  Now</a>
                <a href="user/login.php" class="btn btn-outline-white btn-rounded font-weight-bold wow fadeInLeft"
                  data-wow-delay="0.3s">Login
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </header>
  <!--/Navigation & Intro-->

  <!--Main content-->
  <main>

    <div class="container">

      <!--Section: Features v.1-->
      <section id="features" class="mt-4 mb-5 pb-5">

        <!--Section heading-->
        <h1 class="text-center mb-5 mt-5 pt-5 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">
          WHAT WE OFFER</h1>
        <!--Section sescription-->
        <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum quas, eos officia maiores ipsam ipsum
          dolores reiciendis
          ad voluptas, animi obcaecati adipisci sapiente mollitia? Autem delectus quod accusamus tempora, aperiam
          minima assumenda deleniti hic.</p>

        <!--First row-->
        <!-- Card deck -->
        <div class="card-deck">

          <!-- Card -->
          <div class="card">

            <!-- Card image -->
            <div class="view overlay">
              <img class="card-img-top" src="assets/img/product/cupcake.jpg" alt="Card image cap">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!-- Card content -->
            <div class="card-body">
              <!-- Title -->
              <h4 class="card-title text-center c-tittle">Party Cupcake</h4>
              <hr>
              <!-- Text -->
              <p class="card-text text-center">We provide a variety of cupcakes for any party made with high-quality
                natural
                ingredients and no preservatives.</p>
              <!-- Link -->
              <a href="#!" class="black-text d-flex justify-content-center">
                <h5>Read more <i class="fas fa-angle-double-right"></i></h5>
              </a>

            </div>

          </div>
          <!-- Card -->

          <!-- Card -->
          <div class="card">

            <!-- Card image -->
            <div class="view overlay">
              <img class="card-img-top" src="assets/img/product/cake1.jpg" alt="Card image cap">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!-- Card content -->
            <div class="card-body">
              <!-- Title -->
              <h4 class="card-title text-center c-tittle">Chocolate Cake</h4>
              <hr>
              <!-- Text -->
              <p class="card-text text-center">Nothing tastes better than a chocolate cake with a variety of flavors,
                which is always available at our bakery.</p>
              <!-- Link -->
              <a href="#!" class="black-text d-flex justify-content-center">
                <h5>Read more <i class="fas fa-angle-double-right"></i></h5>
              </a>

            </div>

          </div>
          <!-- Card -->

          <!-- Card -->
          <div class="card">

            <!-- Card image -->
            <div class="view overlay">
              <img class="card-img-top" src="assets/img/product/wedcake.jpg" alt="Card image cap">
              <a>
                <div class="mask rgba-white-slight"></div>
              </a>
            </div>

            <!-- Card content -->
            <div class="card-body">
              <!-- Title -->
              <h4 class="card-title text-center c-tittle">Wedding Cake</h4>
              <hr>
              <!-- Text -->
              <p class="card-text text-center">Want to make your wedding unforgettable? Then you need to order a unique
                wedding cake at Sweet Shop !</p>
              <!-- Link -->
              <a href="#!" class="black-text d-flex justify-content-center">
                <h5>Read more <i class="fas fa-angle-double-right"></i></h5>
              </a>

            </div>

          </div>
          <!-- Card -->

        </div>
        <!-- Card deck -->
        <!--/First row-->

      </section>
      <!--/Section: Features v.1-->
    </div>


    <div class="container">

      <!--Section: Services-->
      <section id="services" class="info-section mb-5 mt-5 pt-4">

        <!--First row-->
        <div class="row pt-5">

          <!--First column-->
          <div class="col-md-7 mb-2 smooth-scroll wow fadeIn" data-wow-delay="0.2s">

            <!--Heading-->
            <h2 class="mb-3 font-weight-bold">We Provide High Quality services</h2>
            <!--Description-->
            <h4 class="mb-5 dark-grey-text">Once Visit Our New Bakery.</h4>
            <!--Content in the list formate-->
            <ul style="list-style: none; font-size: 20px;">
              <li><i class="far fa-check-circle dip-pink" style="font-size: 20px;"></i> Quality Product</li>
              <li><i class="far fa-check-circle dip-pink" style="font-size: 20px;"></i> Fresh Cakes</li>
              <li><i class="far fa-check-circle dip-pink" style="font-size: 20px;"></i> Catering Services</li>
              <li><i class="far fa-check-circle dip-pink" style="font-size: 20px;"></i> Free Delivery</li>
              <li><i class="far fa-check-circle dip-pink" style="font-size: 20px;"></i> 24/7 Customer Support</li>

            </ul>
            <br>
            <!--Button-->
            <a href="#home" class="btn btn-rounded btn-unique mb-4">Contact Us Now</a>

          </div>
          <!--/First column-->

          <!--Second column-->
          <div class="col-lg-4 flex-center ml-lg-auto col-md-5 mb-5 wow fadeIn" data-wow-delay="0.3s">

            <!--Image-->
            <img src="assets/img/services.jfif" class="img-fluid z-depth-1">  <!--image in shop discirption page-->

          </div>
          <!--/Second column-->

        </div>
        <!--/First row-->

      </section>
      <!--Section: Services-->

    </div>

    <!-- About Us -->
    <div class="container">

      <!--Projects section v.3-->
      <section id="aboutus" class="mt-4 mb-2">

        <!--Section heading-->
        <h1 class="text-center mb-5 mt-5 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">About Us
        </h1>
        <!--Section description-->
        <p class="text-center grey-text w-responsive mx-auto mb-5 wow fadeIn" data-wow-delay="0.2s">Duis aute irure
          dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur
          sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
      </section>
      <!--/Projects section v.3-->

    </div>

    <hr>

    <!-- Contact Us -->
    <div class="container">

      <!-- Section: Contact v.3 -->
      <section id="contactus" class="contact-section my-5">

        <h1 class="text-center mb-5 mt-5 pt-4 font-weight-bold dark-grey-text wow fadeIn" data-wow-delay="0.2s">Contact
          Us
        </h1>

        <!-- Form with header -->
        <div class="card">

          <!-- Grid row -->
          <div class="row">

            <!-- Grid column -->
            <div class="col-lg-12">

              <div class="card-body contact text-center h-100 white-text light-blue darken-2">

                <h3 class="my-4 pb-2">Contact information</h3>

                <ul class="text-lg-center list-unstyled ml-4">
                  <li>
                    <p><i class="fas fa-map-marker-alt pr-2 white-text"></i>New Delhi, 94126, India</p>
                  </li>
                  <li>
                    <p><i class="fas fa-phone pr-2 white-text"></i>+ 91 234 567 89</p>
                  </li>
                  <li>
                    <p><i class="fas fa-envelope pr-2 white-text"></i>contact@example.com</p>
                  </li>
                </ul>
                <hr class="hr-light my-4">

              </div>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

        </div>
        <!-- Form with header -->

      </section>
      <!-- Section: Contact v.3 -->




    </div>

  </main>
  <!--/Main content-->

  <!--Footer-->
  <footer class="page-footer text-center text-md-left stylish-color-dark pt-0">
    <!--Footer Links-->
    <div class="container mt-5 mb-4 text-center text-md-left">
      <div class="row mt-3">

        <!--First column-->
        <div class="col-md-3 col-lg-4 col-xl-3 mb-4 mt-5">
          <h6 class="text-uppercase font-weight-bold"><strong>Sweet Bakery</strong></h6>
          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p>Here you can use rows and columns here to organize your footer content. Lorem ipsum dolor sit amet,
            consectetur
            adipisicing elit.</p>
        </div>
        <!--/.First column-->

        <!--Second column-->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4 mt-5">
          <h6 class="text-uppercase font-weight-bold"><strong>Products</strong></h6>
          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><a href="#!">Birthday Cakes</a></p>
          <p><a href="#!">Cupcake</a></p>
          <p><a href="#!">Catering</a></p>
          <p><a href="#!">Doughnuts</a></p>
        </div>
        <!--/.Second column-->

        <!--Third column-->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4 mt-5">
          <h6 class="text-uppercase font-weight-bold"><strong>Useful links</strong></h6>
          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><a href="#!">Your Account</a></p>
          <p><a href="#!">Become an Affiliate</a></p>
          <p><a href="#!">Shipping Rates</a></p>
          <p><a href="#!">Help</a></p>
        </div>
        <!--/.Third column-->

        <!--Fourth column-->
        <div class="col-md-4 col-lg-3 col-xl-3 mt-5">
          <h6 class="text-uppercase font-weight-bold"><strong>Contact</strong></h6>
          <hr class="blue mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><i class="fas fa-home mr-3"></i> New Delhi, NY 10012, India</p>
          <p><i class="fas fa-envelope mr-3"></i> info@example.com</p>
          <p><i class="fas fa-phone mr-3"></i> + 91 234 567 88</p>
          <p><i class="fas fa-print mr-3"></i> + 91 234 567 89</p>
        </div>
        <!--/.Fourth column-->

      </div>
    </div>
    <!--/.Footer Links-->

    <!-- Copyright-->
    <div class="footer-copyright py-3 text-center wow fadeIn" data-wow-delay="0.3s">
      <div class="container-fluid">
        © 2021 Copyright: <a href="https://mdbootstrap.com/education/bootstrap/" target="_blank"> SweetBakery.com </a>
      </div>
    </div>
    <!--/.Copyright -->

  </footer>
  <!--/.Footer-->

  <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="assets/vendore/mdbBootstrap/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="assets/vendore/mdbBootstrap/js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="assets/vendore/mdbBootstrap/js/mdb.min.js"></script>

  <!-- Custom scripts -->
  <script>

    // Animation init
    new WOW().init();

  </script>

</body>

</html>