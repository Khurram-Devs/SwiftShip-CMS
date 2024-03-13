<?php 
include 'db_connect.php';

session_start();

if (isset($_SESSION["log_email"])) {


if (isset($_SESSION['testUpload_message'])) {
    echo '<script>window.onload = function() { setTimeout(() => {alert("' . $_SESSION['testUpload_message'] . '");}, 750);  }</script>';
    unset($_SESSION['testUpload_message']);
}

?>

<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />


    <?php include 'linkTop.php' ?>
    <link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">

    <title>Swift Ship</title>
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
                        <li class="active"><a href="index.php" class='fs-6'>Home</a></li>
                        <li><a href="branches.php" class='fs-6'>Branches</a></li>
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
    <div class="hero">
    <div class="hero-slide">
            <div class="img overlay" style="background-image: url('images/hero_bg_1.jpg')"></div>
            <div class="img overlay" style="background-image: url('images/hero_bg_2.jpg')"></div>
            <div class="img overlay" style="background-image: url('images/hero_bg_3.jpg')"></div>
        </div>

        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-9 text-center">
                    <h1 class="heading" data-aos="fade-up">
                        Helping You Make Delivery Easy
                    </h1>
                    <form action="#" class="narrow-w form-search d-flex align-items-stretch mb-3" data-aos="fade-up" data-aos-delay="200">
                        <input type="text" class="form-control px-4" placeholder="Your Reference Number" id="referenceNumber" name="referenceNumber" />
                        <button type="button" class="btn theme_btn" data-bs-toggle="modal" data-bs-target="#trackModal" onclick="fetchParcelDetails()">Track</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Branches Location Section -->
    <div class="section">
        <div class="container">
            <div class="row mb-5 align-items-center">
                <div class="col-lg-6">
                    <h2 class="font-weight-bold text-primary heading">
                        Our Branches
                    </h2>
                </div>
                <div class="col-lg-6 text-lg-end">
                    <p>
                        <a href="branches.php" class="btn theme_btn text-white py-3 px-4">View all Branches</a>
                    </p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="property-slider-wrap">
                        <div class="property-slider">


                            <?php $qry = $conn->query("SELECT * from branches");
                            $count=0;
                            while ($count < 6 && $row = $qry->fetch_assoc()) : ?>
                                <!-- Location Item -->
                                <div class="property-item">
                                    <div class="img">
                                        <img src="images/locations/<?php echo $row['country']?>.jpg" alt="Image" class="img-fluid slider-img" />
                                    </div>
                                    <div class="property-content">
                                        <div>
                                            <span class="d-block mb-2 text-black-50"><?php echo $row["state"] ?>, <?php echo $row["zip_code"] ?></span>
                                            <span class="city d-block mb-3"><?php echo $row["city"] ?>, <?php echo $row["country"] ?></span>

                                            <a href="branches.php" class="btn theme_btn text-light py-2 px-3">See details</a>
                                        </div>
                                    </div>
                                </div>
                            <?php $count++;endwhile; ?>

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

    <!-- Features Section -->
    <section class="features-1">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
                    <div class="box-feature">
                        <img src="svg/plane-departure.svg" alt="" width='50px' height="90px">
                        <h3 class="mb-3">Air Freight</h3>
                        <p>
                            Global speed, delivered by air.
                        </p>
                        <p><a href="services.php" class="learn-more">Read more</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
                    <div class="box-feature">
                                <img src="svg/ship.svg" alt="" width='50px' height="90px">
                    <h3 class="mb-3">Ocean Freight</h3>
                        <p>
                            Seamless journeys across oceans.
                        </p>
                        <p><a href="services.php" class="learn-more">Read more</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
                    <div class="box-feature">
                                <img src="svg/truck.svg" alt="" width='50px' height="90px" style='fill: red;'>
                    <h3 class="mb-3">Road Freight</h3>
                        <p>
                            Reliable land transport, every time.
                        </p>
                        <p><a href="services.php" class="learn-more">Read more</a></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
                    <div class="box-feature">
                                <img src="svg/train-subway.svg" alt="" width='40px' height="90px">
                    <h3 class="mb-3 fw-semibold">Rail Freight</h3>
                        <p>
                            Efficient, eco-friendly rail transport.
                        </p>
                        <p><a href="services.php" class="learn-more">Read more</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

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

    <!-- Brands Section -->
    <div class="section section-clients bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-6 mb-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">We Are Trusted By</h2>
                    <p class="text-black-50">Servicing diverse sectors, from small startups to industry giants.</p>
                </div>
            </div>
            
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-around flex-wrap">

                    <div class="client-logo mb-4 rounded-3 d-flex" style="flex-direction: column; " data-aos="fade-up" data-aos-delay="300">
                            <img src="svg/brands/square-behance.svg" alt="" class='icons' >
                        </div>
                        <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-facebook.svg" alt="" class='icons'>
                        </div>
                        <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-github.svg" alt="" class='icons'>
                        </div>
                        <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-pinterest.svg" alt="" class='icons'>
                        </div>
                    </div>
                </div>
            </div>            
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-around flex-wrap">

                    <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-reddit.svg" alt="" class='icons'>
                        </div>
                        <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-steam.svg" alt="" class='icons'>
                        </div>
                        <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-x-twitter.svg" alt="" class='icons'>
                        </div>
                        <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-whatsapp.svg" alt="" class='icons'>
                        </div>

                    </div>
                </div>
            </div>            
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="d-flex justify-content-around flex-wrap">

                    <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-youtube.svg" alt="" class='icons'>
                        </div>
                        <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-dribbble.svg" alt="" class='icons'>
                        </div>
                        <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-lastfm.svg" alt="" class='icons'>
                        </div>
                        <div class="client-logo mb-4 rounded-3" data-aos="fade-up" data-aos-delay="300" >
                            <img src="svg/brands/square-xing.svg" alt="" class='icons'>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Milestone Section -->
    <div class="section section-4 bg-light">
        <div class="container">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-5">
                    <h2 class="font-weight-bold heading text-primary mb-4">
                        Milestone Moments: Excellence in Delivery
                    </h2>
                    <p class="text-black-50">
                        Empowering Success Through Experience, Ratings, and Trust
                    </p>
                </div>
            </div>
            <div class="row justify-content-between mb-5">
                <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
                    <div class="img-about dots">
                        <img src="images/milestone_section-img.jpg" alt="Image" class="img-fluid" width="800px"/>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3 theme_text">
                            <span class="icon-home2"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">2M Parcels/Yr Delivered</h3>
                            <p class="text-black-50">
                                Reliability in Every Delivery: Making 2M Parcels Delivery possible every year
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3 theme_text">
                            <span class="icon-person"></span>
                        </span>
                        <div class="feature-text">
                            <h3 class="heading">Top Rated Agents</h3>
                            <p class="text-black-50">
                                Excellence Recognized: Our Top-Rated Agents
                            </p>
                        </div>
                    </div>

                    <div class="d-flex feature-h">
                        <span class="wrap-icon me-3 theme_text">
                            <span class="icon-security"></span>
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
                        Discover the Face Behind Your Deliveries: Meet Our Team, Ensuring Swift, Secure, and Reliable Service Every Day
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
                            &ldquo; Led the project's technical direction, architecting solutions for seamless fuctionality and ensuring robust performance.<br>Crafted captivating and intuitive designs, harmonizing creativity and usability for an enhanced user experience. &rdquo;
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

     <!-- Agent Job Section -->
     <div class="section section-5 theme_btn">
        <div class="row justify-content-center footer-cta" data-aos="fade-up">
            <div class="col-lg-7 mx-auto text-center">
                <h2 class="mb-4  fw-semibold text-shadow text-light">Join Our Couriers: Be Part of Our Team</h2>
                <p>
                    <button type="button" class="btn bg-dark text-white py-3 px-4" data-bs-toggle="modal" data-bs-target="#applyModal">Apply to become a Courier</button>
                </p>
            </div>
        </div>
    </div>


    <script src="js/jquery.min.js"></script>
    <!-- Includes Footer to the Site -->
    <?php include "siteFooter.php" ?>
    <!-- Includes Modals to the Site -->
    <?php include "homeModals.php" ?>

    <!-- Includes JS and Hrefs to the site -->
    <?php include "linkBottom.php"; ?>

    <!-- Custom Script -->
    <script>

$(document).ready(function() {
    $('#testimonialForm').on('submit', function(event) {
        event.preventDefault();
        var form = $(this);
        var submitButton = form.find('button[type="submit"]');
        submitButton.prop('disabled', true);
        
        var formData = new FormData(form[0]);

        $.ajax({
            url: 'testimonial_upload.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.trim() === 'success') {
                    $('#testimonialModal').modal('hide');
                    setTimeout(function() {
                        location.reload();
                    }, 750);
                }
            },
            error: function(xhr, status, error) {
                submitButton.prop('disabled', false);
            }
        });
    });
});





        // Tracker
        function fetchParcelDetails() {
            var referenceNumber = document.getElementById("referenceNumber").value;

            $.ajax({
                url: "get_parcel_track.php",
                type: "POST",
                data: {
                    referenceNumber: referenceNumber,
                },
                success: function(response) {
                    $("#parcelReferenceNumber").text(
                        "Reference Number: " + referenceNumber
                    );
                    $("#parcelDetails").html(response);
                    $("#parcelModal").modal("show");
                },
            });
        }

    // PRINT

    function downloadAsPDF() {

const trackingNumber = document.getElementById('trackingNumber').innerText;

const senderName = document.getElementById('senderName').innerText;
const senderAddress = document.getElementById('senderAddress').innerText;
const senderContact = document.getElementById('senderContact').innerText;

const recipientName = document.getElementById('recipientName').innerText;
const recipientAddress = document.getElementById('recipientAddress').innerText;
const recipientContact = document.getElementById('recipientContact').innerText;

const weight = document.getElementById('weight').innerText;
const width = document.getElementById('width').innerText;
const height = document.getElementById('height').innerText;
const length = document.getElementById('length').innerText;
const price = document.getElementById('price').innerText;
const type = document.getElementById('type').innerText;

const branchFrom = document.getElementById('branchFrom').innerText;
const branchToElement = document.getElementById('branchTo');
const branchTo = branchToElement ? branchToElement.innerText : '';


const status = document.getElementById('status').innerText;

const A6WidthInMillimeters = 105;
const A6HeightInMillimeters = 148;

const A6WidthInPoints = A6WidthInMillimeters * 2.83465;
const A6HeightInPoints = A6HeightInMillimeters * 2.83465;
const docDefinition = {
    pageSize: 'A6',
    pageMargins: [20, 30, 20, 30],
    background: function(currentPage, pageSize) {
        return {
            canvas: [{
                type: 'rect',
                x: 0,
                y: 0,
                w: A6WidthInPoints,
                h: A6HeightInPoints,
                color: 'lightyellow',
            }, ],
        };
    },
    content: [{
        stack: [{
                text: `Tracking Number: ${trackingNumber}`,
                fontSize: 15,
                bold: true,
                margin: [0, 0, 0, 12],
                alignment: 'center'
            },
            {
                canvas: [{
                    type: 'line',
                    x1: -100,
                    y1: 0,
                    x2: A6WidthInPoints + 50,
                    y2: 0,
                    lineWidth: 0.5
                }],
            },
            {
                columns: [{
                        width: '50%',
                        stack: [{
                                text: `Sender Name:`,
                                fontSize: 9,
                                margin: [0, 10, 0, 2]
                            },
                            {
                                text: `${senderName}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            {
                                text: `Sender Address:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${senderAddress}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            {
                                text: `Sender Contact:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${senderContact}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                        ],
                    },
                    {
                        width: '50%',
                        stack: [{
                                text: `Recipient Name:`,
                                fontSize: 9,
                                margin: [0, 10, 0, 2]
                            },
                            {
                                text: `${recipientName}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            {
                                text: `Recipient Address:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${recipientAddress}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            {
                                text: `Recipient Contact:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${recipientContact}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                        ],
                    },
                ],
            },

            {
                canvas: [{
                    type: 'line',
                    x1: -100,
                    y1: 0,
                    x2: A6WidthInPoints + 50,
                    y2: 0,
                    lineWidth: 0.5
                }],
            },

            {
                columns: [{
                        width: '50%',
                        stack: [{
                                text: `Weight:`,
                                fontSize: 9,
                                margin: [0, 10, 0, 2]
                            },
                            {
                                text: `${weight}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            {
                                text: `Width:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${width}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            {
                                text: `Height:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${height}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            {
                                text: `Length:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${length}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            {
                                text: `Price:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${price}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            {
                                text: `Type:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${type}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                        ],
                    },
                    {
                        width: '50%',
                        stack: [{
                                text: `From Branch:`,
                                fontSize: 9,
                                margin: [0, 10, 0, 2]
                            },
                            {
                                text: `${branchFrom}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            },
                            (branchTo !== '' && branchTo !== null) ? {
                                text: `To Branch:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            } : null,
                            (branchTo !== '' && branchTo !== null) ? {
                                text: `${branchTo}`,
                                fontSize: 9,
                                margin: [0, 0, 0, 7]
                            } : null,
                            {
                                text: `Status:`,
                                fontSize: 9,
                                margin: [0, 0, 0, 2]
                            },
                            {
                                text: `${status}`,
                                fontSize: 9,
                                background: 'yellow',
                                margin: [0, 0, 0, 7]
                            },
                        ],
                    },
                ],
            },
            {
                canvas: [{
                    type: 'line',
                    x1: -100,
                    y1: 0,
                    x2: A6WidthInPoints + 50,
                    y2: 0,
                    lineWidth: 0.5
                }],
            },
        ],
    }, ],
};

const pdfDoc = pdfMake.createPdf(docDefinition);
pdfDoc.download('parcel_details.pdf');
}



// Send Mail

function sendEmail() {
        Email.send({
            Host: "smtp.gmail.com",
            Username: "ikhurram765@gmail.com",
            Password: "",//Enter email Password
            To: "ikhurram765@gmail.com",
            From: document.getElementById("agentEmail").value,
            Subject: "New Job Proposal",
            Body: "Name" + document.getElementById("agentName").value +
                "<br> Email : " + document.getElementById("agentEmail").value +
                "<br> Address : " + document.getElementById("agentAddress").value +
                "<br> Job Location : " + document.getElementById("jobLocation").value +
                "<br> Job Type : " + document.getElementById("jobType").value +
                "<br> Cover Letter : " + document.getElementById("coverLetter").value
        }).then(
            message => alert("Message Sent Succesfully")
        );
    }






    </script>

</body>
<script src="js/jquery.min.js"></script>

</html>
<?php } else {
  header("Location: ../index.php");
} ?>