<?php
include("db_connect.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $agentId = $_POST['agent_id'];
    $firstname = $_POST['editFirstName'];
    $lastname = $_POST['editLastName'];
    $BranchId = $_POST['editBranchId'];
    $email = $_POST['editEmail'];
    $password = $_POST['editPassword'];

    if ($password === null || $password === '') {
        $updateQuery = "UPDATE users 
                        SET firstname = ?, lastname = ?, branch_id = ?, email = ?
                        WHERE type = 2 AND id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("ssssi", $firstname, $lastname, $BranchId, $email, $agentId);
    } else {
        $hashedPassword = md5($password); // Using md5() for hashing
        $updateQuery = "UPDATE users 
                        SET firstname = ?, lastname = ?, branch_id = ?, email = ?, password = ?
                        WHERE type = 2 AND id = ?";
        $stmt = $conn->prepare($updateQuery);
        $stmt->bind_param("sssssi", $firstname, $lastname, $BranchId, $email, $hashedPassword, $agentId);
    }

    if ($stmt->execute()) {
        $_SESSION['agent_message'] = "success: Agent information updated successfully";
    } else {
        $_SESSION['agent_message'] = "error: Error updating agent information";
    }

    header("Location: agent_list.php");
    exit();
} else {
    $_SESSION['agent_message'] = "error: Invalid request";
    header("Location: agent_list.php");
    exit();
}
?>
