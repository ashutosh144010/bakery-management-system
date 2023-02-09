<?php

session_start();
include '../connection.php';


if (isset($_SESSION['user']) or isset($_SESSION['admin'])) {

    if (isset($_POST['buybtn'])) {

        $weight = $_POST['weight'];
        $quantity = $_POST['quantity'];

        $id = $_SESSION['id'];

        $query = "SELECT * FROM products WHERE id = '$id' ";
        $result = mysqli_query($conn, $query);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $pname = $row['pname'];
                $price = $row['price'];
                $imglink = $row['imglink'];
                $ingredent = $row['ingredent'];
                $description = $row['description'];
            }

            $_SESSION['id'] = $id;
        }

        if (isset($_POST['eggless'])) {
            $eggless = $_POST['eggless'];
        } else {
            $eggless = "no";
        }

        if ($weight == '0.5') {
            $weightPrice = $price;
            $subTotal = $weightPrice;
        } else {

            $weightPrice = $price * 2 * $weight;
            $subTotal = $weightPrice;
        }

        $total = $subTotal * $quantity;

        $_SESSION['pname'] = $pname;
        $_SESSION['imglink'] = $imglink;
        $_SESSION['eggless'] = $eggless;
        $_SESSION['weight'] = $weight;
        $_SESSION['quantity'] = $quantity;

        $_SESSION['productprice'] = $weightPrice;
        $_SESSION['subtotal'] = $subTotal;
        $_SESSION['total'] = $total;
    }
} else {
    header('Location: login.php');
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Product Details</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../assets/vendore/mdbBootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../assets/vendore/mdbBootstrap/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/details.css">
    <style>
        .light-black {
            color: gray !important;
            font-weight: 500;
            margin-bottom: 2px;
        }
    </style>

</head>


<body class="">

    <!-- Main Navigation -->
    <header>

        <!-- Navbar -->


        <!-- Intro Section -->
        <section class="view" style="background: linear-gradient(to right, #fdeff9, #ec38bc, #7303c0, #03001e);">
            <div class="h-100 d-flex justify-content-center">
                <div class="container">
                    <div class="row wraper mt-4">

                        <div class="col-md-4 col-sm-12 img-cover">
                        </div>
                        <div class="col-md-8">
                            <div class="ml-4 mr-4">
                                <h3 class="text-center font-weight-bold mt-5 ml-4">Product Details</h3>
                                <hr>

                                <h5 class="pink-text" style="font-weight: 400;">Product Summary</h5>
                                <div class="d-flex justify-content-between">
                                    <div class="mt-2 ml-2 ">
                                        <p class="grey-text light-black">Product Name</p>
                                        <p class="grey-text light-black">Eggless</p>
                                        <p class="grey-text light-black">Weight</p>
                                        <p class="grey-text light-black">Quantity</p>


                                    </div>
                                    <div class="mt-2 ml-2">
                                        <p class="grey-text text-right light-black"><?php echo $pname ?></p>
                                        <p class="grey-text text-right light-black"><?php echo $eggless ?></p>
                                        <p class="grey-text text-right light-black"><?php echo $weight ?> KG</p>
                                        <p class="grey-text text-right light-black"><?php echo $quantity ?></p>
                                    </div>
                                </div>

                                <h5 class="pink-text mt-4" style="font-weight: 400;">Price Details</h5>
                                <div class="d-flex justify-content-between">
                                    <div class="mt-2 ml-2 ">
                                        <p class="grey-text light-black">Product Price ( <?php echo $weight ?> KG )</p>
                                        <p class="grey-text light-black">Shipping Charge</p>
                                        <p class="grey-text light-black">Sub Total</p>
                                        <p class="grey-text light-black">Total x <?php echo $quantity ?> item</p>


                                    </div>
                                    <div class="mt-2 ml-2">
                                        <p class="grey-text text-right light-black">₹ <?php echo $weightPrice ?></p>
                                        <p class="grey-text text-right light-black">₹ 0.0</p>
                                        <p class="grey-text text-right light-black">₹ <?php echo $subTotal ?></p>
                                        <p class="grey-text text-right light-black">₹ <?php echo $total ?></p>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <form action="payment.php" method="post">
                                        <button class="btn btn-rounded btn-lg pink-gradient" name="orderContinue" type="submit">Continue</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </header>
    <!-- Main Navigation -->


    <!-- SCRIPTS -->
    <!-- JQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!-- Bootstrap tooltips -->
    <script type="text/javascript" src="../assets/vendore/mdbBootstrap/js/popper.min.js"></script>
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="../assets/vendore/mdbBootstrap/js/bootstrap.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="../assets/vendore/mdbBootstrap/js/mdb.min.js"></script>

    <script>
        // Material Select Initialization
        $(document).ready(function() {
            $('.mdb-select').materialSelect();
        });
    </script>

</body>



</html>