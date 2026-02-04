<?php
include "db.php";
session_start();

// Session check
if (!isset($_SESSION['id'])) {
    echo "Session id missing. Please login again";
    exit();
}

// Get data
$user_id = $_SESSION['id'];
$category = $_POST['category'];
$description = $_POST['description'];
$status = "Pending";

// Insert query
$sql = "INSERT INTO complaints (user_id, category, description, status)
        VALUES ('$user_id', '$category', '$description', '$status')";

$result = mysqli_query($conn, $sql);

// Error check (important)
if(!$result){
    echo "DB Error: " . mysqli_error($conn);
    exit();
}

// Redirect
header("Location: my_complaints.php");
exit();
?>