<?php

include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $branchId = $_POST['branch_id'];
    $street = $_POST['editStreet'];
    $city = $_POST['editCity'];
    $state = $_POST['editState'];
    $zipCode = $_POST['editZip'];
    $country = $_POST['editCountry'];
    $contact = $_POST['editContact'];

    $updateQuery = "UPDATE branches 
                    SET street = ?, city = ?, state = ?, zip_code = ?, country = ?, contact = ?
                    WHERE id = ?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssssssi", $street, $city, $state, $zipCode, $country, $contact, $branchId);

    if ($stmt->execute()) {
        $_SESSION['branch_message'] = "success: Branch information updated successfully";
    } else {
        $_SESSION['branch_message'] = "error: " . $stmt->error; // Display specific error
    }
    header("Location: branch_list.php");
    exit();
} else {
    $_SESSION['branch_message'] = "error: Invalid request";
    header("Location: branch_list.php");
    exit();
}
?>
