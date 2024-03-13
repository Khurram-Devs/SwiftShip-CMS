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
  <title>Swift Ship | About us</title>
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
                        <li><a href="services.php" class='fs-6'>Services</a></li>
                        <li class="active"><a href="about.php" class='fs-6'>About us</a></li>
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
  <div class="hero page-inner overlay" style="background-image: url('images/4.jpg'); background-attachment: fixed;">
    <div class="container">
      <div class="row justify-content-center align-items-center">
        <div class="col-lg-9 text-center mt-5">
          <h1 class="heading" data-aos="fade-up">About us</h1>

          <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
            <ol class="breadcrumb text-center justify-content-center">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active text-white-50" aria-current="page">
                About us
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <!-- About Section -->
  <div class="section">
    <div class="container">
      <div class="row text-left mb-5">
        <div class="col-12">
          <h2 class="font-weight-bold heading text-primary mb-4">About Us</h2>
        </div>
        <div class="col-lg-6">
          <p class="text-black-50">
          Welcome to Swift Ship, where precision meets convenience in the world of logistics. As a leading courier service provider, we understand the significance of time-sensitive deliveries. 
          </p>
          <p class="text-black-50">
          Our journey began with a vision to revolutionize shipping, and today, we stand tall as innovators in the industry. With a focus on personalized solutions, advanced tracking systems, and a dedicated workforce, we assure you of a seamless shipping experience.
          </p>
          <p class="text-black-50">
          Whether it's a small parcel or a bulk consignment, we take pride in our efficiency, reliability, and a commitment to exceeding your expectations.
          </p>
        </div>
        <div class="col-lg-6">
        <p class="text-black-50">
          At Swift Ship, our passion lies in delivering reliability and efficiency with every parcel. With years of experience in the logistics industry, we've perfected the art of seamless transportation.
          </p>
          <p class="text-black-50">
          Our commitment extends beyond mere deliveries; it's about building trust. We pride ourselves on our dedicated team, cutting-edge technology, and a network that spans continents. 
          </p>
          <p class="text-black-50">
          From local to international shipments, our goal is simple: to ensure your package reaches its destination swiftly and securely. Customer satisfaction is at the core of everything we do, and we're here to redefine your shipping experience.
          </p>
        </div>
      </div>
    </div>
  </div>

  <!-- Feature_1 Section -->
  <div class="section pt-0">
    <div class="container">
      <div class="row justify-content-between mb-5">
        <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
          <div class="img-about dots">
            <img src="images/hero_bg_3.jpg" alt="Image" class="img-fluid  rounded-3" />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="d-flex feature-h">
            <span class="wrap-icon me-3">
              <span class="icon-plane theme_text"></span>
            </span>
            <div class="feature-text">
              <h3 class="heading">Air Freight</h3>
              <p class="text-black-50">
              Global speed, delivered by air.
              </p>
            </div>
          </div>

          <div class="d-flex feature-h">
            <span class="wrap-icon me-3">
              <span class="icon-ship theme_text"></span>
            </span>
            <div class="feature-text">
              <h3 class="heading">Ocean Freight</h3>
              <p class="text-black-50">
              Seamless journeys across oceans.
              </p>
            </div>
          </div>

          <div class="d-flex feature-h">
            <span class="wrap-icon me-3">
              <span class="icon-truck theme_text"></span>
            </span>
            <div class="feature-text">
              <h3 class="heading">Road Freight</h3>
              <p class="text-black-50">
              Reliable land transport, every time.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Feature_2 Section -->
  <div class="section pt-0">
    <div class="container">
      <div class="row justify-content-between mb-5">
        <div class="col-lg-7 mb-5 mb-lg-0">
          <div class="img-about dots">
            <img src="images/hero_bg_1.jpg" alt="Image" class="img-fluid rounded-3" />
          </div>
        </div>
        <div class="col-lg-4">
          <div class="d-flex feature-h">
            <span class="wrap-icon me-3">
              <span class="icon-home2 theme_text"></span>
            </span>
            <div class="feature-text">
              <h3 class="heading">2M Parcels Delivered</h3>
              <p class="text-black-50">
                Reliability in Every Delivery: Celebrating 2 Million Parcels Delivered
              </p>
            </div>
          </div>

          <div class="d-flex feature-h">
            <span class="wrap-icon me-3">
              <span class="icon-person theme_text"></span>
            </span>
            <div class="feature-text">
              <h3 class="heading">Top Rated Agents</h3>
              <p class="text-black-50">
                Excellence Recognized: Our Top-Rated Agents
              </p>
            </div>
          </div>

          <div class="d-flex feature-h">
            <span class="wrap-icon me-3">
              <span class="icon-security theme_text"></span>
            </span>
            <div class="feature-text">
              <h3 class="heading">Legit Deliveries</h3>
              <p class="text-black-50">
                Trustworthy Transport: Our Legit Deliveries
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Milestone Feature Images Section -->
  <div class="section">
    <div class="container">
      <div class="row">
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="0">
          <img src="images/about_bot_1.jpg" alt="Image" class="img-fluid about-mile_img rounded-3" />
        </div>
        <div class="col-md-4 mt-lg-5" data-aos="fade-up" data-aos-delay="100">
          <img src="images/about_bot_3.jpg" alt="Image" class="img-fluid about-mile_img rounded-3" />
        </div>
        <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
          <img src="images/about_bot_2.jpg" alt="Image" class="img-fluid about-mile_img rounded-3" />
        </div>
      </div>
      <div class="row section-counter mt-5">
        <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
          <div class="counter-wrap mb-5 mb-lg-0">
            <span class="number"><span class="countup text-primary"><?php echo $conn->query("SELECT * FROM parcels where status = 7")->num_rows; ?></span></span>
            <span class="caption text-black-50"># of Delivered Parcels</span>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
          <div class="counter-wrap mb-5 mb-lg-0">
            <span class="number"><span class="countup text-primary"><?php echo $conn->query("SELECT * FROM parcels where status = 8")->num_rows; ?></span></span>
            <span class="caption text-black-50"># of Picked up Parcels</span>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
          <div class="counter-wrap mb-5 mb-lg-0">
            <span class="number"><span class="countup text-primary"><?php echo $conn->query("SELECT * FROM parcels where status = 1")->num_rows; ?></span></span>
            <span class="caption text-black-50"># of Collected Parcles</span>
          </div>
        </div>
        <div class="col-6 col-sm-6 col-md-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
          <div class="counter-wrap mb-5 mb-lg-0">
            <span class="number"><span class="countup text-primary"><?php echo $conn->query("select * from users where type = 2")->num_rows ?></span></span>
            <span class="caption text-black-50"># of Agents working</span>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Lead team Section -->
    <div class="section section-5 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6 mb-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">
                        Meet Our Leading Team
                    </h2>
                    <p class="text-black-50">
                        Discover the Faces Behind Your Deliveries: Meet Our Team, Ensuring Swift, Secure, and Reliable Service Every Day
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-lg-12 mb-5 mb-lg-0">
                    <div class="h-100 person">
                        <img src="images/lead_person_1.png" alt="Image" class="img-fluid" />

                        <div class="person-contents">
                            <h2 class="mb-0">Khurram Iqbal</h2>
                            <span class="meta d-block mb-3">Developer & Designer</span>
                            <p>
                            &ldquo;Led the project's technical direction, architecting solutions for seamless fuctionality and ensuring robust performance.<br>Crafted captivating and intuitive designs, harmonizing creativity and usability for an enhanced user experience. &rdquo;
                            </p>

                            <ul class="social list-unstyled list-inline dark-hover">
                                <li class="list-inline-item">
                                    <a href="https://twitter.com/iKhurram765"><span class="icon-twitter"></span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.fiverr.com/devengineetor"><span class="icon-facebook"></span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.linkedin.com/in/khurramiqbaldev"><span class="icon-linkedin"></span></a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="https://www.fiverr.com/devengineetor"><span class="icon-instagram"></span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
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