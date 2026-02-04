<?php
Session_start();
If(!isset($_SESSION['name'])){
    Header("Location: login.php");
    Exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Dashboard</title>
<style>
Body{
  Font-family: Arial;
  Background:#f2f2f2;
}
.top{
  Background:#4CAF50;
  Color:white;
  Padding:15px;
}
.box{
  Margin:40px auto;
  Width:60%;
  Background:white;
  Padding:30px;
  Border-radius:5px;
  Text-align:center;
}
A{
  Color:red;
  Text-decoration:none;
}
</style>
</head>
<body>

<div class="top">
Welcome, <?php echo $_SESSION["name"]; ?> 👋
</div>

<div class="box">
<h2>Online Complaint Registration System</h2>

<p>
Here you can register your complaints,  
Track status and manage your profile.
</p>

<p>
<a href="complaint.php">Register a Complaint</a>
</p>

<p>
<a href="my_complaints.php">View Complaints</a>
</p>

<p>
<a href="logout.php">Logout</a>
</p>

</div>
<script>
function logout(){
    alert("Logged out successfully");
}
</script>
</body>
</html>
