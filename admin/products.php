<?php

session_start();
include "../connection.php";

$error  = null;

if (!isset($_SESSION['admin'])) {
    header('Location: ../user/login.php');
} else {

    if (isset($_POST['AddProductBtn'])) {
        $pname = $_POST['pname'];
        $price = $_POST['price'];
        $imglink = $_POST['imglink'];
        $ingredent = $_POST['ingredent'];
        $description = $_POST['description'];

        $query = "INSERT INTO products(pname,  price,  imglink, ingredent, description) VALUES ('$pname', '$price', '$imglink','$ingredent', '$description')";
        $result =  mysqli_query($conn, $query) or die(mysqli_error($conn));
    }

    if (isset($_POST['deletebtn'])) {
        $id = $_POST['did'];
        $query = "DELETE FROM products WHERE id='$id'";
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
    <title>Products</title>
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
                        <li class="list"><a href="dashboard.php" class="waves-effect grey-text"> <i class="fas fa-home"></i> Home</a>
                        </li>
                        <li class="list"><a href="#" class="waves-effect"> <i class="fas fa-shopping-bag"></i> Products</a>
                        </li>
                        <li class="list"><a href="../logout.php" class="waves-effect grey-text"> <i class="fas fa-sign-out-alt"></i> Logout</a>
                        </li>
                    </ul>
                </div>


                <div class="col-md-10">

                    <div class="fixed-action-btn" style="bottom: 45px; right: 24px;">
                        <a class="btn pink-gradient btn-lg btn-rounded " role="button" data-toggle="modal" data-target="#ModalAddProduct">
                            <i class="fas fa-plus"></i> Add New Product
                        </a>


                    </div>

                    <!-- Table with panel -->
                    <div class="card card-cascade narrower mt-5">

                        <!--Card image-->
                        <div class="view view-cascade gradient-card-header  pink-gradient narrower py-2 mx-4 mb-3 d-flex justify-content-center align-items-center">


                            <h4>Your Products</h4>


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
                                                <a>Name

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Price

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Image

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">View

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Edit

                                                </a>
                                            </th>
                                            <th class=" th-lg font-weight-bold">
                                                <a href="">Delete

                                                </a>
                                            </th>
                                        </tr>
                                    </thead>
                                    <!--Table head-->

                                    <!--Table body-->
                                    <tbody>
                                        <?php
                                        $query = "SELECT * FROM products";
                                        $result = mysqli_query($conn, $query) or die("query fail");

                                        if (mysqli_num_rows($result) > 0) {
                                            $increment = 1;
                                            while ($row = mysqli_fetch_assoc($result)) {

                                        ?>

                                                <tr>
                                                    <td><?php echo $increment ?></td>
                                                    <td><?php echo $row['pname'] ?></td>
                                                    <td><?php echo $row['price'] ?> ₹</td>
                                                    <td>
                                                        <img src="<?php echo $row['imglink'] ?>" alt="cake" style="height:60px; width: 60px;">
                                                    </td>
                                                    <td>
                                                        <form action="../user/details.php" method="post">
                                                            <input type="text" name="id" value="<?php echo $row['id'] ?>" hidden>
                                                            <button type="submit" name="vbtn" class="btn btn-success btn-rounded btn-sm">view</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="editproduct.php" method="post">
                                                            <input type="text" name="eid" value="<?php echo $row['id'] ?>" hidden>
                                                            <button type="submit" name="editbtn" class="btn btn-success btn-rounded btn-sm">edit</button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="text" name="did" value="<?php echo $row['id'] ?>" hidden>
                                                            <button type="submit" name="deletebtn" class="btn btn-danger btn-rounded btn-sm">delete</button>
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

    <!-- Add Product Modal -->

    <div class="modal fade" id="ModalAddProduct" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-lg" role="document">
            <!-- Content -->
            <div class="modal-content">

                <!-- Header -->
                <div class="modal-header  pink-gradient darken-3 white-text">
                    <h4 class=""><i class="fas fa-plus"></i> Add New Product</h4>
                    <button type="button" class="close waves-effect waves-light" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <!-- Body -->
                <div class="row mt-0">
                    <!-- Grid column -->
                    <div class="col-12 pl-5 pr-5">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <p class="red-text"><?php echo $error ?> </p>
                            <!--Grid row-->
                            <div class="row">

                                <!--Grid column-->
                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="pname" name="pname" class="form-control" required>
                                        <label for="pname" class="">Enter Product Name</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="number" id="price" name="price" class="form-control" required>
                                        <label for="price" class="">Enter Product Price</label>
                                    </div>
                                </div>

                            </div>
                            <!--Grid row-->

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="url" id="imglink" name="imglink" class="form-control" required>
                                        <label for="imglink">Enter image link</label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="md-form mb-0">
                                        <input type="text" id="ingredent" name="ingredent" class="form-control" required>
                                        <label for="ingredent">Enter ingredent use</label>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="md-form">
                                        <textarea type="text" id="description" name="description" class="form-control md-textarea" required></textarea>
                                        <label for="description">Enter product description</label>
                                    </div>
                                </div>


                            </div>

                            <div class="text-center">
                                <button class="btn pink-gradient btn-rounded mt-3" name="AddProductBtn">Add Product</button>
                            </div>

                        </form>
                    </div>

                </div>
            </div>
            <!-- Content -->
        </div>
    </div>
    <!-- Add Product Modal -->


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
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>