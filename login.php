<?php
include "db.php";
$msg = "";

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST['email'];
    $pass  = $_POST['password'];

    $sql = "SELECT * FROM user_details WHERE email='$email'";
    $res = mysqli_query($conn,$sql);

    if(mysqli_num_rows($res)==1){
        $row = mysqli_fetch_assoc($res);

        if(password_verify($pass, $row['password'])){
    session_start();
$_SESSION['id'] = $row['id'];
$_SESSION['name'] = $row['name'];
    header("Location: dashboard.php");
    exit();
} else {
            $msg = "Wrong password";
        }
    } else {
        $msg = "Email not registered";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Online Complaint Registration System</title>
<style>
body{
    font-family: Arial;
    background:#fff;
    text-align:center;
    margin-top:120px;
}
input{
    width:250px;
    padding:8px;
    margin:8px 0;
}
button{
    width:270px;
    padding:8px;
}
a{
    text-decoration:none;
}
.msg{
    color:red;
}
</style>
</head>
<body>

<h2>Online Complaint Registration System</h2>

<?php if($msg!=""){ ?>
<p class="msg"><?php echo $msg; ?></p>
<script>
    window.history.replaceState(null, null, window.location.pathname);
</script>
<?php } ?>

<form method="post">
<input type="email" name="email" placeholder="Email ID" required><br>
<input type="password" name="password" placeholder="Password" required><br>
<button type="submit">Login</button>
</form>

<p>
<a href="register.php">Not have an account? Click here</a>
</p>

<p>
Forgot password?
<a href="mailto:divyamurugan2709@gmail.com">Contact Admin
</a></p>

</body>
</html>
