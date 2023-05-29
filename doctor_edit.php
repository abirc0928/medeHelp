<?php

include '_dbconnect.php';

$a = 0;
$check = 0;
session_start();
$t = 0;

$id = "";
$name = "";
$degree = "";
$special = "";
$phone = "";
$time = "";
$off_day = "";
$hospital = "";
$location = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $special = $_POST['special'];
    $phone = $_POST['phone'];
    $time = $_POST['time'];
    $off_day = $_POST['off_day'];
    $hospital = $_POST['hospital'];
    $location = $_POST['location'];
    if ($name == null) {
        $a = 1;
        $check = 1;
    }
    if ($degree == null) {
        $a = 1;
        $check = 1;
    }
    if ($special == null) {
        $a = 1;
        $check = 1;
    }
    if ($phone == null) {
        $a = 1;
        $check = 1;
    }
    if ($off_day == null) {
        $a = 1;
        $check = 1;
    }
    if ($hospital == null) {
        $a = 1;
        $check = 1;
    }
    if ($location == null) {
        $a = 1;
        $check = 1;
    }
    if ($check == 0) {
        $sql = "update doctor_entry set d_name = '$name', d_degree = '$degree', d_specialization= '$special', d_phone = '$phone', d_time= '$time', d_off_day = '$off_day', d_hospital_name = '$hospital', d_hospital_locetion = '$location' where d_id = $id";
        $result = mysqli_query($con, $sql);
        if ($result == true) {
            $t = 1;
        }
        //echo $sql;
        header("Location: /MedHelp/doctor_list.php");
        $con->close();
        exit();
    }
}

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "select * FROM doctor_entry WHERE d_id = $id";
$result1 = mysqli_query($con, $sql);

$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    if ($row = $result1->fetch_assoc()) {
        $name = $row["d_name"];
        $degree =  $row["d_degree"];
        $special =  $row["d_specialization"];
        $phone =  $row["d_phone"];
        $time = $row["d_time"];
        $off_day =  $row["d_off_day"];
        $hospital =  $row["d_hospital_name"];
        $location =  $row["d_hospital_locetion"];
    }
}

$con->close();

?>

<html>

<head>
    <title>Doctor Entry</title>
    <link rel="stylesheet" href="Admin_doctor.css">
</head>

<body>
    <div class="cover">
    <?php
       
        ?>
        <div class="form">
            <img src="img/doctor.png" class="profile">
            <h1>Data Entry for Doctor</h1>
            <?php
            if ($a == 1) {
                echo "<p align='center'> <font color=red  size='3pt'>Please Enter The All Information!</font> </p>";
            }
            if ($t == 1) {
                echo "<p align='center'> <font color=green  size='3pt'>Successfully added!</font> </p>";
            }
            ?>
            <form action="/MedHelp/doctor_edit.php" method="POST">
                <input hidden type="text" name="id" value="<?php echo $id ?>">
                <br><br>
                <p>Doctor Name</p>
                <input type="text" name="name" placeholder="Enter Doctor Name" value="<?php echo $name ?>">
                <br><br>
                <p>Degree</p>
                <input type="text" name="degree" placeholder="Enter Degree" value="<?php echo $degree ?>">
                <br><br>
                <p>Specialization</p>
                <input type="text" name="special" placeholder="Enter Specialization" value="<?php echo $special ?>">
                <br><br>
                <p>Phone Number</p>
                <input type="text" name="phone" placeholder="Enter Phone Number" value="<?php echo $phone ?>">
                <br><br>
                <p>Time</p>
                <input type="time" name="time" placeholder="Enter Time" value="<?php echo $time ?>">
                <br><br>
                <p>Off-Day</p>
                <input type="text" name="off_day" placeholder="Enter off Day" value="<?php echo $off_day ?>">
                <br><br>
                <p>Hospital Name</p>
                <input type="text" name="hospital" placeholder="Enter Hospital Name" value="<?php echo $hospital ?>">
                <br><br>
                <p>Hospital Location</p>
                <input type="text" name="location" placeholder="Enter Hospital Location" value="<?php echo $location ?>">

                <br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>