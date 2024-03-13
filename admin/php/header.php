<?php
  include("db_connect.php");
?>
<header class="app-header">
          <nav class="navbar navbar-expand-lg navbar-light">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item d-block d-xl-none">
                <a
                  class="nav-link sidebartoggler nav-icon-hover"
                  id="headerCollapse"
                  href="javascript:void(0)"
                >
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
              <li class="nav-item">
                <h6 class="badge bg-info rounded-1 py-2 px-2 fw-semibold m-0"><?php 
                $id = $_SESSION['log_id'];
                $qry = $conn->query("SELECT * FROM users WHERE id = $id")->fetch_assoc();
                switch ($qry['type']) {
                  case '1':
                    echo'ADMIN PANEL';
                    break;
                    case '2':
                      echo'AGENT PANEL';
                      break;
                }
                ?></h6>
              </li>
            </ul>
            <div
              class="navbar-collapse justify-content-end px-0"
              id="navbarNav"
            >
              <ul
                class="navbar-nav flex-row ms-auto align-items-center justify-content-end"
              >
                <li class="nav-item dropdown">
                  <a
                    class="nav-link nav-icon-hover"
                    href="javascript:void(0)"
                    id="drop2"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <img
                      src="../assets/images/profile/user-1.jpg"
                      alt=""
                      width="35"
                      height="35"
                      class="user-img rounded-circle"
                    />
                  </a>
                  <div
                    class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up"
                    aria-labelledby="drop2"
                  >
                    <div class="message-body">
                      <a
                        href="#"
                        data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                        class="d-flex align-items-center gap-2 dropdown-item manage-account"
                      >
                        <i class="ti ti-mail fs-6"></i>
                        <p class="mb-0 fs-3">Manage Account</p>
                      </a>
                      <a
                        href="logout.php"
                        class="btn btn-outline-primary mx-3 mt-2 d-block"
                        >Logout</a
                      >
                    </div>
                  </div>
                </li>
              </ul>
            </div>
          </nav>
        </header>


<!-- Modal -->
<?php 
$log_id = $_SESSION['log_id'];
$qry = $conn->query("SELECT * FROM users WHERE id = $log_id")->fetch_assoc()

?>


<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Manage Account</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="user_update.php" method="POST">
                <div class="col-lg-12 mb-4">
                    <label for="firstname">First Name</label>
                    <input type="text" class="form-control" id="firstname" name="firstname" value="<?php echo $qry['firstname']?>">
                </div>
                <div class="col-lg-12 mb-4">
                    <label for="lastname">Last Name</label>
                    <input type="text" class="form-control" id="lastname" name="lastname" value="<?php echo $qry['lastname']?>">
                </div>
                <div class="col-lg-12 mb-4">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?php echo $qry['email']?>">
                </div>
                <div class="col-lg-12 mb-4">
                    <label for="password">Password</label>
                    <input type="text" class="form-control" id="password" name="password" value="">
                    <div class="form-text">Leave this blank if you don't want to change the password.</div>
                </div>
 
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
              </div>
            </form>
    </div>
  </div>
</div>