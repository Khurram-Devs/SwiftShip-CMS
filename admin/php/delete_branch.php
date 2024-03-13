<?php
include("db_connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $deleteQuery = "DELETE FROM branches WHERE id = ?";
    $stmt = $conn->prepare($deleteQuery);

    if ($stmt) {
        $idToDelete = $_POST['delete_id']; // Assuming the ID is passed through $_POST['delete_id']
        $stmt->bind_param('i', $idToDelete);
        
        if ($stmt->execute()) {
            // Deletion successful
            header("Location: branch_list.php");
            exit(); // Always exit after header redirect
        } else {
            // Error handling if deletion fails
            echo "Error executing deletion: " . $stmt->error;
        }
    } else {
        // Error handling if preparation fails
        echo "Error in prepared statement: " . $conn->error;
    }
} else {
    // Handle if it's not a POST request
    echo "Invalid request method";
}
?>
