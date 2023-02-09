<?php
include '../connection.php';
session_start();
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
    <link href="../assets/vendore/mdbBootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../assets/vendore/mdbBootstrap/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style type="text/css">
        html,
        body,
        header,
        .view {
            height: 50%;
        }


        @media (min-width: 600px) {

            .navbar.scrolling-navbar.top-nav-collapse {
                padding-top: 5 px;
                padding-bottom: 5 px;
                background: linear-gradient(40deg, #FF5858, #ee4392) !important;
            }

            .dip-pink {
                color: #880e4f !important;
            }

            .c-tittle {
                /* color: #880e4f !important; */
                font-family: 'Great Vibes', cursive !important;
                font-size: 2rem !important;
                font-weight: 600 !important;
            }

        }

        .navbar {
            background: linear-gradient(40deg, #FF5858, #ee4392) !important;
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
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!--Links-->
                <ul class="navbar-nav mr-auto smooth-scroll">
                    <li class="nav-item">
                        <a class="nav-link" href="../#home">Home <span class="sr-only"></span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-offset="80">Store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#features" data-offset="80">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#services" data-offset="20">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#aboutus" data-offset="80">About us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../#contactus" data-offset="80">Contact Us</a>
                    </li>
                </ul>



                <?php

                if (isset($_SESSION['admin'])) { ?>

                    <div>
                        <p class="white-text mt-3 mr-2"> <i class="fas fa-user"></i> <?php echo $_SESSION['admin'] ?></p>
                    </div>

                    <div>
                        <a type="button" role="button" href="../logout.php" class="btn btn-outline-light btn-sm btn-rounded waves-effect">Logout</a>
                    </div>

                <?php } else if (isset($_SESSION['user'])) { ?>

                    <div>
                        <p class="white-text mt-3 mr-2"><i class="fas fa-user"></i> <?php echo $_SESSION['user'] ?></p>
                    </div>

                    <div>
                        <a type="button" role="button" href="../logout.php" class="btn btn-outline-light btn-sm btn-rounded waves-effect">Logout</a>
                    </div>

                <?php } else { ?>

                    <a type="button" role="button" href="login.php" class="btn btn-outline-light btn-sm btn-rounded waves-effect">Login</a>
                <?php } ?>

            </div>


        </nav>
        <!--/Navbar-->
    </header>

    <section>
        <div class="container">

            <div class="row">

                <?php

                $query = "SELECT * FROM products";
                $result = mysqli_query($conn, $query) or die("query fail");

                if (mysqli_num_rows($result) > 0) {

                    while ($row = mysqli_fetch_assoc($result)) {

                ?>

                        <div class="col-md-4">
                            <div class="card mt-5">

                                <!-- Card image -->
                                <div class="view overlay">
                                    <img class="card-img-top" src="<?php echo $row['imglink'] ?>" alt="Card image cap" style="height: 300px; width:350px; ">
                                    <a>
                                        <div class="mask rgba-white-slight"></div>
                                    </a>
                                </div>

                                <!-- Card content -->
                                <div class="card-body">
                                    <!-- Title -->
                                    <h3 class="card-title text-center c-tittle pink-text"><?php echo $row['pname'] ?></h3>
                                    <h4 class="text-center font-weight-bold"><?php echo $row['price'] ?> ₹</h4>
                                    <hr>
                                    <!-- Text -->
                                    <p class="card-text text-center"><?php echo $row['description'] ?></p>
                                    <!-- Link -->
                                    <div class="text-center">
                                        <form action="details.php" method="post">
                                            <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
                                            <button type="submit" name="buynowbtn" class="btn pink-gradient btn-rounded">Buy Now</button>
                                        </form>
                                    </div>

                                </div>

                            </div>
                        </div>

                <?php
                    }
                }

                ?>
            </div>
        </div>

    </section>






    <!--Footer-->
    <footer class="page-footer text-center text-md-left stylish-color-dark pt-0">
        <!--Footer Links-->
        <div class="container mt-5 mb-4 text-center text-md-left">
            <div class="row mt-3">

                <!--First column-->
                <div class="col-md-3 col-lg-4 col-xl-3 mb-4 mt-5">
                    <h6 class="text-uppercase font-weight-bold"><strong> ashutosh pathak Bakery</strong></h6>
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
                    <h6 class="text-uppercase font-weight-bold"><strong>Contact ASHUTOSH </strong></h6>
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
    <script type="text/javascript" src="../assets/vendore/mdbBootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../assets/vendore/mdbBootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../assets/vendore/mdbBootstrap/js/mdb.min.js"></script>

    <!-- Custom scripts -->
    <script>
        // Animation init
        new WOW().init();
    </script>

</body>

</html>