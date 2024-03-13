<?php 
$host= "localhost:80";

try {
    $conn= new mysqli('localhost','root','','cms_db');
} catch (mysqli_sql_exception) {
    echo "<h1 class='text-center text-danger fw-semibold mb-0'>UNABLE TO CONNECT</h1>
    <h6 class='text-center text-dark fw-semibold mt-0'>Please make sure that the database is correctly exported!</h6>";
}