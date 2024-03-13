<?php
include("db_connect.php");

// Check if ID is set in the request
if (isset($_GET['id'])) {
    $branchId = $_GET['id'];

    // Fetch branch information based on the provided ID
    $stmt = $conn->prepare("SELECT * FROM branches WHERE id = ?");
    $stmt->bind_param("i", $branchId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Fetch branch data
        $branchData = $result->fetch_assoc();

        // Return branch data as JSON
        header('Content-Type: application/json');
        echo json_encode($branchData);
    } else {
        // No branch found
        echo json_encode(['error' => 'Branch not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
