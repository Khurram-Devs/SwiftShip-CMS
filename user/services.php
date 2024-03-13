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
    <title>Swift Ship | Our Services</title>
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
                        <li><a href="branches.php" class='fs-6'>Branches</a></li>
                        <li class="active"><a href="services.php" class='fs-6'>Services</a></li>
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
    <div
      class="hero page-inner overlay"
      style="background-image: url('images/hero_bg_1.jpg'); background-attachment: fixed;"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Our Services</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Services
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <!-- Services Section -->
    <div class="section bg-light">
      <div class="container">
        <div class="row">
          <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature mb-4">
            <img src="svg/location-arrow.svg" width="80px" height="60px" class=" mb-4 d-block-3"/>
              <h3 class="text-black mb-3 font-weight-bold">
                Express Delivery
              </h3>
              <p class="text-black-50">
               Providing lightning-fast delivery services for urgent shipments, ensuring swift and reliable transport.
              </p>
            </div>
          </div>
          <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature mb-4">
              <img src="svg/map.svg" width="80px" height="60px" class=" mb-4 d-block-3"/>
              <h3 class="text-black mb-3 font-weight-bold">Parcel Tracking</h3>
              <p class="text-black-50">
                Real-Time tracking solutions allowing clients to monitor their parcels' journey from pickup to delivery.
              </p>
            </div>
          </div>
          <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delay="500">
            <div class="box-feature mb-4">
            <img src="svg/earth-americas.svg" width="80px" height="60px" class=" mb-4 d-block-3"/>
              <h3 class="text-black mb-3 font-weight-bold">
                International Shipping
              </h3>
              <p class="text-black-50">
                Seamless global shipping services connecting businesses and individuals wroldwide.
              </p>
            </div>
          </div>
          <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delay="600">
            <div class="box-feature mb-4">
            <img src="svg/box.svg" width="80px" height="60px" class=" mb-4 d-block-3"/>
              <h3 class="text-black mb-3 font-weight-bold">Secure Packaging </h3>
              <p class="text-black-50">
                Expert packaging solutions ensuring the safety and protection of goods during transit
              </p>
            </div>
          </div>

          <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature mb-4">
            <img src="svg/truck-moving.svg" width="80px" height="60px" class=" mb-4 d-block-3"/>
              <h3 class="text-black mb-3 font-weight-bold">
                Customized Logistics
              </h3>
              <p class="text-black-50">
                Tailored logistics solutions catering to unique client requirments for efficient transportation.
              </p>
            </div>
          </div>
          <div class="col-6 col-lg-4" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature mb-4">
            <img src="svg/clock.svg" width="80px" height="60px" class=" mb-4 d-block-3"/>
              <h3 class="text-black mb-3 font-weight-bold">Same-Day Delivery</h3>
              <p class="text-black-50">
                Swift and efficient same-day delivery services for time-sensitive shipments within local regions.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Customer Says Section -->
    <div class="section sec-testimonials">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-md-6">
                    <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
                        Customer Says
                    </h2>
                </div>
                <div class="col-md-6 text-md-end">
                    <div id="testimonial-nav">
                        <span class="prev"  style="font-weight: 900;" data-controls="prev"><</span>
                        <span class="next " style="font-weight: 900;" data-controls="next">></span>
                        <span role="button"  data-bs-toggle="modal" data-bs-target="#testimonialModal">Add Yours</span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-4"></div>
            </div>
            <div class="testimonial-slider-wrap" >
                <div class="testimonial-slider" >


                <?php $qry = $conn->query("SELECT * from testimonials");
                $count=0;
                            while ($count < 20 && $row = $qry->fetch_assoc()) : ?>
                    <div class="item">
                        <div class="testimonial">
                            <img src="images/testimonials/<?php echo $row['img']?>" alt="Image" class="img-fluid rounded-2 w-25 mb-4" />
                            <div class="rate">
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                                <span class="icon-star text-warning"></span>
                            </div>
                            <h3 class="h5 text-primary mb-4"><?php echo $row['name']?></h3>
                            <blockquote>
                                <p>
                                    &ldquo; <?php echo $row['message']?> &rdquo;
                                </p>
                            </blockquote>
                            <p class="text-black-50"> <?php echo $row['occupation']?> </p>
                        </div>
                    </div>
<?php $count++;endwhile;?>



                </div>
            </div>
        </div>
    </div>



    <!-- Includes Footer to the Site -->
    <?php include "siteFooter.php" ?>
    <!-- Includes Modals to the Site -->
    <?php include "homeModals.php" ?>

    <!-- Includes JS and Hrefs to the site -->
    <?php include "linkBottom.php"; ?>

</body>

</html>
<?php } else {
  header("Location:../index.php");
} ?>