<?php


include '../connection.php';
if (isset($_POST['editbtn'])) {

    $id = $_POST['eid'];

    $query = "SELECT * FROM products WHERE id='$id' ";
    $result = mysqli_query($conn, $query) or die("query fail");

    if (mysqli_num_rows($result) > 0) {
        $increment = 1;
        while ($row = mysqli_fetch_assoc($result)) {

            $pname = $row['pname'];
            $price = $row['price'];
            $imglink = $row['imglink'];
            $ingredent = $row['ingredent'];
            $description = $row['description'];
        }
    }
} else {
    // header('Location: products.php');
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Register</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <!-- Bootstrap core CSS -->
    <link href="../assets/vendore/mdbBootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Material Design Bootstrap -->
    <link href="../assets/vendore/mdbBootstrap/css/mdb.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">

</head>

<body class="register-page">

    <!-- Main Navigation -->
    <header>

        <!-- Intro Section -->
        <section class="view">
            <div>
                <div class="container">

                    <!-- Grid row -->
                    <div class="row mt-5  ">

                        <div class="container">

                            <div class="col-md-12">

                                <div class="card">
                                    <div class="card-body">

                                        <h2 class="text-center mb-5 mt-4 font-weight-bold">
                                            <strong>EDIT PRODUCT</strong>
                                        </h2>
                                        <hr>
                                        <div class="row mt-2">
                                            <div class="col-12 pl-5 pr-5">

                                                <form action="code.php" method="post">
                                                    <!--Grid row-->
                                                    <div class="row">

                                                        <!--Grid column-->
                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="pname" name="pname" value="<?php echo $pname ?>" class="form-control" required>
                                                                <label for="pname" class="">Enter Product Name</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="number" id="price" name="price" value="<?php echo $price ?>" class="form-control" required>
                                                                <label for="price" class="">Enter Product Price</label>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <!--Grid row-->

                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="url" id="imglink" name="imglink" value="<?php echo $imglink ?>" class="form-control" required>
                                                                <label for="imglink">Enter image link</label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="md-form mb-0">
                                                                <input type="text" id="ingredent" name="ingredent" value="<?php echo $ingredent ?>" class="form-control" required>
                                                                <label for="ingredent">Enter ingredent use</label>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="md-form">
                                                                <textarea type="text" id="description" name="description" class="form-control md-textarea" required><?php echo $description ?></textarea>
                                                                <label for="description">Enter product description</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="text-center">
                                                        <input type="text" name="id" value="<?php echo $_POST['eid'] ?>" hidden>
                                                        <button class="btn pink-gradient btn-rounded mt-3" name="UpdateBtn">Save Changes</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
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

</body>

</html>