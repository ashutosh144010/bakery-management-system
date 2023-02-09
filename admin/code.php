<?php
include '../connection.php';

if (isset($_POST['UpdateBtn'])) {
    $pname = $_POST['pname'];
    $price = $_POST['price'];
    $imglink = $_POST['imglink'];
    $ingredent = $_POST['ingredent'];
    $description = $_POST['description'];
    $id = $_POST['id'];
    $query = "UPDATE products SET pname = '$pname',  price='$price',  imglink='$imglink', ingredent='$ingredent', description='$description' WHERE id = '$id' ";
    $result =  mysqli_query($conn, $query);

    if ($result) {
        header('Location: products.php');
    } else {

        echo mysqli_error($conn);
    }
} else {
    header('Location: products.php');
}
