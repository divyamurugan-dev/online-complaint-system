<?php
$conn = mysqli_connect("localhost", "root", "", "complaint_system");

if (!$conn) {
    die("DB ERROR: " . mysqli_connect_error());
}
?>