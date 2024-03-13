<?php
include("db_connect.php");

if (isset($_GET['id'])) {
    $agentId = $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE type = 2 AND id = ?");
    $stmt->bind_param("i", $agentId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $agentData = $result->fetch_assoc();

        header('Content-Type: application/json');
        echo json_encode($agentData);
    } else {
        // No branch found
        echo json_encode(['error' => 'Agent not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}
?>
