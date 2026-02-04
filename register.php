<?php
include "db.php";

$msg = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $pass1 = $_POST['password'];
    $pass2 = $_POST['repassword'];

    if ($name =="" || $email =="" || $pass1 == ""|| $pass2 == "")
        {
        $msg = "All fiedls are required";
    }
    else if($pass1 != $pass2){
        $msg = "paawords do not match";
    }
    else {
        $check = mysqli_query($conn, "SELECT id FROM user_details WHERE email='$email'");
        if(mysqli_num_rows($check) > 0) {
            $msg= "Email already exists";
        }
        else {
            $hash = password_hash($pass1,PASSWORD_DEFAULT);

            $sql = "INSERT INTO user_details(name,email,password) VALUES('$name','$email','$hash')";

            if (mysqli_query($conn, $sql)){
                header("Location: login.php");
                exit();   
            }
            else{
                $msg = "Something went wrong";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div align="center">
            <h2>User Registration</h2>
            <?php 
            if(isset($GET['success'])) {
                echo "<p style='color:green'>Registration successful</p>";
            } 
            if($msg != ""){
            echo "<p style='color:red'>$msg</p>";
            }
    ?>

    <form method="post" autocomplete="off">
        Name:<br>
        <input type="text" name="name"><br><br>

        Email:<br>
        <input type="email" name="email"><br><br>

        Password:<br>
        <input type="password"name="password"
        autocomplete="new-password"><br><br>

        Re-enter Pasword:<br>
        <input type="password"
        name="repassword"><br><br>

        <button type="submit">Register</button>
    </form>
</div>
</body>
</html>