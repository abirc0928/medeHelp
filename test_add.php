<?php
$a = 0;
$check = 0;
session_start();
$t = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include '_dbconnect.php'; 
    $name= $_POST['name'];
    $price= $_POST['price'];
    if ($name == null) {
        $a = 1;
        $check = 1;
    }
    if ($price == null) {
        $a = 1;
        $check = 1;
    }
    if($check == 0){
        $sql = "INSERT INTO `test` (`t_name`, `t_price`) VALUES ('$name', '$price');";
        $result = mysqli_query($con,$sql);
        if($result == true){
            $t = 1;
        }
        header("Location: /MedHelp/test_list.php");
        exit();
    
    }
    
    $con->close();
}
?>
<html>
<head>
    <title>Medical Test Entry</title>
    <link rel="stylesheet" href="Admin_test.css">
</head>
<body>
    <div class= "cover">
    <div class="bar">
            <img src ="img/Logo.png" class ="logo">
            <ul>
                <li><a href="Admin_home.php">Home</a></li>
                <li><a href="Admin_login.php"><img src ="img/profile.png" class ="logout"> Logout </a></li>
            </ul>
    </div>
        <div class = "form">
        <img src = "img/test.jpg" class = "profile">
        <h1>Data Entry for Medical Tests</h1>
        <form action="/MedHelp/test_add.php" method="POST">
        <?php
            if ($a == 1) {
                echo "<p align='center'> <font color=red  size='3pt'>Please Enter The All Information!</font> </p>";
            }
            if($t== 1){
                echo "<p align='center'> <font color=green  size='3pt'>Successfully added!</font> </p>";
            } 
        ?>
        <br><br>
        <br><br><p>Test Name</p>
        <input type="text" name="name" placeholder="Enter Test Name">
        <br><br><p>Test Price</p>
        <input type="text" name="price" placeholder="Enter Test Price">
        
           
        <br><br>
        <input type="submit" name="cadmin" value ="Submit">
        </form>
    </div>
    </div>
</body>
</html>