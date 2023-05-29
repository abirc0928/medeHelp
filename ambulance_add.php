<?php
$a = 0;
$check = 0;
session_start();
$t = 0;
if($_SERVER["REQUEST_METHOD"] == "POST"){
include '_dbconnect.php'; 
    $no_plate= $_POST['no_plate'];
    $location = $_POST['location'];
    $capacity = $_POST['capacity'];
    $type= $_POST['in1'];
    $driver_name = $_POST['driver_name'];
    $driver_phone= $_POST['driver_phone'];
    $dricer_lincese= $_POST['driver_license'];
    

    if ($no_plate == null) {
        $a = 1;
        $check = 1;
    }
    if ($location == null) {
        $a = 1;
        $check = 1;
    }
    if ($capacity== null) {
        $a = 1;
        $check = 1;
    }
    if ($type== null ) {
        $a = 1;
        $check = 1;
    }
    if ($driver_name == null) {
        $a = 1;
        $check = 1;
    }
    if ($driver_phone== null) {
        $a = 1;
        $check = 1;
    }
    if ($dricer_lincese == null) {
        $a = 1;
        $check = 1;
    }
   
    if($check == 0){
        $sql = "INSERT INTO `ambulance` (`a_number_plate`, `a_locaion`, `a_capacity`, `a_type`, `a_driver_name`, `a_driver_phone`, `a_driver_license`,`a_status`) 
        VALUES ('$no_plate', '$location', '$capacity', '$type', '$driver_name', '$driver_phone', '$dricer_lincese','Available');";
        
        $sql2 = "INSERT INTO `ambulance_call` (`a_number_plate`, `a_locaion`, `a_capacity`, `a_type`, `a_driver_name`, `a_driver_phone`, `a_driver_license`, `a_status`)
        VALUES ('$no_plate', '$location', '$capacity', '$type', '$driver_name', '$driver_phone', '$dricer_lincese', 'Available');";
        $result = mysqli_query($con,$sql);
        $result2 = mysqli_query($con,$sql2);
        
        if($result == true and $result2 == true){
            $t = 1;
        }
        header("Location: /MedHelp/ambulance_list.php");
        $con->close();
        exit();
    }
    
}
?>
<html>
<head>
    <title>Ambulance Entry</title>
    <link rel="stylesheet" href="Admin_ambulance.css">
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
        <img src = "img/Amb.png" class = "profile">
        <h1>Data Entry for Ambulance</h1>
        <form action="/MedHelp/ambulance_add.php" method="POST">
        <?php
            if ($a == 1) {
                echo "<p align='center'> <font color=red  size='3pt'>Please Enter The All Information!</font> </p>";
            }
            if($t== 1){
                echo "<p align='center'> <font color=green  size='3pt'>Successfully added!</font> </p>";
            } 
        ?>
        <p>Number Plate</p>
        <input type="text" name="no_plate" placeholder="Enter Number Plate">
        <br><br><p>Location</p>
        <input type="text" name="location" placeholder="Enter Location Name">
        <br><br><p>Capacity</p>
        <input type="text" name="capacity" placeholder="Enter Capacity">
        
        <br><br><br><p>ICU / NON-ICU</p><br>
        <div class="doc2">
            <p>ICU</p>
                    
            <div class="in2">
                <input type="radio" name="in1" value="ICU">
                <div class="docin">
                    <p>NON-ICU</p>
                </div>
                <input type="radio" name="in1" value="NON-ICU">
            </div>
        </div>
        
            
        <br><br><p>Driver Name</p>
        <input type="text" name="driver_name" placeholder="Enter Driver Name">
        <br><br><p>Driver's Phone Number</p>
        <input type="text" name="driver_phone" placeholder="Enter Driver's Phone Number">
        <br><br><p>Driving License</p>
        <input type="text" name="driver_license" placeholder="Enter Driving License">
        
           
        <br><br>
        <input type="submit" name="cadmin" value ="Submit">
        </form>
    </div>
    </div>
</body>
</html>