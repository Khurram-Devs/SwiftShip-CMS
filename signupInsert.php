<?php
include("db_connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["Signfirstname"] ?? '';
    $lastname = $_POST["Signlastname"] ?? '';
    $email = $_POST["Signemail"] ?? '';
    $password = md5($_POST['Signpassword'] ??'');
    $type = 3;

    $sql = "INSERT INTO users (firstname, lastname, email, password, type) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    $stmt->bind_param("sssss", $firstname, $lastname, $email, $password, $type);
    $stmt->execute();

    $stmt->close();
    $conn->close();


    $_SESSION["singup_alert"] = "Your account has been successfuly created, Please login to continue!";
    header("Location: index.php");
} else {
    $_SESSION["singup_alert"] = "An error occured while creating your Account, Please try again later!";
    header("Location: signup.php");
}
?>
