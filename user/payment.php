<?php
include "../connection.php";
include "../mail/mail.php";
session_start();

if (isset($_SESSION['user']) or isset($_SESSION['admin'])) {

    if (isset($_SESSION['total'])) {

        if (isset($_POST['placeorder'])) {

            $username =  $_SESSION['user'];

            $query = "SELECT * FROM customer WHERE username = '$username' ";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $address = $row['address'];
                    $mobileNo =  $row['mobileno'];
                    $email =  $row['email'];
                }

                $pname =  $_SESSION['pname'];
                $imglink = $_SESSION['imglink'];
                $eggless = $_SESSION['eggless'];
                $weight = $_SESSION['weight'];
                $quantity = $_SESSION['quantity'];

                $productprice = $_SESSION['productprice'];
                $subTotal = $_SESSION['subtotal'];
                $total = $_SESSION['total'];

                orderMail($email, $pname, $weight, $productprice, $quantity, $total, $address, $mobileNo);

                $query = "INSERT INTO orders ( username, pname, egless, weight, quantity, imgurl, address, email, mobileno) VALUES ('$username', '$pname', '$eggless', '$weight', '$quantity', '$imglink', '$address', '$email', '$mobileNo')";
                mysqli_query($conn, $query);

                unset($_SESSION["id"]);
                unset($_SESSION["pname"]);
                unset($_SESSION["imglink"]);
                unset($_SESSION["eggless"]);
                unset($_SESSION["weight"]);
                unset($_SESSION["quantity"]);
                unset($_SESSION["productprice"]);
                unset($_SESSION["subtotal"]);
                unset($_SESSION["total"]);

                header('Location: ordersuccess.html');
            } else {
                echo mysqli_error($conn);
            }
        }
    }
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
                        <div class="col-md-12">
                            <div class="ml-4 mr-4">
                                <h3 class="text-center font-weight-bold mt-5 ml-4">Make Payment</h3>
                                <hr>

                                <div class="d-flex justify-content-center">
                                    <div class="mt-5 ml-2 ">

                                        <h1 class="font-weight-bold text-center"> ₹ <?php echo $_SESSION['total'] ?></h1>

                                        <div class="md-form md-outline form-lg mt-5">
                                            <input id="form-lg" class="form-control form-control-lg" type="number">
                                            <label for="form-lg">Enter account number</label>
                                        </div>
                                    </div>

                                </div>

                                <div class="text-center mt-2">
                                    <form action="payment.php" method="post">
                                        <button class="btn btn-rounded btn-lg pink-gradient" name="placeorder" type="submit">Place Order</button>
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