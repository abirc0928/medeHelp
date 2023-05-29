<?php

include '_dbconnect.php';
$name = "";
$price = "";
$id = "";
$a = 0;
$check = 0;
session_start();
$t = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
$id = $_POST['id'];
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
        $sql = "update test set t_name = '$name' , t_price = '$price' where t_id = $id ";
        $result = mysqli_query($con,$sql);
        if($result == true){
            $t = 1;
        }
        header("Location: /MedHelp/test_list.php");
        exit();
    
    }
    
    $con->close();
}

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "select * FROM test WHERE t_id = $id";
$result1 = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    if ($row = $result1->fetch_assoc()) {
        $name = $row["t_name"];
        $price =  $row["t_price"];
    }
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
        <form action="/MedHelp/test_edit.php" method="POST">
        <input hidden type="text" name="id" value="<?php echo $id ?>">
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
        <input type="text" name="name" placeholder="Enter Test Name"  value="<?php echo $name ?>">
        <br><br><p>Test Price</p>
        <input type="text" name="price" placeholder="Enter Test Price"  value="<?php echo $price ?>"> 
        
           
        <br><br>
        <input type="submit" name="cadmin" value ="Submit">
        </form>
    </div>
    </div>
</body>
</html>