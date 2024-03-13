<?php include("db_connect.php");
session_start();
if (isset($_SESSION['log_email'])) {
  if ($_SESSION['log_type']==1||$_SESSION['log_type']==2) {
    header("Location:admin/php/index.php");
  }elseif ($_SESSION['log_type']==3) {
    header("Location:user/index.php");
  }
} else {

  if (isset($_SESSION['singup_alert'])) {
    echo '<script>window.onload = function() { setTimeout(() => {alert("' . $_SESSION['singup_alert'] . '");}, 750);  }</script>';
    unset($_SESSION['singup_alert']);
}


?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login</title>
  <link rel="shortcut icon" href="user/images/favicon.png" type="image/x-icon">
  <link rel="stylesheet" href="styles.min.css" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="./index.php" class="text-nowrap logo-img text-center d-block w-100">
                  <h1 class="text-primary fw-semibold">Swift Ship</h1>
                </a>
                <p class="text-center">Helping You Make Delivery Easy</p>
                <form action="login_fetch.php" method="POST">
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email Address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="log_email" aria-describedby="emailHelp" required autocomplete="off"/>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" name="log_pass" required autocomplete="off"/>
    </div>
    <small class="text-danger"><?php
    if (isset($_SESSION['login_error']) && !empty($_SESSION['login_error'])) {
        echo $_SESSION['login_error'];
        unset($_SESSION['login_error']); 
    }
    ?>&nbsp;</small>

    <button type="submit" class="btn btn-primary w-100 py-8 fs-4 mb-2 rounded-2 mt-1">Log In</button>
    <button type="submit" class="btn btn-outline-primary w-100 py-1 fs-4 mb-2 rounded-2 mt-1" onclick="alt_page()">Don't have an Account? Sign up</button>
</form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script>
     function alt_page() {
      location.assign("<?php echo "signup.php"?>")
    }
  </script>
</body>

</html>

<?php
}
?>