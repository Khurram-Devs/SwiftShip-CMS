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
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">

            <?php include("sidebar.php") ?>


            <div class="body-wrapper">

                <?php include("header.php") ?>

                <div class="container-fluid">


                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title fw-semibold mb-4">Track Parcel</h5>
                            <div class="card front-card">
                                <div class="card-body">
                                    <form>
                                        <div class="mb-3">
                                            <label for="ref_no" class="form-label">Enter Reference Number</label>
                                            <input type="text" class="form-control" id="ref_no"
                                                placeholder="Type your reference number here">
                                        </div>
                                        <button type="button" id="track-btn" class="btn btn-primary w-100">Search <i
                                                class="ti ti-search"></i></button>
                                    </form>
                                </div>

                            </div>
                            <div class="col-lg-12 d-flex align-items-stretch">
                                <div class="card w-100 front-card">
                                    <div class="card-body p-4">
                                        <div class="mb-4">
                                            <h5 class="card-title fw-semibold pb-3">Tracked Timeline</h5>
                                        </div>
                                        <ul id="parcel_history" class="timeline-widget mb-0 position-relative mb-n5 pb-5">



                                            <div id="default_timeline" style="display: none;">
                                                <li class="timeline-item d-flex position-relative overflow-hidden">
                                                    <div class="timeline-time text-dark flex-shrink-0 text-end mx-1"><span
                                                            class="dtime">Dec 18, 2023 02:00 AM</span></div>
                                                    <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                                        <span
                                                            class="timeline-badge border-2 border border-primary flex-shrink-0 my-8 mx-4"></span>
                                                        <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                                    </div>
                                                    <div class="timeline-desc fs-3 text-dark"><span
                                                            class="timeline-body">Delivered</span></div>
                                                </li>
                                            </div>




                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                </div>
            </div>
        </div>



        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/js/sidebarmenu.js"></script>
        <script src="../assets/js/app.min.js"></script>
        <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
        <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
        <script src="../assets/js/dashboard.js"></script>

        <script>
            function track_now() {
                var tracking_num = $('#ref_no').val()
                if (tracking_num == '') {
                    $('#main_timeline').html(''),
                        alert("----------")
                } else {
                    $.ajax({
                        url: 'ajax.php?action=get_parcel_heistory',
                        method: 'POST',
                        data: {
                            ref_no: tracking_num
                        },
                        error: err => {
                            console.log(err)
                            alert("An error occured", 'error')
                        },
                        success: function (resp) {
                            if (typeof resp === 'object' || Array.isArray(resp) || typeof JSON.parse(resp) ===
                                'object') {
                                resp = JSON.parse(resp);
                                if (Object.keys(resp).length > 0) {
                                    $('#parcel_history').empty();
                                    $('#default_timeline').show();
                                    Object.keys(resp).forEach(function (k) {
                                        var listItem = $('<li>', {
                                            class: 'timeline-item d-flex position-relative overflow-hidden'
                                        });
                                        var timeDiv = $('<div>', {
                                            class: 'timeline-time text-dark flex-shrink-0 text-end mx-1',
                                            text: resp[k].date_created
                                        });
                                        var badgeDiv = $('<div>', {
                                            class: 'timeline-badge-wrap d-flex flex-column align-items-center'
                                        }).html(
                                            '<span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8 mx-4"></span>' +
                                            '<span class="timeline-badge-border d-block flex-shrink-0"></span>'
                                        );
                                        var descDiv = $('<div>', {
                                            class: 'timeline-desc fs-3 text-dark'
                                        }).html('<span class="timeline-body">' + resp[k].status +
                                            '</span>');

                                        listItem.append(timeDiv, badgeDiv, descDiv);
                                        $('#parcel_history').append(listItem);
                                    });
                                }
                            } else if (resp == 2) {
                                alert('Unknown Tracking Number.', 'error');
                            }
                        },
                        complete: function () { }
                    })
                }
            }
            $('#track-btn').click(function () {
                track_now()
            })
            $('#ref_no').on('search', function () {
                track_now()
            })
        </script>

    </body>

    </html>

<?php } else {
    header("Location: ../../index.php");
} ?>