<?php
include("db_connect.php");
session_start();

$id = $_SESSION["log_id"];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];

if ($password === null || $password === '') {
    $updateQuery = "UPDATE users 
                    SET firstname = '$firstname', lastname = '$lastname', email = '$email' 
                    WHERE id = $id";
} else {
    // Hash the password using md5 before updating it in the database
    $hashedPassword = md5($password);

    $updateQuery = "UPDATE users 
                    SET firstname = '$firstname', lastname = '$lastname', email = '$email', password = '$hashedPassword' 
                    WHERE id = $id";
}

$conn->query($updateQuery);

header("Location: index.php");
?>