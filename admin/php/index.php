<?php include("db_connect.php");

session_start();
if (isset($_SESSION["log_email"])) {

  ?>
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
  </head>

  <body>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">

      <?php include("sidebar.php") ?>


      <div class="body-wrapper">

        <?php include("header.php") ?>

        <div class="container-fluid">


          <!--  Row 1 -->
          <div class="row">
            <?php if ($_SESSION['log_type'] != '2') {
              ?>
              <!-- Dashboard Card -->
              <!-- Branches -->
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                      <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold">
                          Total Branches
                        </h5>
                        <h4 class="fw-semibold mb-3">
                          <?php echo $conn->query("SELECT * FROM branches")->num_rows ?>
                        </h4>
                        <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-right text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">
                            +
                            <?php $a = $conn->query("SELECT * FROM branches")->num_rows;
                            echo round($a / 12) ?>%
                          </p>
                          <p class="fs-3 mb-0">last year</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-building fs-6"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="branches"></div>
                </div>
              </div>

              <!-- Dashboard Card -->
              <!-- Agents -->
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                      <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold">
                          Total Agents
                        </h5>
                        <h4 class="fw-semibold mb-3">
                          <?php echo $conn->query("SELECT * FROM users where type = 2")->num_rows; ?>
                        </h4>
                        <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-right text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">
                            +
                            <?php $a = $conn->query("SELECT * FROM users where type != 1")->num_rows;
                            echo round($a / 12) ?>%
                          </p>
                          <p class="fs-3 mb-0">last year</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-user fs-6"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="agents"></div>
                </div>
              </div>

              <!-- Dashboard Card -->
              <!-- Parcels -->
              <div class="col-lg-4">
                <div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                      <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold">
                          Total Parcels
                        </h5>
                        <h4 class="fw-semibold mb-3">
                          <?php echo $conn->query("SELECT * FROM parcels")->num_rows; ?>
                        </h4>
                        <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-right text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">
                            +
                            <?php $a = $conn->query("SELECT * FROM parcels")->num_rows;
                            echo round($a / 12) ?>%
                          </p>
                          <p class="fs-3 mb-0">last year</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-gift fs-6"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="parcels"></div>
                </div>
              </div>


            </div>


            <!--  Row 2 -->
            <div class="row">
              <?php
              $status_arr = array(
                "Item Accepted by Courier",
                "Collected",
                "Shipped",
                "In-Transit",
                "Arrived At Destination",
                "Out for Delivery",
                "Ready to Pickup",
                "Delivered",
                "Picked-up",
                "Unsuccessful Delivery Attempt"
              );
              foreach ($status_arr as $state => $status):
                ?>
                <!-- Dashboard Card -->
                <div class="col-lg-4">
                  <div class="card">
                    <div class="card-body">
                      <div class="row align-items-start">
                        <div class="col-10">
                          <h5 class="card-title mb-3 fw-semibold">
                            <?php echo $status; ?>
                          </h5>
                          <h4 class="fw-semibold mb-0">
                            <?php echo $conn->query("SELECT * FROM parcels where status = '$state'")->num_rows; ?>
                          </h4>
                        </div>
                        <div class="col-2">
                          <div class="d-flex justify-content-end">
                            <div class="text-white rounded-circle p-6 d-flex align-items-center justify-content-center 

<?php
            switch ($status) {
              case 'Collected':
                echo 'bg-secondary';
                break;
              case 'Shipped':
              case 'In-Transit':
              case 'Out for Delivery':
                echo 'bg-info';
                break;
              case 'Arrived At Destination':
                echo 'bg-warning';
                break;
              case 'Ready to Pickup':
                echo 'bg-secondary';
                break;
              case 'Delivered':
              case 'Picked-up':
                echo 'bg-success';
                break;
              case 'Unsuccessful Delivery Attempt':
                echo 'bg-danger';
                break;
              default:
                echo 'bg-primary';
                break;
            }
            ?> ?>">

                              <i class="ti ti-<?php
                              switch ($status) {
                                case 'Item Accepted by Courier':
                                case 'Shipped':
                                case 'In-Transit':
                                case 'Out for Delivery':
                                  echo 'truck';
                                  break;
                                case 'Arrived At Destination':
                                  echo 'pin';
                                  break;
                                case 'Ready to Pickup':
                                case 'Collected':
                                  echo 'box';
                                  break;
                                case 'Picked-up':
                                case 'Delivered':
                                  echo 'check';
                                  break;
                                default:
                                  echo 'gift';
                                  break;
                              }
                              ?> fs-6"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>






          </div>
        </div>
      </div>
    <?php } else { ?>
      <h5>
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              Welcome
              <?php
              $id = $_SESSION['log_id'];
              $qry = $conn->query("SELECT CONCAT(firstname,' ',lastname) AS fullname FROM users WHERE id = $id")->fetch_assoc();
              echo $qry['fullname']
                ?>!
            </div>
          </div>
        </div>
      </h5>
    <?php } ?>


    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>

    <script>
      // JavaScript to handle clicking "Manage Account" and displaying the modal
      document.querySelector('.manage-account').addEventListener('click', function () {
        // Show the modal
        document.getElementById('manageAccountModal').style.display = 'block';

        // Fetch user information via AJAX
        fetch('fetch_user_info.php')
          .then(response => response.json())
          .then(data => {
            // Populate the modal with fetched user data
            document.getElementById('firstName').value = data.firstName;
            document.getElementById('lastName').value = data.lastName;
            // ...populate other fields
          })
          .catch(error => console.error('Error:', error));
      });
    </script>


  </body>

  </html>
<?php } else {
  header("Location: ../../index.php");
} ?>