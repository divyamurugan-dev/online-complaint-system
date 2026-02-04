<?php
session_start();
if(!isset($_SESSION['name'])){
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Register a Complaint</title>
<style>
body{
  font-family: Arial;
  text-align:center;
  margin-top:80px;
}
select, textarea{
  width:300px;
  padding:8px;
  margin:8px 0;
}
button{
  padding:8px 20px;
}
a{
  text-decoration:none;
}
</style>
</head>
<body>

<h2>Register a Complaint</h2>
<p>Welcome, <?php echo $_SESSION['name']; ?></p>

<form method="post" action="save_complaint.php">

<select name="category" required>
  <option value="">-- Select Category --</option>
  <option value="General">General</option>
  <option value="Product related issues">Product related issues</option>
  <option value="Billing and payment issues">Billing and payment issues</option>
</select><br>

<textarea name="description" placeholder="Enter your complaint" required></textarea><br>

<button type="submit">Submit</button>
</form>

<p>
<a href="dashboard.php">Back to Dashboard</a>
</p>

</body>
</html>