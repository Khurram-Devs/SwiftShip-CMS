<?php 
include("db_connect.php");
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $log_email = $_POST["log_email"];
    $log_pass = $_POST["log_pass"];

    $qry = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $qry->bind_param("s", $log_email);
    $qry->execute();
    $result = $qry->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedHashedPassword = $row['password'];

        $enteredPasswordHash = md5($log_pass);

        if ($enteredPasswordHash === $storedHashedPassword) {
            $_SESSION['log_id'] = $row['id'];
            $_SESSION['log_type'] = $row['type'];
            $_SESSION['log_branchId'] = $row['branch_id'];
            $_SESSION["log_email"] = $log_email;
            if ($row['type'] == 1 || $row['type'] == 2) {
                header("Location:admin/php/index.php");
            }elseif ($row['type'] == 3) {
                header("Location:user/index.php");
            }


            exit(); 
        }
    }

    $_SESSION['login_error'] = "Invalid username or password";
    header("Location: index.php");
    exit(); 
}
?>
