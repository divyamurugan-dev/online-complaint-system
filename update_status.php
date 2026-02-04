<?php
include "db.php";

$id = $_GET['id'];
$status = $_GET['status'];

$sql = "UPDATE complaints SET status='$status' WHERE id='$id'";
mysqli_query($conn, $sql);

header("Location: admin_dashboard.php");
exit();
?>