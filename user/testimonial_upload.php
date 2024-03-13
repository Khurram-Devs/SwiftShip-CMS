<?php
session_start();

include("db_connect.php");
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $target_dir = "images/testimonials/";
  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

  $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

  $name = $_POST['name'];
  $occupation = $_POST['occupation'];
  $message = $_POST['message']; 

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
      $img = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
      $sql = "INSERT INTO testimonials (img, name, message, occupation) VALUES ('$img', '$name', '$message', '$occupation')";
      if ($conn->query($sql) === TRUE) {
        $_SESSION['testUpload_message'] = "Your review has been added.";
        echo 'success';
      } else {
        $_SESSION['testUpload_message'] = "Error: " . $sql . "<br>" . $conn->error;
        echo 'error';
      }
    } else {
      $_SESSION['testUpload_message'] = "Sorry, there was an error uploading your review.";
      echo 'error';
    }

} else {
  $_SESSION['testUpload_message'] = "Invalid request method.";
  echo 'error';
}
?>