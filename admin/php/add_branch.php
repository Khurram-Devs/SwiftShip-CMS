<?php
include("db_connect.php");

function generateRandomString($length = 15) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';

    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $randomString;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $street = $_POST["street"] ?? '';
    $city = $_POST["city"] ?? '';
    $state = $_POST["state"] ?? '';
    $zip_code = $_POST["zip_code"] ?? '';
    $country = $_POST["country"] ?? '';
    $contact = $_POST["contact"] ?? '';

    $branch_code = generateRandomString(15);


    $sql = "INSERT INTO branches (street, city, state, zip_code, country, contact, branch_code) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssssss", $street, $city, $state, $zip_code, $country, $contact, $branch_code);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    echo 'success';
} else {
    echo 'error';
}
?>
