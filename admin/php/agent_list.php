<?php include("db_connect.php");

session_start();
if (isset($_SESSION['agent_message'])) {
    echo '<script>window.onload = function() { alert("' . $_SESSION['agent_message'] . '"); }</script>';
    unset($_SESSION['agent_message']);
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

            <?php include("header.php")?>

            <div class="container-fluid">


                <!--  Row 1 -->
                <div class="row">

                    <div class="col-lg-12 d-flex align-items-stretch">
                        <div class="card w-100">
                            <div class="card-body p-4">
                            <div class="row">
                        <div class="col-md-12 d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title fw-semibold">Agent List</h5>
                            <button type="button" data-bs-toggle="modal" data-bs-target="#addAgentModal" class="btn btn-primary">
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
                                                    <h6 class="fw-semibold mb-0">Agent</h6>
                                                </th>
                                                <th class="border-bottom-1">
                                                    <h6 class="fw-semibold mb-0">Email</h6>
                                                </th>
                                                <th class="border-bottom-1">
                                                    <h6 class="fw-semibold mb-0">Branch</h6>
                                                </th>
                                                <th class="border-bottom-1 ">
                                                    <h6 class="fw-semibold mb-0">Action</h6>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>


                                            <?php $qry = $conn->query("SELECT u.*,concat(u.firstname,' ',u.lastname) as name,concat(b.street,', ',b.city,', ',b.state,', ',b.country) as baddress FROM users u inner join branches b on b.id = u.branch_id where u.type = 2 order by concat(u.firstname,' ',u.lastname) asc ");
                          $index = 1;
                          while ($row = $qry->fetch_assoc()):
                    ?>
                                            <tr>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-0"><?php echo $index; $index++?></h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1"><?php echo ucwords($row['name']) ?>
                                                    </h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <h6 class="fw-semibold mb-1">
                                                        <?php echo ($row['email']) ?>
                                                    </h6>
                                                </td>
                                                <td class="border-bottom-0">
                                                    <div class="d-flex align-items-center gap-2">
                                                        <h6 class="fw-semibold mb-1">
                                                            <?php echo ucwords($row['baddress']) ?></h6>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <a  href="#" class="edit-agent-btn" data-bs-toggle="modal"
                                                    data-bs-target="#editAgentModal" data-agent-id="<?php echo $row['id']; ?>"> <span class="badge bg-warning rounded-1">
                                                <i class="ti ti-edit text-dark "></i>
                                            </span></a>
                                        <a href="#" onclick="deleteAgent(<?php echo $row['id']; ?>)"> <span class="badge bg-danger rounded-1">
                                                <i class="ti ti-trash text-dark"></i>
                                            </span></a>
                                    </td>
                                </tr>
                                <?php endwhile;?>


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



<!-- Add Agent -->
<div class="modal fade" id="addAgentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Agent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="add-agent" method="POST">
                            <input type="hidden" id="branchId" name="branch_id">
                            <div class="col-lg-12 mb-4">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" id="firstname" name="firstname" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" id="lastname" name="lastname" required>
                            </div>



                            <div class="col-lg-12 mb-4">
                                <label for="state">Branch</label>
                                <select name="branch_id" id="" class="form-select input-sm">
                  <option value=""></option>
                  <?php
                    $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                    while($row = $branches->fetch_assoc()):
                  ?>
                  <option value="<?php echo $row['id'] ?>" <?php echo isset($branch_id) && $branch_id == $row['id'] ? "selected":'' ?>><?php echo $row['branch_code']. ' | '.(ucwords($row['address'])) ?></option>
                <?php endwhile; ?>
                </select>
                            </div>




                            <div class="col-lg-12 mb-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
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




<!-- Edit agent -->
    <div class="modal fade" id="editAgentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Edit Agent</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                    <form id="editAgentForm" action="update_agent_info.php" method="POST">
                            <input type="hidden" id="agentId" name="agent_id">
                            <div class="col-lg-12 mb-4">
                                <label for="editFirstName">First Name</label>
                                <input type="text" class="form-control" id="editFirstName" name="editFirstName">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="editLastName">Last Name</label>
                                <input type="text" class="form-control" id="editLastName" name="editLastName">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="editBranchId">Branch</label>
                                <select name="editBranchId" id="editBranchId" class="form-select input-sm">
                  <option value=""></option>
                  <?php
                    $branches = $conn->query("SELECT *,concat(street,', ',city,', ',state,', ',zip_code,', ',country) as address FROM branches");
                    while($row = $branches->fetch_assoc()):
                  ?>
                  <option value="<?php echo $row['id'] ?>" <?php echo isset($branch_id) && $branch_id == $row['id'] ? "selected":'' ?>><?php echo $row['branch_code']. ' | '.(ucwords($row['address'])) ?></option>
                <?php endwhile; ?>
                </select>
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="editEmail">Email</label>
                                <input type="text" class="form-control" id="editEmail" name="editEmail">
                            </div>
                            <div class="col-lg-12 mb-4">
                                <label for="editPassword">Password</label>
                                <input type="text" class="form-control" id="editPassword" name="editPassword">
                                <div class="form-text">Leave this blank if you don't want to change the password.</div>
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


    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>

                            <script>

$(document).ready(function() {
    
    $('#add-agent').submit(function(e) {
        e.preventDefault();
        
        $('#add-agent button[type="submit"]').prop('disabled', true);

        var formData = $(this).serialize();

        $.ajax({
            url: 'add_agent.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                if (response.trim() === 'success') {
                    $('#addAgentModal').modal('hide');
                    setTimeout(() => {
                        alert('Data successfully saved');
                        location.reload();
                    }, 750);
                } else {
                    alert('Failed to save data. Please try again.');
                }
            },
            error: function(xhr, status, error) {
                $('#add-agent button[type="submit"]').prop('disabled', false);
                
                alert('Error occurred while saving data: ' + error);
            }
        });
    });
});










document.querySelectorAll('.edit-agent-btn').forEach(btn => {
    btn.addEventListener('click', function() {
        const agentId = this.dataset.agentId;

        fetch(`fetch_agent_info.php?id=${agentId}`)
            .then(response => response.json())
            .then(data => {
                document.getElementById('agentId').value = data.id;
                document.getElementById('editFirstName').value = data.firstname;
                document.getElementById('editLastName').value = data.lastname;
                document.getElementById('editEmail').value = data.email;
                document.getElementById('editBranchId').value = data.branch_id;
                document.getElementById('editPassword').value = "";
            })
            .catch(error => console.error('Error:', error));
    });
});




                                            function deleteAgent(agentId) {
                if (confirm('Are you sure you want to delete this agent?')) {
                    fetch('delete_agent.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/x-www-form-urlencoded',
                        },
                        body: 'delete_id=' + encodeURIComponent(agentId)
                    })
                        .then(response => {
                            if (response.ok) {
                                $('#table-data').load(location.href + ' #table-data');
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

<?php  } else {
  header("Location: ../../index.php");
} ?>