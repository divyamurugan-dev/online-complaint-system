<?php
if($_SERVER["REQUEST_METHOD"]=="POST"){
  if($_POST['username']=="admin" && $_POST['password']=="admin123"){
    session_start();
    $_SESSION['admin']=true;
    header("Location: admin_dashboard.php");
    exit();
  } else {
    $msg="Invalid admin login";
  }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Admin Login</title>
<style>
body{
  font-family: Arial;
  background:#f2f2f2;
  text-align:center;
  margin-top:120px;
}
.box{
  background:white;
  width:300px;
  margin:auto;
  padding:25px;
  border-radius:8px;
  box-shadow:0 0 10px #aaa;
}
input{
  width:90%;
  padding:8px;
  margin:8px 0;
}
button{
  width:95%;
  padding:8px;
  background:#4CAF50;
  color:white;
  border:none;
}
.msg{
  color:red;
}
</style>
</head>
<body>

<div class="box">
<h2>Admin Login</h2>

<form method="post">
<input type="text" name="username" placeholder="Admin username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>

<?php if(isset($msg)) echo "<p class='msg'>$msg</p>"; ?>
</div>

</body>
</html>