<?php
$num= 0 ;
$login = 0;
session_start();
if($_SERVER["REQUEST_METHOD"] == "POST"){
include '_dbconnect.php'; 
    $email = $_POST['username'];
    $pass =  $_POST['password'];
    $_SESSION["email"] = $email;
    $sql = "SELECT * FROM `user_account` WHERE user_email = '$email' and user_pass = '$pass' ";
    
    $result = mysqli_query($con,$sql);
    $num = mysqli_num_rows($result);

    if($num == 1){
        header("location: home.php");
    }else{
        $login = 1;
    }
    $con->close();
}
?>

<html>
<head>
    <title>MedHelp</title>
    <link rel="stylesheet" type="text/css" href="login.css">
</head>
<body>
    <img src = "img/Logo.png" class = "Logo">
    <div class = "form">
    <img src = "img/profile.png" class = "profile">
    <h1>Login User</h1>
    <?php
            if($login== 1){
                echo "<p align='center'> <font color=red  size='3pt'>Wrong Password!</font> </p>";
            } 
        ?>
        <form action="/MedHelp/login.php" method="POST">
        <p>User ID</p>
        <input type="text" name="username" placeholder="Enter ID">
        <p>Password</p>
        <input type="password" name="password" placeholder="Enter Password">
        <input type="submit" name="login" value ="Login">
        <input type="submit" name="admin" value ="Login as Admin" onClick="javascript: form.action='Admin_login.php';">
        <p>Don't have an Account? <ul><li><a href="Reg.php">Sign up here</a></li></ul></p>
        </form>
    </div>
     
</body>
</html>