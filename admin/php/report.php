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
		<script src="../assets/libs/pdfmake/pdfmake.js"></script>

	</head>

	<body>
		<!--  Body Wrapper -->
		<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
			data-sidebar-position="fixed" data-header-position="fixed">

			<?php include("sidebar.php") ?>


			<div class="body-wrapper">

				<?php include("header.php") ?>

				<div class="container-fluid">




					<?php include 'db_connect.php' ?>
					<?php $status = isset($_GET['status']) ? $_GET['status'] : 'all' ?>
					<div class="col-lg-12">
    <div class="card card-outline card-primary">
        <div class="card-body text-center">
            <form class="row g-3 justify-content-between">
                <div class="col-lg-3">
                    <?php
                    $status_arr = array("Item Accepted by Courier", "Collected", "Shipped", "In-Transit", "Arrived At Destination", "Out for Delivery", "Ready to Pickup", "Delivered", "Picked-up", "Unsuccessful Delivery Attempt");
                    ?>
                    <label for="status" class="visually-hidden">Status</label>
                    <select name="" id="status" class="form-select">
                        <option value="all" <?php echo $status == 'all' ? "selected" : '' ?>>All</option>
                        <?php foreach ($status_arr as $k => $v): ?>
                            <option value="<?php echo $k ?>" <?php echo $status != 'all' && $status == $k ? "selected" : '' ?>>
                                <?php echo $v; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-lg-3">
                    <label for="date_from" class="visually-hidden">From</label>
                    <input type="date" id="date_from" class="form-control" value="<?php echo isset($_GET['date_from']) ? date("Y-m-d", strtotime($_GET['date_from'])) : '' ?>">
                </div>
                <div class="col-lg-3">
                    <label for="date_to" class="visually-hidden">To</label>
                    <input type="date" id="date_to" class="form-control" value="<?php echo isset($_GET['date_to']) ? date("Y-m-d", strtotime($_GET['date_to'])) : '' ?>">
                </div>
                <div class="col-lg-3">
                    <button type="button" id='view_report' class="btn btn-primary mb-3 px-5">View Report</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 d-flex justify-content-end align-items-center mb-3">
                            <button type="button" class="btn btn-success" style="display: none" id="print">
                                <i class="ti ti-print"></i> Print
                            </button>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="report-list">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Date</th>
                                    <th>Sender</th>
                                    <th>Recipient</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Table data will go here -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<noscript>
    <style>
        table.table {
            width: 100%;
            border-collapse: collapse;
        }

        table.table tr,
        table.table th,
        table.table td {
            border: 1px solid;
        }

        .text-center {
            text-align: center;
        }
    </style>
    <h3 class="text-center"><b>Report</b></h3>
</noscript>
<div class="details d-none">
    <p><b>Date Range:</b> <span class="drange"></span></p>
    <p><b>Status:</b> <span class="status-field">All</span></p>
</div>



		<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
		<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
		<script src="../assets/js/sidebarmenu.js"></script>
		<script src="../assets/js/app.min.js"></script>
		<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
		<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
		<script src="../assets/js/dashboard.js"></script>


		<script>
			function load_report() {
				var date_from = $('#date_from').val();
				var date_to = $('#date_to').val();
				var status = $('#status').val();

				$.ajax({
					url: 'ajax.php?action=get_report',
					method: 'POST',
					data: { status: status, date_from: date_from, date_to: date_to },
					error: function (err) {
						alert_toast("An error occurred", "error");
					},
					success: function (resp) {
						if (typeof resp === 'object' || Array.isArray(resp) || typeof JSON.parse(resp) === 'object') {
							resp = JSON.parse(resp);
							if (Object.keys(resp).length > 0) {
								$('#report-list tbody').html('');
								var i = 1;
								Object.keys(resp).map(function (k) {
									var tr = $('<tr></tr>');
									tr.append('<td>' + (i++) + '</td>');
									tr.append('<td>' + (resp[k].date_created) + '</td>');
									tr.append('<td>' + (resp[k].sender_name) + '</td>');
									tr.append('<td>' + (resp[k].recipient_name) + '</td>');
									tr.append('<td>' + (resp[k].price) + '</td>');
									tr.append('<td>' + (resp[k].status) + '</td>');
									$('#report-list tbody').append(tr);
								});
								$('#print').show();
							} else {
								$('#report-list tbody').html('');
								var tr = $('<tr></tr>');
								tr.append('<th class="text-center" colspan="6">No result.</th>');
								$('#report-list tbody').append(tr);
								$('#print').hide();
							}
						}
					}
				});
			}

			$(document).on('click', '#view_report', function () {
				if ($('#date_from').val() == '' || $('#date_to').val() == '') {
					alert_toast("Please select dates first.", "error");
					return false;
				}
				load_report();
				var date_from = $('#date_from').val();
				var date_to = $('#date_to').val();
				var status = $('#status').val();
				var target = './index.php?page=reports&filtered&date_from=' + date_from + '&date_to=' + date_to + '&status=' + status;
				window.history.pushState({}, null, target);
			});

			$(document).ready(function () {
				if ('<?php echo isset($_GET['filtered']) ?>' == 1)
					load_report();
			});

			$('#print').click(function () {
				var ns = $('noscript').clone();
				var details = $('.details').clone();
				var content = $('#report-list').clone();
				var date_from = $('#date_from').val();
				var date_to = $('#date_to').val();
				var status = $('#status').val();
				var stat_arr = '<?php echo json_encode($status_arr) ?>';
				stat_arr = JSON.parse(stat_arr);
				details.find('.drange').text(date_from + " to " + date_to)
				if (status > -1)
					details.find('.status-field').text(stat_arr[status]);
				ns.append(details);
				ns.append(content);
				var nw = window.open('', '', 'height=700,width=900');
				nw.document.write(ns.html());
				nw.document.close();
				nw.print();
				setTimeout(function () {
					nw.close();
				}, 750);
			});
		</script>





	</body>

	</html>



<?php } else {
	header("Location: ../../index.php");
} ?>