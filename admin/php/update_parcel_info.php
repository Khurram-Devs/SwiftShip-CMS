<?php
include("db_connect.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $parcelId = $_POST['parcel_id'];
    $SenderName = $_POST['editSenderName'];
    $SenderAddress = $_POST['editSenderAddress'];
    $SenderContact = $_POST['editSenderContact'];
    $RecipientName = $_POST['editRecipientName'];
    $RecipientAddress = $_POST['editRecipientAddress'];
    $RecipientContact = $_POST['editRecipientContact'];
    $weight = $_POST['editWeight'];
    $height = $_POST['editHeight'];
    $length = $_POST['editLength'];
    $width = $_POST['editWidth'];
    $price = $_POST['editPrice'];
    $status = $_POST['editStatus'];


    $updateQuery = "UPDATE parcels 
    SET sender_name = ?, sender_address = ?, sender_contact = ?, recipient_name = ?, recipient_address = ?, recipient_contact = ?, weight = ?, height = ?, length = ?, width = ?, status = ?, price = ?
    WHERE id = ?";
$stmt = $conn->prepare($updateQuery);
$stmt->bind_param("sssssssssssdi", $SenderName, $SenderAddress, $SenderContact, $RecipientName, $RecipientAddress, $RecipientContact, $weight, $height, $length, $width, $status,$price, $parcelId);


    
    if ($stmt->execute()) {
        $_SESSION['parcel_message'] = "success: Parcel information updated successfully";
    } else {
        $_SESSION['parcel_message'] = "error: Error updating parcel information";
    }
    header("Location: parcel_list.php");
    exit();
} else {
    $_SESSION['parcel_message'] = "error: Invalid request";
    header("Location: parcel_list.php");
    exit(); 
}
?>