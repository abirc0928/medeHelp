<?php
include '_dbconnect.php'; 
$a = 0;
$check = 0;
session_start();
$t = 0;
$id = "";
$no_plate = "";
$location  = "";
$capacity = "";
$type = "";
$driver_name  = "";
$driver_phone = "";
$dricer_lincese = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['id'];
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
        $sql = "update ambulance set a_number_plate	 = '$no_plate', a_locaion = '$location', a_capacity= '$capacity', a_type = '$type', a_driver_name= '$driver_name', 	a_driver_phone = '$driver_phone', 	a_driver_license = '$dricer_lincese' where a_id = $id";
        $result = mysqli_query($con, $sql);
        if ($result == true) {
            $t = 1;
        }
        //echo $id;
        //echo $sql;
        header("Location: /MedHelp/ambulance_list.php");
        $con->close();
        exit();
    }
    
}

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "select * FROM ambulance WHERE a_id = $id";
$result1 = mysqli_query($con, $sql);

$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    if ($row = $result1->fetch_assoc()) {
        $no_plate = $row["a_number_plate"];
        $location  = $row["a_locaion"];
        $capacity = $row["a_capacity"];
        $type = $row["a_type"];
        $driver_name  = $row["a_driver_name"];
        $driver_phone = $row["a_driver_phone"];
        $dricer_lincese = $row["a_driver_license"];;
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
        <form action="/MedHelp/ambulance_edit.php" method="POST">
        <input hidden type="text" name="id" value="<?php echo $id ?>">
        <?php
            if ($a == 1) {
                echo "<p align='center'> <font color=red  size='3pt'>Please Enter The All Information!</font> </p>";
            }
            if($t== 1){
                echo "<p align='center'> <font color=green  size='3pt'>Successfully added!</font> </p>";
            } 
        ?>
        <p>Number Plate</p>
        <input type="text" name="no_plate" placeholder="Enter Number Plate" value="<?php echo $no_plate ?>">
        <br><br><p>Location</p>
        <input type="text" name="location" placeholder="Enter Location Name"value="<?php echo $location ?>">
        <br><br><p>Capacity</p>
        <input type="text" name="capacity" placeholder="Enter Capacity"value="<?php echo $capacity ?>">
        
        <br><br><br><p>ICU / NON-ICU</p><br>
        <div class="doc2">
            <p>ICU</p>
                    
            <div class="in2">
                <input type="radio" name="in1" value="ICU">
                <div class="docin">
                    <p>NON-ICU</p>
                </div>
                <input type="radio" name="in1" value="NON ICU">
            </div>
        </div>
        
            
        <br><br><p>Driver Name</p>
        <input type="text" name="driver_name" placeholder="Enter Driver Name"value="<?php echo $driver_name ?>">
        <br><br><p>Driver's Phone Number</p>
        <input type="text" name="driver_phone" placeholder="Enter Driver's Phone Number"value="<?php echo $driver_phone ?>">
        <br><br><p>Driving License</p>
        <input type="text" name="driver_license" placeholder="Enter Driving License"value="<?php echo $dricer_lincese ?>">
           
        <br><br>
        <input type="submit" value ="Submit">
        </form>
    </div>
    </div>
</body>
</html>