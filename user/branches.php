<!-- Includes Database to the site -->
<?php include 'db_connect.php';


session_start();

if (isset($_SESSION["log_email"])) {

?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <!-- Includes CSS and Hrefs to the site -->
  <?php include 'linkTop.php' ?>
  <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
  <title>Swift Ship | Our Branches</title>
</head>

<body>

    <!-- Navigation Bar -->
    <div class="site-mobile-menu site-navbar-target">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close">
                <span class="icofont-close js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>
    <nav class="site-nav">
        <div class="container">
            <div class="menu-bg-wrap">
                <div class="site-navigation">
                    <a href="index.php" class="logo m-0 float-start">
                        <h1 class='fs-2 fw-semibold text-light fw-semibold'>SWIFT SHIP</h1>
                    </a>
                    <ul class="js-clone-nav d-none d-lg-inline-block text-start text-black site-menu float-end pt-1">
                        <li><a href="index.php" class='fs-6'>Home</a></li>
                        <li class="active"><a href="branches.php" class='fs-6'>Branches</a></li>
                        <li><a href="services.php" class='fs-6'>Services</a></li>
                        <li><a href="about.php" class='fs-6'>About us</a></li>
                        <li><a href="contact.php" class='fs-6'>Contact Us</a></li>
                        <li><a href="logout.php" class="nav-logout">Log out</a></li>
                    </ul>
                    <a href="#" class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none" data-toggle="collapse" data-target="#main-navbar">
                        <span></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
 
  <!-- Hero Section -->
  <div class="hero page-inner overlay" style="background-image: url('images/hero_branches.jpg'); background-attachment: fixed;">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9 text-center mt-5">
          <h1 class="heading" data-aos="fade-up">Our Branches</h1>

          <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
            <ol class="breadcrumb text-center justify-content-center">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active text-white-50" aria-current="page">
                Branches
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- Featured Section -->
  <div class="section">
        <div class="container">
            <div class="row mb-3 align-items-center">
                <div class="col-lg-12">
                    <h2 class="font-weight-bold text-primary heading">
                        Featured Branches
                    </h2>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">


                            <?php $qry = $conn->query("SELECT * from branches");
                            while ($row = $qry->fetch_assoc()) : ?>
                                <!-- Location Item -->
                                <div class="property-item">
                                    <div class="img">
                                        <img src="images/locations/<?php echo $row['country']?>.jpg" alt="Image" class="img-fluid slider-img" />
                                    </div>
                                    <div class="property-content">
                                        <div>
                                            <span class="d-block mb-2 text-black-50"><?php echo $row["state"] ?>, <?php echo $row["zip_code"] ?></span>
                                            <span class="city d-block mb-3"><?php echo $row["city"] ?>, <?php echo $row["country"] ?></span>

                                            <a href="#" class="btn theme_btn text-light py-2 px-3">See details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; ?>

                        </div>

                        <div id="property-nav" class="controls" tabindex="0" aria-label="Carousel Navigation">
                            <span class="prev fw-semibold" data-controls="prev" aria-controls="property" tabindex="-1" style="font-weight: 900;"> < </span>
                            <span class="next" data-controls="next" aria-controls="property" tabindex="-1" style="font-weight: 900;"> > </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

  <!-- All Branches Section -->
  <div class="section section-properties">
    <div class="container">
      <div class="row">
      <div class="row mb-3 align-items-center">
                <div class="col-lg-12">
                    <h2 class="font-weight-bold text-primary heading">
                        All Branches
                    </h2>
                </div>
            </div>

      <?php 
      $page = isset($_GET['page']) ? $_GET['page'] : 1;
      $branchesPerPage = 6;
      $offset = ($page - 1) * $branchesPerPage;
      
      // Fetch data for the current page
      $qry = $conn->query("SELECT * FROM branches LIMIT $offset, $branchesPerPage");
      while ($row = $qry->fetch_assoc()) : ?>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                                <!-- Location Item -->
                                <div class="property-item mb-30">
                                    <div class="img">
                                        <img src="images/locations/<?php echo $row['country']?>.jpg" alt="Image" class="img-fluid slider-img" />
                                    </div>
                                    <div class="property-content">
                                        <div>
                                            <span class="d-block mb-2 text-black-50"><?php echo $row["state"] ?>, <?php echo $row["zip_code"] ?></span>
                                            <span class="city d-block mb-3"><?php echo $row["city"] ?>, <?php echo $row["country"] ?></span>
                                        </div>
                                    </div>
                                </div>
        </div>
        <?php endwhile;?>
<?php
  // Pagination links
$totalBranches = $conn->query("SELECT COUNT(*) as total FROM branches")->fetch_assoc()['total'];
$totalPages = ceil($totalBranches / $branchesPerPage);

// Display pagination links
echo '<div class="custom-pagination w-100 d-flex justify-content-center">';
for ($i = 1; $i <= $totalPages; $i++) {
    echo '<a style="margin:0 5px;" href="?page=' . $i . '"';
    if ($i == $page) {
        echo ' class="active"';
    }
    echo '>' . $i . '</a>';
}
echo '</div>';
?>  
      </div>
      </div>
      </div>

  <!-- Includes Footer to the Site -->
  <?php include "siteFooter.php" ?>

  <!-- Includes JS and Hrefs to the site -->
  <?php include "linkBottom.php"; ?>

</body>

</html>
<?php } else {
  header("Location:../index.php");
} ?>