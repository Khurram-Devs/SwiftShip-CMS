<?php include("db_connect.php");

session_start();

if (isset($_SESSION['branch_message'])) {
    echo '<script>window.onload = function() { alert("' . $_SESSION['branch_message'] . '"); }</script>';
    unset($_SESSION['branch_message']); 
}

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


                    <!--  Row 1 -->
                    <div class="row">

                        <div class="col-lg-12 d-flex align-items-stretch">
                            <div class="card w-100">
                                <div class="card-body p-4">
                                <div class="row">
                        <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-semibold">Branch List</h5>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#addBranchModal" class="btn btn-primary">
                                Add New <i class="ti ti-plus"></i>
                            </button>
                        </div>
                    </div>
                                    <div class="table-responsive">
                                        <table class="table text-nowrap mb-0 align-middle" id="table-data">
                                            <thead class="text-dark fs-4">
                                                <tr>
                                                    <th class="border-bottom-1">
                                                        <h6 class="fw-semibold mb-0">Id</h6>
                                                    </th>
                                                    <th class="border-bottom-1">
                                                        <h6 class="fw-semibold mb-0">Street/Building/Brgy.</h6>
                                                    </th>
                                                    <th class="border-bottom-1">
                                                        <h6 class="fw-semibold mb-0">City/State/Zip</h6>
                                                    </th>
                                                    <th class="border-bottom-1">
                                                        <h6 class="fw-semibold mb-0">Country</h6>
                                                    </th>
                                                    <th class="border-bottom-1">
                                                        <h6 class="fw-semibold mb-0">Contact #</h6>
                                                    </th>
                                                    <th class="border-bottom-1 ">
                                                        <h6 class="fw-semibold mb-0">Action</h6>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>


                                                <?php $qry = $conn->query("SELECT * FROM branches order by street asc,city asc, state asc ");
                                                $index = 1;
                                                while ($row = $qry->fetch_assoc()):
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
                                                                <?php echo ucwords($row['street']) ?>
                                                            </h6>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-1">
                                                                <?php echo ucwords($row['city'] . ', ' . $row['state'] . ', ' . $row['zip_code']) ?>
                                                            </h6>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <div class="d-flex align-items-center gap-2">
                                                                <h6 class="fw-semibold mb-1">
                                                                    <?php echo ucwords($row['country']) ?>
                                                                </h6>
                                                            </div>
                                                        </td>
                                                        <td class="border-bottom-0">
                                                            <h6 class="fw-semibold mb-1">
                                                                <?php echo ucwords($row['contact']) ?>
                                                            </h6>
                                                        <td class="border-bottom-0">
                                                            <a href="#" class="edit-branch-btn" data-bs-toggle="modal"
                                                                data-bs-target="#editBranchModal" data-branch-id="<?php echo $row['id']; ?>">
                                                                <span class="badge bg-warning rounded-1">
                                                                    <i class="ti ti-edit text-dark "></i>
                                                                </span>
                                                            </a>
                                                            <a href="#" onclick="deleteBranch(<?php echo $row['id']; ?>)">
                                                                <span class="badge bg-danger rounded-1">
                                                                    <i class="ti ti-trash text-dark"></i>
                                                                </span>
                                                            </a>
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

        <!-- Add Modal -->
        <div class="modal fade" id="addBranchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Branch</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="add-branch" method="POST">
                            <input type="hidden" id="branchId" name="branch_id">
                            <div class="col-lg-12 mb-4">
                                <label for="street">Street/Building/Brgy.</label>
                                <input type="text" class="form-control" id="street" name="street" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="state">State</label>
                                <input type="text" class="form-control" id="state" name="state" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="zip_code">Zip</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="contact">Contact #</label>
                                <input type="text" class="form-control" id="contact" name="contact" required>
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

        
        <!-- Edit Modal -->
        <div class="modal fade" id="editBranchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Branch</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="editBranchForm" action="update_branch_info.php" method="POST">
                            <input type="hidden" id="editbranchId" name="branch_id">
                            <div class="col-lg-12 mb-4">
                                <label for="editStreet">Street/Building/Brgy.</label>
                                <input type="text" class="form-control" id="editStreet" name="editStreet">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="editCity">City</label>
                                <input type="text" class="form-control" id="editCity" name="editCity">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="editState">State</label>
                                <input type="text" class="form-control" id="editState" name="editState">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="editZip">Zip</label>
                                <input type="text" class="form-control" id="editZip" name="editZip">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="editCountry">Country</label>
                                <input type="text" class="form-control" id="editCountry" name="editCountry">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="editContact">Contact #</label>
                                <input type="text" class="form-control" id="editContact" name="editContact">
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button form="editBranchForm" type="submit" id="saveEditBtn" class="btn btn-primary">Save</button>
                    </div>
                </form>
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


$(document).ready(function() {
    $('#add-branch').submit(function(e) {
        e.preventDefault();
        
        var formData = $(this).serialize();

        $.ajax({
            url: 'add_branch.php',
            type: 'POST',
            data: formData,
            success: function(response) {

                if (response.trim() === 'success') {
                    $('#addBranchModal').modal('hide');
                    
                    setTimeout(() => {
                        alert('Data successfully saved');
                        location.reload();
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




// JavaScript to handle clicking "Edit" and displaying the modal with fetched branch data
document.querySelectorAll('.edit-branch-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        // Get the branch ID from the row
        const branchId = this.dataset.branchId; // Assuming the ID is stored in the data attribute

        // Fetch branch information via AJAX
        fetch(`fetch_branch_info.php?id=${branchId}`) // Adjust the URL and method according to your backend logic
            .then(response => response.json())
            .then(data => {
                // Populate the modal with fetched branch data
                document.getElementById('editbranchId').value = data.id;
                document.getElementById('editStreet').value = data.street;
                document.getElementById('editCity').value = data.city;
                document.getElementById('editState').value = data.state;
                document.getElementById('editZip').value = data.zip_code;
                document.getElementById('editCountry').value = data.country;
                document.getElementById('editContact').value = data.contact;
                // Populate other fields similarly
            })
            .catch(error => console.error('Error:', error));
    });
});


            function deleteBranch(branchId) {
                if (confirm('Are you sure you want to delete this branch?')) {
                    // If user confirms deletion, send an AJAX request to delete the branch
                    fetch('delete_branch.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'delete_id=' + encodeURIComponent(branchId)
                    })
                        .then(response => {
                            if (response.ok) {
                                // If deletion is successful, reload the page or handle accordingly
                                location.reload(); // Reload the page to reflect changes
                            } else {
                                // Handle errors or show a message to the user
                                alert('Failed to delete branch');
                            }
                        })
                        .catch(error => console.error('Error:', error));
                }
            }

        </script>

    </body>

    </html>

<?php } else {
    header("Location: ../../index.php");
} ?>