<?php
include("db_connect.php");
session_start();

if (isset($_SESSION['parcel_message'])) {
    // Display the message using JavaScript after page load
    echo '<script>window.onload = function() { alert("' . $_SESSION['parcel_message'] . '"); }</script>';
    // Unset the message to avoid displaying it again on refresh
    unset($_SESSION['parcel_message']);
}


if (isset($_SESSION["log_email"])) {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png">
    <link rel="stylesheet" href="../assets/css/styles.min.css">
</head>

<body>
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">

        <?php include("sidebar.php") ?>

        <div class="body-wrapper">
            <?php include("header.php") ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                                <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                                    <h5 class="card-title fw-semibold">Parcel List</h5>
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#addParcelModal"
                                        class="btn btn-primary">
                                        Add New <i class="ti ti-plus"></i>
                                    </button>
                                </div>
                                <div class="table-responsive">
                                    <table id="table-data" class="table text-nowrap mb-0 align-middle">
                                        <thead class="text-dark">
                                            <tr>
                                                <th class="border-bottom-1">
                                                    <h6 class="fw-semibold">Id</h6>
                                                </th>
                                                <th class="border-bottom-1">
                                                    <h6 class="fw-semibold">Reference Number</h6>
                                                </th>
                                                <th class="border-bottom-1">
                                                    <h6 class="fw-semibold">Sender Name</h6>
                                                </th>
                                                <th class="border-bottom-1">
                                                    <h6 class="fw-semibold">Recipient Name</h6>
                                                </th>
                                                <th class="border-bottom-1">
                                                    <h6 class="fw-semibold">Status</h6>
                                                </th>
                                                <th class="border-bottom-1">
                                                    <h6 class="fw-semibold">Action</h6>
                                                </th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php

                                                if ($_SESSION['log_type'] == '2') {
                                                    $log_branchId = $_SESSION['log_branchId'];
                                                    $qry = $conn->query("SELECT * FROM parcels WHERE from_branch_id = $log_branchId order by  unix_timestamp(date_created) desc");
                                                } else {
                                                    $qry = $conn->query("SELECT * FROM parcels order by  unix_timestamp(date_created) desc ");
                                                }
                                                $index = 1;
                                                while ($row = $qry->fetch_assoc()) :
                                                ?>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0">
                                                        <?php echo $index;
                                                                $index++ ?>
                                                    </h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">
                                                        <?php echo ($row['reference_number']) ?>
                                                    </h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">
                                                        <?php echo ucwords($row['sender_name']) ?>
                                                    </h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <h6 class="fw-semibold mb-1">
                                                            <?php echo ucwords($row['recipient_name']) ?>
                                                        </h6>
                                                    </div>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">
                                                        <?php
                                                                switch ($row['status']) {
                                                                    case '1':
                                                                        echo "<span class='badge bg-info rounded-3 fw-semibold'> Collected</span>";
                                                                        break;
                                                                    case '2':
                                                                        echo "<span class='badge bg-info rounded-3 fw-semibold'> Shipped</span>";
                                                                        break;
                                                                    case '3':
                                                                        echo "<span class='badge bg-primary rounded-3 fw-semibold'> In-Transit</span>";
                                                                        break;
                                                                    case '4':
                                                                        echo "<span class='badge bg-primary rounded-3 fw-semibold'> Arrived</span>";
                                                                        break;
                                                                    case '5':
                                                                        echo "<span class='badge bg-primary rounded-3 fw-semibold'>Out for Delivery</span>";
                                                                        break;
                                                                    case '6':
                                                                        echo "<span class='badge bg-primary rounded-3 fw-semibold'>Ready to Pickup</span>";
                                                                        break;
                                                                    case '7':
                                                                        echo "<span class='badge bg-success rounded-3 fw-semibold'>Delivered</span>";
                                                                        break;
                                                                    case '8':
                                                                        echo "<span class='badge bg-success rounded-3 fw-semibold'>Picked-up</span>";
                                                                        break;
                                                                    case '9':
                                                                        echo "<span class='badge bg-danger rounded-3 fw-semibold'> Unsuccessfull</span>";
                                                                        break;

                                                                    default:
                                                                        echo "<span class='badge bg-info rounded-3 fw-semibold'> Accepted</span>";

                                                                        break;
                                                                }

                                                                ?>
                                                    </h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center justify-content-between">
                                                        <a href="#" data-bs-toggle="modal" data-bs-target="#trackModal"
                                                            data-parcel="<?php echo $row['id']; ?>"
                                                            onclick="viewParcelDetails()">
                                                            <span class="badge bg-secondary rounded-1 me-1">
                                                                <i class="ti ti-eye text-dark"></i>
                                                            </span>
                                                        </a>
                                                        <?php
                                                                if ($_SESSION['log_type'] != '2') { ?>
                                                        <a href="#" class="edit-parcel-btn" data-bs-toggle="modal"
                                                            data-bs-target="#editParcelModal"
                                                            data-parcel-id="<?php echo $row['id']; ?>">
                                                            <span class="badge bg-warning rounded-1 me-1">
                                                                <i class="ti ti-edit text-dark"></i>
                                                            </span>
                                                        </a>
                                                        <a href="#" onclick="deleteParcel(<?php echo $row['id']; ?>)">
                                                            <span class="badge bg-danger rounded-1">
                                                                <i class="ti ti-trash text-dark"></i>
                                                            </span>
                                                        </a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- View Parcel Modal -->
    <div class="modal fade" id="trackModal" tabindex="-1">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class='modal-title'>Parcel Details</h5>
                    <button class="btn btn-primary modal_btn" onclick="downloadAsPDF()">Download PDF</button>

                </div>
                <div class="modal-body" id="parcelDetails">
                    Something went wrong &CircleTimes;
                </div>
                <hr class="display p-0 m-0">
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary modal_btn" data-bs-dismiss='modal'
                        aria-label='Close'>Close</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Add Parcel Modal -->
    <div class="modal fade" id="addParcelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Add Parcel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="add-parcel" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Sender Information -->
                            <div class="col-lg-6">
                                <div class="form-text mb-3">Sender Information</div>
                                <div class="mb-4">
                                    <label for="SenderName">Sender Name</label>
                                    <input type="text" class="form-control" id="SenderName" name="SenderName" required>
                                </div>
                                <div class="mb-4">
                                    <label for="SenderAddress">Sender Address</label>
                                    <input type="text" class="form-control" id="SenderAddress" name="SenderAddress"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="SenderContact">Sender Contact#</label>
                                    <input type="text" class="form-control" id="SenderContact" name="SenderContact"
                                        required>
                                </div>
                            </div>
                            <!-- Recipient Information -->
                            <div class="col-lg-6">
                                <div class="form-text mb-3">Recipient Information</div>
                                <div class="mb-4">
                                    <label for="RecipientName">Recipient Name</label>
                                    <input type="text" class="form-control" id="RecipientName" name="RecipientName"
                                        required>
                                </div>
                                <div class="mb-4">
                                    <label for="RecipientAddress">Recipient Address</label>
                                    <input type="text" class="form-control" id="RecipientAddress"
                                        name="RecipientAddress" required>
                                </div>
                                <div class="mb-4">
                                    <label for="RecipientContact">Recipient Contact#</label>
                                    <input type="text" class="form-control" id="RecipientContact"
                                        name="RecipientContact" required>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-text mb-3">Branch Information</div>
                                <div class="row g-3">
                                    <div class="col-lg-4">
                                        <label for="Type">Type</label>
                                        <select required name="Type" id="Type" class="form-select input-sm">
                                            <option value="" selected disabled>Select delivery type</option>
                                            <option value="1">Deliver</option>
                                            <option value="2">Pickup</option>
                                        </select>
                                        <div class="form-text">Deliver = Deliver to Recipient Address <br>Pickup =
                                            Pickup to nearest Branch</div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="FromBranchId">Branch Processed</label>
                                        <select required name="FromBranchId" id="FromBranchId"
                                            class="form-select input-sm">
                                            <option value="" selected disabled>Please select here</option>
                                            <?php
                                                $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                                                while ($row = $branches->fetch_assoc()) :
                                                ?>
                                            <option value="<?php echo $row['id'] ?>"
                                                <?php echo isset($branch_id) && $branch_id == $row['id'] ? "selected" : '' ?>>
                                                <?php echo $row['branch_code'] . ' | ' . (ucwords($row['address'])) ?>
                                            </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                    <div class="col-lg-4" id="toBranchContainer">
                                        <label for="ToBranchId">Pickup Branch</label>
                                        <select name="ToBranchId" id="ToBranchId" class="form-select input-sm">
                                            <option value="" selected disabled>Please select here</option>
                                            <?php
                                                $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                                                while ($row = $branches->fetch_assoc()) :
                                                ?>
                                            <option value="<?php echo $row['id'] ?>"
                                                <?php echo isset($branch_id) && $branch_id == $row['id'] ? "selected" : '' ?>>
                                                <?php echo $row['branch_code'] . ' | ' . (ucwords($row['address'])) ?>
                                            </option>
                                            <?php endwhile; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <!-- Parcel Information -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-text mb-3">Parcel Information</div>
                                <div class="row g-3">
                                    <div class="col-lg-2">
                                        <label for="Weight">Weight</label>
                                        <input type="text" class="form-control" id="Weight" name="Weight" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="Height">Height</label>
                                        <input type="text" class="form-control" id="Height" name="Height" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="Length">Length</label>
                                        <input type="text" class="form-control" id="Length" name="Length" required>
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="Width">Width</label>
                                        <input type="text" class="form-control" id="Width" name="Width" required>
                                    </div>
                                    <div class="col-lg-4">
                                        <label for="Price">Price</label>
                                        <input type="text" class="form-control" id="Price" name="Price" required>
                                    </div>
                                </div>
                            </div>
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

    <!-- Edit -->
    <div class="modal fade" id="editParcelModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Edit Parcel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editParcelForm" action="update_parcel_info.php" method="POST">
                    <div class="modal-body view">
                        <input type="hidden" id="parcelId" name="parcel_id">

                        <div class="row">
                            <!-- Sender Information -->
                            <div class="col-lg-6">
                                <div class="form-text mb-3">Sender Information</div>
                                <div class="mb-4">
                                    <label for="editSenderName">Sender Name</label>
                                    <input type="text" class="form-control" id="editSenderName" name="editSenderName">
                                </div>
                                <div class="mb-4">
                                    <label for="editSenderAddress">Sender Address</label>
                                    <input type="text" class="form-control" id="editSenderAddress"
                                        name="editSenderAddress">
                                </div>
                                <div class="mb-4">
                                    <label for="editSenderContact">Sender Contact#</label>
                                    <input type="text" class="form-control" id="editSenderContact"
                                        name="editSenderContact">
                                </div>
                            </div>

                            <!-- Recipient Information -->
                            <div class="col-lg-6">
                                <div class="form-text mb-3">Recipient Information</div>
                                <div class="mb-4">
                                    <label for="editRecipientName">Recipient Name</label>
                                    <input type="text" class="form-control" id="editRecipientName"
                                        name="editRecipientName">
                                </div>
                                <div class="mb-4">
                                    <label for="editRecipientAddress">Recipient Address</label>
                                    <input type="text" class="form-control" id="editRecipientAddress"
                                        name="editRecipientAddress">
                                </div>
                                <div class="mb-4">
                                    <label for="editRecipientContact">Recipient Contact#</label>
                                    <input type="text" class="form-control" id="editRecipientContact"
                                        name="editRecipientContact">
                                </div>
                            </div>
                        </div>

                        <hr>

                        <!-- Parcel Information -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-text mb-3">Parcel Information</div>
                                <div class="row g-3">
                                    <div class="col-lg-2">
                                        <label for="editStatus">Status</label>


                                        <select name="editStatus" id="editStatus" class="form-select input-sm">
                                            <option value="0">Accepted</option>
                                            <option value="1">Collected</option>
                                            <option value="2">Shipped</option>
                                            <option value="3">In-Transit</option>
                                            <option value="4">Arrived</option>
                                            <option value="5">Out for Delivery</option>
                                            <option value="6">Ready to Pickup</option>
                                            <option value="7">Delivered</option>
                                            <option value="8">Picked-up</option>
                                            <option value="9">Unsuccessfull</option>

                                        </select>




                                    </div>
                                    <div class="col-lg-2">
                                        <label for="editWeight">Weight</label>
                                        <input type="text" class="form-control" id="editWeight" name="editWeight">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="editHeight">Height</label>
                                        <input type="text" class="form-control" id="editHeight" name="editHeight">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="editLength">Length</label>
                                        <input type="text" class="form-control" id="editLength" name="editLength">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="editWidth">Width</label>
                                        <input type="text" class="form-control" id="editWidth" name="editWidth">
                                    </div>
                                    <div class="col-lg-2">
                                        <label for="editPrice">Price</label>
                                        <input type="text" class="form-control" id="editPrice" name="editPrice">
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" id="saveEditBtn" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Include PDFMake library -->

    <script src="../assets/libs/pdfmake/pdfmake.js"></script>
    <script src="../assets/libs/pdfmake/pdfmake.min.js"></script>
    <script src="../assets/libs/pdfmake/vfs_fonts.js"></script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>

    <script>
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



    // View

    function viewParcelDetails() {
        const parcelId = event.currentTarget.dataset.parcel;

        $.ajax({
            url: "view_parcel_details.php",
            type: "POST",
            data: {
                parcelId: parcelId,
            },
            success: function(response) {
                $("#parcelDetails").html(response);
                $("#parcelModal").modal("show");
            },
        });
    }







    $(document).ready(function() {
        $('#Type').change(function() {
            var selectedType = $(this).val();

            if (selectedType === '1') {
                $('#toBranchContainer').hide();
            } else if (selectedType === '2') {
                $('#toBranchContainer').show();
            }
        });
    });

    $(document).ready(function() {
        $('#add-parcel').submit(function(e) {
            e.preventDefault();

            var formData = $(this).serialize();

            $.ajax({
                url: 'add_parcel.php',
                type: 'POST',
                data: formData,
                success: function(response) {

                    if (response.trim() === 'success') {
                        $('#addParcelModal').modal('hide');

                        setTimeout(() => {
                            alert('Data successfully saved');
                            location.reload()
                        }, 750);
                    } else {
                        alert('Failed to save data');
                    }
                },
                error: function() {
                    alert('Error occurred while saving data');
                }
            });
        });
    });


    // EDIT
    document.querySelectorAll('.edit-parcel-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const parcelId = this.dataset.parcelId;

            fetch(
                    `fetch_parcel_info.php?id=${parcelId}`
                )
                .then(response => response.json())
                .then(data => {
                    document.getElementById('parcelId').value = data.id;
                    document.getElementById('editSenderName').value = data.sender_name;
                    document.getElementById('editSenderAddress').value = data.sender_address;
                    document.getElementById('editSenderContact').value = data.sender_contact;
                    document.getElementById('editRecipientName').value = data.recipient_name;
                    document.getElementById('editRecipientAddress').value = data.recipient_address;
                    document.getElementById('editRecipientContact').value = data.recipient_contact;
                    document.getElementById('editWeight').value = data.weight;
                    document.getElementById('editHeight').value = data.height;
                    document.getElementById('editLength').value = data.length;
                    document.getElementById('editWidth').value = data.width;
                    document.getElementById('editPrice').value = data.price;
                    document.getElementById('editStatus').value = data.status;

                })
                .catch(error => console.error('Error:', error));
        });
    });



    function deleteParcel(parcelId) {
        if (confirm('Are you sure you want to delete this parcel?')) {
            fetch('delete_parcel.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'delete_id=' + encodeURIComponent(parcelId)
                })
                .then(response => {
                    if (response.ok) {
                        location.reload();
                    } else {
                        alert('Failed to delete agent');
                    }
                })
                .catch(error => console.error('Error:', error));
        }
    }
    </script>

</body>

</html>
<?php
} else {
    header("Location: ../../index.php");
}
?>