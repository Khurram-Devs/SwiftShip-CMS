<?php
include("db_connect.php");
?>
<aside class="left-sidebar">
        <!-- Sidebar scroll-->
        <div>
          <div
            class="brand-logo d-flex align-items-center justify-content-between"
          >
          <a href="./index.php" class="text-nowrap logo-img text-center d-block w-100 mt-3">
                  <h1 class="text-primary fw-semibold">Swift Ship</h1>
                </a>
            <div
              class="close-btn d-xl-none d-block sidebartoggler cursor-pointer"
              id="sidebarCollapse"
            >
              <i class="ti ti-x fs-8"></i>
            </div>
          </div>
          <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
              <br />
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./index.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
                </a>
              </li>
              <br />
              <?php if ($_SESSION['log_type'] != '2') {?>
              <li class="sidebar-item">
                <a
                class="sidebar-link"
                href="./branch_list.php"
                aria-expanded="false"
                >
                <span>
                  <i class="ti ti-building"></i>
                </span>
                <span class="hide-menu">Branches</span>
              </a>
            </li>
            <br />
          <?php }?>
          <?php if ($_SESSION['log_type'] != '2') {?>
              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./agent_list.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-user"></i>
                  </span>
                  <span class="hide-menu">Agents</span>
                </a>
              </li>
              <br />
              <?php }?>

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./parcel_list.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-gift"></i>
                  </span>
                  <span class="hide-menu">Parcels</span>
                </a>
              </li>
              <br />

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./track.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-location"></i>
                  </span>
                  <span class="hide-menu">Track</span>
                </a>
              </li>
              <br />

              <li class="sidebar-item">
                <a
                  class="sidebar-link"
                  href="./report.php"
                  aria-expanded="false"
                >
                  <span>
                    <i class="ti ti-file-description"></i>
                  </span>
                  <span class="hide-menu">Report</span>
                </a>
              </li>
              <br />
            </ul>

          </nav>
          <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
      </aside>