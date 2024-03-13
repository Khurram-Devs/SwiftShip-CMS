<?php
include("db_connect.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $firstname = $_POST["firstname"] ?? '';
    $lastname = $_POST["lastname"] ?? '';
    $email = $_POST["email"] ?? '';
    $password = md5($_POST['password'] ??'');
    $type = 2;
    $branch_id = $_POST["branch_id"] ?? '';

    $sql = "INSERT INTO users (firstname, lastname, email, password, type,branch_id) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("ssssss", $firstname, $lastname, $email, $password, $type, $branch_id);
    $stmt->execute();

    $stmt->close();
    $conn->close();

    echo 'success';
} else {
    echo 'error';
}
?>
