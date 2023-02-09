<?php

session_start();
include "../connection.php";

$error  = null;

if (!isset($_SESSION['admin'])) {
    header('Location: ../user/login.php');
} else {

    if (isset($_POST['completebtn'])) {
        $id = $_POST['cid'];
        $query = "DELETE FROM orders WHERE id='$id'";
        mysqli_query($conn, $query) or die(mysqli_error($conn));
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../assets/vendore/mdbBootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../assets/vendore/mdbBootstrap/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

    <style>
        .card {
            background-color: rgb(236 235 249) !important;
        }

        .bg {
            background-color: #bdbdbd;
        }

        .list {
            list-style: none;
        }


        tbody {
            display: block;
            max-height: 490px;
            overflow-y: scroll;
        }

        thead,
        tbody tr {
            display: table;
            width: 100%;
            table-layout: fixed;
        }

        thead {
            width: 100%;
        }

        table {
            width: 200px;
        }
    </style>
</head>

<body class="bg">
    <section id="dashboard">
        <div class="container-fluid">
            <div class="row" style="height:100vh">
                <div class="col-md-2" style="background-color: white;">

                    <h5 class="text-center mt-5" style="font-weight: 400;">Admin Menue</h5>


                    <ul>
                        <li class="list"><a href="#" class="waves-effect "> <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="list"><a href="products.php" class="waves-effect grey-text"> <i class="fas fa-shopping-bag"></i> Products</a>
                        </li>
                        <li class="list"><a href="../logout.php" class="waves-effect grey-text"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>





                </div>



                <div class="col-md-10">

                    <!-- Table with panel -->
                    <div class="card card-cascade narrower mt-5">

                        <!--Card image-->
                        <div class="view view-cascade gradient-card-header  pink-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-center align-items-center">


                            <h4>New Orders</h4>


                        </div>
                        <!--/Card image-->

                        <div class="px-4">

                            <div class="table-wrapper">
                                <!--Table-->
                                <table class="table table-hover mb-0 th-sm">

                                    <!--Table head-->
                                    <thead>
                                        <tr>
                                            <th class=" th-lg font-weight-bold">
                                                <a>Sr No

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a>Username

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Product Name

                                                </a>
                                            </th>

                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Weight

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Quantity

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Eggless

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Address

                                                </a>
                                            </th>

                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Mobile No

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Completed

                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <!--Table head-->

                                    <!--Table body-->
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM orders";
                                        $result = mysqli_query($conn, $query) or die("query fail");

                                        if (mysqli_num_rows($result) > 0) {
                                            $increment = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {

                                        ?>

                                                <tr>
                                                    <td><?php echo $increment ?></td>
                                                    <td><?php echo $row['username'] ?></td>
                                                    <td><?php echo $row['pname'] ?></td>

                                                    <td><?php echo $row['weight'] ?></td>
                                                    <td><?php echo $row['quantity'] ?></td>
                                                    <td><?php echo $row['egless'] ?></td>
                                                    <td><?php echo $row['address'] ?></td>

                                                    <td><?php echo $row['mobileno'] ?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="text" name="cid" value="<?php echo $row['id'] ?>" hidden>
                                                            <button type="submit" name="completebtn" class="btn btn-success btn-rounded btn-sm">Complete</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                        <?php
                                                $increment++;
                                            }
                                        }
                                        ?>
                                    </tbody>
                                    <!--Table body-->
                                </table>
                                <!--Table-->
                            </div>

                        </div>

                    </div>
                    <!-- Table with panel -->

                </div>

            </div>
        </div>
    </section>


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
        new WOW().init();
    </script>

</body>

</html>