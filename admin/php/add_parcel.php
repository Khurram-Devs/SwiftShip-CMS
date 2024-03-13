<?php
include("db_connect.php");

function generateRandomNumber($length = 12) {
    $min = pow(10, $length - 1);
    $max = pow(10, $length) - 1;
    return mt_rand($min, $max);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $SenderName = $_POST["SenderName"] ?? '';
    $SenderAddress = $_POST["SenderAddress"] ?? '';
    $SenderContact = $_POST["SenderContact"] ?? '';
    $RecipientName = $_POST["RecipientName"] ?? '';
    $RecipientAddress = $_POST["RecipientAddress"] ?? '';
    $RecipientContact = $_POST["RecipientContact"] ?? '';
    $Type = $_POST["Type"] ?? '';
    $FromBranchId = $_POST["FromBranchId"] ?? '';
    $ToBranchId = $_POST["ToBranchId"] ?? '';
    $Weight = $_POST["Weight"] ?? '';
    $Height = $_POST["Height"] ?? '';
    $Length = $_POST["Length"] ?? '';
    $Width = $_POST["Width"] ?? '';
    $Price = $_POST["Price"] ?? '';
    $Ref_Num = generateRandomNumber();

    if ($Type === "1") {
        $sql = "INSERT INTO parcels (reference_number, sender_name, sender_address, sender_contact, recipient_name, recipient_address, recipient_contact, type, from_branch_id, weight, height, length, width, price) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssss", $Ref_Num, $SenderName, $SenderAddress, $SenderContact, $RecipientName, $RecipientAddress, $RecipientContact, $Type, $FromBranchId, $Weight, $Height, $Length, $Width, $Price);
    } elseif ($Type === "2") {
        $sql = "INSERT INTO parcels (reference_number, sender_name, sender_address, sender_contact, recipient_name, recipient_address, recipient_contact, type, from_branch_id, to_branch_id, weight, height, length, width, price) 
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssssssssssssi", $Ref_Num, $SenderName, $SenderAddress, $SenderContact, $RecipientName, $RecipientAddress, $RecipientContact, $Type, $FromBranchId, $ToBranchId, $Weight, $Height, $Length, $Width, $Price);
    }

    $stmt->execute();
    $stmt->close();
    $conn->close();
    echo 'success';
} else {
    echo 'error';
}
?>
