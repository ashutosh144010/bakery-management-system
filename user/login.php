<?php

include "../connection.php";  // stablishing a connection

// Starting Session
session_start();

// Checking Already user login or not 
if (isset($_SESSION['user'])) {
  header("Location: store.php");
}
// checking admin login or not
else if (isset($_SESSION['admin'])) {
  header("Location: ../admin/dashboard.php");
}
// if no one is login then execute login code
else {
  $error = null;

  if (isset($_POST['login'])) {

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password =  mysqli_real_escape_string($conn, $_POST['password']);


    if (empty(trim($_POST['password'])) && empty(trim($_POST['username']))) {

      // header("Location: ../user/login.php?error=Username and Password required");
      $error = "* Username and Password required";
      // exit();
    } elseif (empty(trim($_POST['username']))) {

      $username_err = "Username cannot be blank";
      // header("Location: ../user/login.php?error=Username required");
      $error = "* Username required";
      // exit();
    } elseif (empty(trim($_POST['password']))) {

      // header("Location: ../user/login.php?error=Password required");
      $error = "* Password required";
      // exit();
    } else {

      $password = md5($password);
      $query = "SELECT * FROM accounts WHERE username= '{$username}' AND Password= '{$password}'";
      $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

      if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          $vstatus = $row['vstatus'];
          $flag = $row['flag'];
          $email = $row['email'];
          $createdate = $row['createdate'];
        }


        // checking account is active or not 

        if ($vstatus == 1) {

          // checking is it admin account or user account
          if ($flag == 'admin') {
            // if user account

            session_start();
            $_SESSION['admin'] = $username;
            header("Location: ../admin/dashboard.php");
          } else {
            // if user account

            session_start();
            $_SESSION['user'] = $username;
            header("Location: store.php");
          }
        } else {
          $error = "Account not activated, please check your email";
        }
      } else {
        $error = " * Invalid username and password";
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
  <title>Login</title>
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
      height: 100vh;
    }

    @media (max-width: 740px) {

      html,
      body,
      header,
      .view {
        height: 700px;
      }
    }

    @media (min-width: 800px) and (max-width: 850px) {

      html,
      body,
      header,
      .view {
        height: 650px;
      }

      .modal-notify .modal-header {
        border-radius: 3px 3px 0 0;
      }

      .modal-notify .modal-content {
        border-radius: 3px;
      }


    }

    /* .pink-gradient {
      background: linear-gradient(54deg, rgba(245, 26, 143, 1) 0%, rgba(167, 1, 90, 1) 100%) !important;
      color: white;
    } */

    .deep-pink {
      color: rgb(167, 1, 90, 1) !important;
    }

    .pink-gradient:hover {
      color: white;
    }
  </style>
</head>

<body class="login-page">

  <!-- Main Navigation -->
  <header>

    <!-- Navbar -->


    <!-- Intro Section -->
    <section class="view" style="background-color: #a5a5a5;">
      <div class="h-100 d-flex justify-content-center align-items-center">
        <div class="container">
          <div class="row">
            <div class="col-xl-5 col-lg-6 col-md-10 col-sm-12 mx-auto mt-lg-5">

              <!-- Form with header -->
              <div class="card" data-wow-delay="0.3s">
                <div class="card-body">

                  <!-- Header -->
                  <div class="form-header pink-gradient">
                    <h3>
                      <i class="fas fa-user mt-2 mb-2"></i> Log in :)
                    </h3>
                  </div>

                  <!-- Body -->

                  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                    <p class="red-text"><?php echo $error; ?></p>

                    <div class="md-form mb-0">
                      <i class="fas fa-user prefix white-text"></i>
                      <input type="text" id="username" name="username" class="form-control">
                      <label for="username">Your Username</label>
                    </div>

                    <div class="md-form mb-0">
                      <i class="fas fa-lock prefix white-text"></i>
                      <input type="password" id="password" name="password" class="form-control">
                      <label for="password">Your password</label>
                    </div>


                    <div class="text-center mt-4">
                      <button class="btn pink-gradient btn-lg" name="login" type="submit">Login</button>
                      <p class="font-small white-text d-flex justify-content-center mt-3">Don't have an account? <a href="register.php" class="white-text font-weight-bold ml-1"> Sign up</a></p>

                    </div>
                  </form>


                </div>
              </div>
              <!-- Form with header -->

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
    new WOW().init();
  </script>

</body>

</html>