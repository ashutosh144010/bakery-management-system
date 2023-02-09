<?php
include "../connection.php";
$error = null;

if (isset($_POST['signupBtn'])) {

  // storing values of form 
  echo $username =  $_POST['username'];
  echo $email =  $_POST['email'];
  echo $password =  $_POST['password'];
  echo $fname =  $_POST['fname'];
  echo $lname =  $_POST['lname'];
  echo $mobileno =  $_POST['mobileno'];
  echo $address =  $_POST['address'];
  echo $pincode =  $_POST['pincode'];


  // --------------------------------------------------------------- Validating Username -----------------------------------------------------------

  // checking username is empty
  if (!empty($fname)) {

    if (!empty($lname)) {

      if (!empty($username)) {

        // checking username format 
        if (!preg_match_all('/^[A-Za-z]{1}[A-Za-z0-9]{5,31}$/', $username)) {

          // if username format is invalid then show error
          $error = "* username Must Be 5 charaters long and include only letters with number";
        } else {

          // checking username already availabel in database or not
          $username = mysqli_real_escape_string($conn, $username);
          $query = "SELECT * FROM accounts WHERE username = '" . $username . "'";
          $result =  mysqli_query($conn, $query);

          // checking if result fount means greater than 1 then show error
          if (mysqli_num_rows($result) > 0) {
            $error = "* username Already Exist";
            // --------------------------------------------------------------- Username Validation End -----------------------------------------------------------
          } else {


            // --------------------------------------------------------------- Validating email -------------------------------------------------------------------

            if (!empty($email)) {

              // checking email format 
              if (!preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $email)) {

                // if email format is invalid then show error
                $error = "* Invalid email format";
              } else {

                // checking email already availabel in database or not
                $email = mysqli_real_escape_string($conn, $email);
                $query = "SELECT * FROM accounts WHERE email = '" . $email . "'";
                $result =  mysqli_query($conn, $query) or die(mysqli_error($conn));

                // checking if result found means greater than 1 then show error
                if (mysqli_num_rows($result) > 0) {
                  $error = "* email Already Exist";
                  // --------------------------------------------------------------- Validating Password -----------------------------------------------------------
                } else {


                  if (!empty($mobileno)) {

                    if (strlen($mobileno) == 10) {
                      // --------------------------------------------------------------- Password Validation Start----------------------------------------------------------

                      // checking password is empty or not
                      if (!empty($password)) {

                        // checking password match the conditions or not
                        if (!preg_match_all('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/m', $password)) {

                          // if password not match condition display error
                          $error  = "* Password must contain Minimum eight characters, at least one uppercase letter, one lowercase letter, one number and one special character";
                        } else {

                          if (!empty($address)) {

                            if (!empty($pincode)) {

                              if (strlen($pincode) == 6) {
                                // if password match then convert password to md5 hash encyption
                                $password = md5($password);

                                // Now Checking is any error in error variable 
                                if ($error == null) {

                                  // Generating Verification Key
                                  $vkey = md5(time() . $username);

                                  // ---------------------------------  ----------------------------- Data Insertion ------ -----------------------------------------------------------

                                  // Inserting Valid Data into database
                                  $query = "INSERT INTO accounts(username,  password,  email, vkey) VALUES ('$username', '$password', '$email','$vkey')";
                                  $result =  mysqli_query($conn, $query) or die(mysqli_error($conn));

                                  if ($result) {

                                    $query = "INSERT INTO customer(fname, lname, username, mobileno, email ,address, picode) VALUES ('$fname', '$lname', '$username','$mobileno', '$email', '$address', '$pincode')";

                                    $result =  mysqli_query($conn, $query) or die(mysqli_error($conn));

                                    header('Location: signupsuccess.html');
                                  }
                                }
                              } else {
                                $error = "enter valid picode";
                              }
                            } else {
                              $error = "pincode  cannot be empty";
                            }
                          } else {
                            $error = "Address cannot be empty";
                          }
                        }
                      } else {

                        // if password empty then display error
                        $error = "* Password Cannot be empty";
                      }
                    } else {
                      $error = "enter valid mobile no";
                    }
                  } else {
                    $error = "mobile no cannot be empty";
                  }
                }
              }
            } else {

              // if email is empty then show error
              $error = "* email cannot be empty";
            }
          }
        }
      } else {

        // if username is empty then show error
        $error = "* username cannot be empty";
      }
    } else {
      $error = "Last Name Cannot be empty";
    }
  } else {
    $error = "First Name Cannot be empty";
  }
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
  <style>
    html,
    body,
    header,
    .view {
      height: 100%;
    }

    @media (min-width: 851px) and (max-width: 1440px) {

      html,
      body,
      header,
      .view {
        height: 850px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .view {
        height: 1000px;
      }
    }

    @media (min-width: 451px) and (max-width: 740px) {

      html,
      body,
      header,
      .view {
        height: 1200px;
      }
    }

    @media (max-width: 450px) {

      html,
      body,
      header,
      .view {
        height: 1400px;
      }
    }
  </style>

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

            <!-- Grid column -->
            <div class="col-md-12">

              <div class="card">
                <div class="card-body">

                  <h2 class="text-center mb-5 mt-4 font-weight-bold">
                    <strong>REGISTER</strong>
                  </h2>
                  <hr>

                  <!-- Grid row -->
                  <div class="row mt-2">
                    <!-- Grid column -->
                    <div class="col-12">
                      <form action="" method="post">
                        <p class="red-text"><?php echo $error ?> </p>
                        <!--Grid row-->
                        <div class="row">

                          <!--Grid column-->
                          <div class="col-md-4">
                            <div class="md-form mb-0">
                              <input type="text" id="fname" name="fname" class="form-control">
                              <label for="fname" class="">Your first name</label>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="md-form mb-0">
                              <input type="text" id="lname" name="lname" class="form-control">
                              <label for="lname" class="">Your last name</label>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="md-form mb-0">
                              <input type="text" id="username" name="username" class="form-control">
                              <label for="username">Enter username</label>
                            </div>
                          </div>

                        </div>
                        <!--Grid row-->

                        <div class="row">

                          <div class="col-md-4">
                            <div class="md-form mb-0">
                              <input type="email" id="email" name="email" class="form-control">
                              <label for="email">Enter email</label>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="md-form mb-0">
                              <input type="number" id="mobileno" name="mobileno" class="form-control">
                              <label for="mobileno">Enter mobile number</label>
                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="md-form mb-0">
                              <input type="password" id="password" name="password" class="form-control">
                              <label for="password">Enter password</label>
                            </div>
                          </div>

                        </div>

                        <div class="row">
                          <div class="col-md-6">
                            <div class="md-form">
                              <textarea type="text" id="address" name="address" class="form-control md-textarea"></textarea>
                              <label for="address">Your address</label>
                            </div>
                          </div>

                          <div class="col-md-2">
                            <div class="md-form">
                              <input type="number" id="pincode" name="pincode" class="form-control md-textarea"></input>
                              <label for="pincode">Your area pincode</label>
                            </div>
                          </div>
                        </div>




                        <div class="text-center">
                          <button class="btn pink-gradient btn-rounded mt-3" name="signupBtn">Sign up</button>
                        </div>
                      </form>

                    </div>
                    <!-- Grid column -->

                  </div>
                  <!-- Grid row -->

                </div>
              </div>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row -->

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