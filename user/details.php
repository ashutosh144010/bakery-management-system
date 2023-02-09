<?php
session_start();
include '../connection.php';
if (isset($_POST['id'])) {

    $id = $_POST['id'];

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
                        <div class="col-md-8 " style="overflow: hidden; overflow-y: scroll; height:100%">

                            <h3 class="text-center font-weight-bold mt-5">Product Details</h3>
                            <hr>

                            <div class="d-flex justify-content-between">
                                <div class="mt-2 ml-2">
                                    <h6 class="pink-text font-weight-bold">Product Name</h6>
                                    <h5 class="" style="font-weight: 500;"><?php echo $pname ?></h5>

                                    <h6 class="pink-text font-weight-bold mt-5">Price per Kg</h6>
                                    <h4 class="black-text" style="font-weight: 500;">₹ <?php echo $price ?></h4>
                                    <p>default weight of product is 0.5 kg</p>

                                </div>
                                <div class="mt-2 ml-2">
                                    <img src="<?php echo $imglink ?>" alt="" style="width: 150px; height: 150px;">
                                </div>
                            </div>

                            <form action="orderdetails.php" method="post">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div>
                                            <!--Blue select-->

                                            <h6 class="pink-text font-weight-bold mt-4">Select weight</h6>
                                            <select name="weight" class="mdb-select md-form colorful-select dropdown-primary">
                                                <option name="weight" value="0.5">0.5kg</option>
                                                <option name="weight" value="1">1Kg</option>
                                                <option name="weight" value="2">2Kg</option>
                                                <option name="weight" value="3">3Kg</option>
                                                <option name="weight" value="4">4Kg</option>
                                            </select>
                                            <!-- <label class="mdb-main-label pink-text font-weight-bold mb-1" style="font-size: 16px;">Select Weight</label> -->
                                            <!--/Blue select-->
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="ml-4">
                                            <h6 class="pink-text font-weight-bold mt-4" style="margin-bottom: 1.9rem;">Select quantity</h6>
                                            <div class="def-number-input number-input safari_only">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></button>
                                                <input class="quantity" min="1" name="quantity" value="1" max="5" type="number">
                                                <button type="button" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-wrap"></div>
                                    <div class="col-md-12">
                                        <div>
                                            <h6 class="pink-text font-weight-bold mt-4">Make eggless</h6>
                                            <!-- Material checked -->
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="eggless" value="yes" name="eggless">
                                                <label class="form-check-label" for="eggless">Make Cake Eggless No EXTRA Charge Applay </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="text-center mt-5 mb-5">
                                            <button type="submit" name="buybtn" class="btn buybtn btn-lg mt-2">BUY NOW</button>
                                        </div>

                                    </div>
                                </div>
                            </form>

                            <div>
                                <h6 class="pink-text font-weight-bold mt-4">Ingredent Use</h6>
                                <p class="grey-text"><?php echo $ingredent ?></p>
                            </div>

                            <div>
                                <h6 class="pink-text font-weight-bold mt-4">Product Description</h6>
                                <p class="grey-text"><?php echo $description ?></p>
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