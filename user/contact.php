
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
    <title>Swift Ship | Contact us</title>
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
                        <li><a href="about.php" class='fs-6'>About us</a></li>
                        <li class="active"><a href="contact.php" class='fs-6'>Contact Us</a></li>
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
    <div class="hero page-inner overlay" style="background-image: url('images/11.jpg'); background-attachment: fixed;">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center mt-5">
                    <h1 class="heading" data-aos="fade-up">Contact Us</h1>

                    <nav aria-label="breadcrumb" data-aos="fade-up" data-aos-delay="200">
                        <ol class="breadcrumb text-center justify-content-center">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active text-white-50" aria-current="page">
                                Contact us
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Form -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 mb-5 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
                    <div class="contact-info">
                        <div class="address mt-2">
                            <i class="icon-room"></i>
                            <h4 class="mb-1">Location:</h4>
                            <p>
                            Aptech Lerning Center, North Nazimabad,<br />
                                Karachi 74600
                            </p>
                        </div>

                        <div class="open-hours mt-4">
                            <i class="icon-clock-o"></i>
                            <h4 class="mb-1">Open Hours:</h4>
                            <p>
                                Monday-Sunday:<br />
                                24 - Hours
                            </p>
                        </div>

                        <div class="email mt-4">
                            <i class="icon-envelope"></i>
                            <h4 class="mb-1">Email:</h4>
                            <p>info@swiftship.com</p>
                        </div>

                        <div class="phone mt-4">
                            <i class="icon-phone"></i>
                            <h4 class="mb-1">Call:</h4>
                            <p>+92 333 124865</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
                    <form onsubmit="sendEmail(); reset(); return false;">
                        <div class="row">
                            <div class="col-4 mb-3">
                                <input type="text" class="form-control" id="contactName" placeholder="Your Name"
                                    required />
                            </div>
                            <div class="col-4 mb-3">
                                <input type="email" class="form-control" id="contactEmail" placeholder="Your Email"
                                    required />
                            </div>
                            <div class="col-4 mb-3">
                                <input type="text" class="form-control" id="contactNumber" placeholder="Your Phone Number"
                                    required />
                            </div>
                            <div class="col-12 mb-3">
                                <input type="text" class="form-control" id="contactSubject" placeholder="Subject"
                                    required />
                            </div>
                            <div class="col-12 mb-3">
                                <textarea name="" id="" cols="30" rows="7" class="form-control" id="contactMessage"
                                    placeholder="Message" required></textarea>
                            </div>

                            <div class="col-12">
                                <input type="submit" value="Send Message" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://smtpjs.com/v3/smtp.js"></script>

    <script>
    function sendEmail() {
        Email.send({
            Host: "smtp.gmail.com",
            Username: "ikhurram765@gmail.com",
            Password: "",//Enter email Password
            To: "ikhurram765@gmail.com",
            From: document.getElementById("contactEmail").value,
            Subject: document.getElementById("contactSubject").value,
            Body: "Name" + document.getElementById("contactName").value +
                "<br> Email : " + document.getElementById("contactEmail").value +
                "<br> Phone Number : " + document.getElementById("contactNumber").value +
                "<br> Message : " + document.getElementById("contactMessage").value
        }).then(
            message => alert("Message Sent Succesfully")
        );
    }
    </script>



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