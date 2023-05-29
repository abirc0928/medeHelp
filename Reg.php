<?php
 $a = 0;
 $check = 0;
 $check_pass = 0;
 $check_email  = 0;

if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    include '_dbconnect.php'; 
        
        $name = $_POST['name'];
        $email= $_POST['email'];      
        $pass1 = $_POST['pass1'];
        $pass2 = $_POST['pass2'];
        $add = $_POST['add'];
        $pn  = $_POST['pn'];
        $dob = $_POST['dob'];
        
        if($name == null){
            $a = 1;
            $check = 1;
        }
        if($email == null){
            $a = 1;
            $check = 1;
        }
        if($pass1 == null || strlen($pass1) < 6){
            $a = 1;
            $check = 1;
        }
        if($pass2 == null || strlen($pass2) < 6){
            $a = 1;
            $check = 1;
        }
        if($add == null){
            $a = 1;
            $check = 1;
        }
        if($pn == null){
            $a = 1;
            $check = 1;
        }
        if($dob == null){
            $a = 1;
            $check = 1;
        }

        if($check == 0){
            if($pass1 == $pass2){
                $check_pass = 1;
                
                $sql2 = "SELECT * FROM `user_account` WHERE user_email = '$email'";
                $result1 = mysqli_query($con,$sql2);
                $num1 = mysqli_num_rows($result1);
                
                if($num1 == 0){
                    $sql = "INSERT INTO `user_account` (`user_name`, `user_email`, `user_pass`, `user_add`, `user_phone`, `user_dob`)
                    VALUES ('$name', '$email', '$pass1', '$add', '$pn', '$dob');";
                    $result = mysqli_query($con,$sql);
                    $check = 3;
                }else{
                    
                    $check_email = 1;
                }
               
                
            }else{
                $check_pass = 2;
            }

        }
        
}
?>
<html>
<head>
    <title>MedHelp</title>
    <link rel="stylesheet" type="text/css" href="Reg.css">
</head>
<body>
    <img src = "img/Logo.png" class = "Logo">
    <div class = "form">
    <img src = "img/profile.png" class = "profile">
    <h1>Registration User</h1>
    <?php
        if($a == 1){
            echo "<p align='center'> <font color=red  size='3pt'>Please Enter The All Information!</font> </p>";
        }
       
        if($check == 3){
            
            if($result == true){
                echo "<p align='center'> <font color=green  size='3pt'>Account Created Successfully!</font> </p>";
            }
        }
        if($check_pass == 2){
            echo "<p align='center'> <font color=red  size='3pt'>Password Didn't Match. Please Enther The Password Again!</font> </p>";
        }
        if($check_email == 1){
            echo "<p align='center'> <font color=red  size='3pt'>This account already crated. Please change the email!</font> </p>";
        }
        ?>
        <form action="/MedHelp/Reg.php" method="POST">
        <p>Name</p>
        <input type="text" name="name" placeholder="Enter Name">
        <p>Email</p>
        <input type="text" name="email" placeholder="Enter Email">
        <p>Password</p>
        <input type="password" name="pass1" placeholder="Enter Password at least 6 digit">
        <p>Confirm Password</p>
        <input type="password" name="pass2" placeholder=" Password">
        <p>Address</p>
        <input type="text" name="add" placeholder="Enter Address">
        <p>Phone Number</p>
        <input type="text" name="pn" placeholder="Enter Phone Number">
        <p>Date of Birth</p>
        <input type="date" name="dob" placeholder="Enter Birth-date">
        <input type="submit" name="login" value ="Submit">
        <p>Have an Account? <ul><li><a href="login.php">Login  here</a></li></ul></p>
        </form>
    </div>
    
    
</body>
</html>