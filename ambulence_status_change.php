<?php
include '_dbconnect.php';
session_start();
$user_email = $_SESSION['email'];
$sql2 = "select user_id from user_account where user_email = '$user_email'";

$result2 = mysqli_query($con, $sql2);
$num2 = mysqli_num_rows($result2);
$user_id = "";
if ($num2 > 0) {
    if ($row = $result2->fetch_assoc()) {
        $user_id =  $row["user_id"];
    }
}

$t = 0;
$id = "";
$no_plate = "";
$location  = "";
$capacity = "";
$type = "";
$driver_name  = "";
$driver_phone = "";
$dricer_lincese = "";
$a_status = "";

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$ambulence_id = $queries['id'];
echo $ambulence_id;

$sql = "select * FROM ambulance WHERE a_id = $ambulence_id";
$result1 = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result1);

if ($num1 > 0) {
    if ($row = $result1->fetch_assoc()) {

        $no_plate = $row["a_number_plate"];
        $location  = $row["a_locaion"];
        $capacity = $row["a_capacity"];
        $type = $row["a_type"];
        $driver_name  = $row["a_driver_name"];
        $driver_phone = $row["a_driver_phone"];
        $dricer_lincese = $row["a_driver_license"];
        $a_status = $row["a_status"];;
    }
}
echo $a_status;
if ($a_status !=  "Not Available") {
    $sql3 = "INSERT INTO `ambulance_call` (`a_number_plate`, `a_locaion`, `a_capacity`, `a_type`, `a_driver_name`, `a_driver_phone`, `a_driver_license`, `a_status`, `user_email`, `user_id`,`am_id`)
    VALUES ('$no_plate', ' $location ', '$capacity ', '$type', '$driver_name', '$driver_phone', '$dricer_lincese', 'Not Available', '$user_email', '$user_id','$ambulence_id');";
    $result3 = mysqli_query($con, $sql3);
    if ($result3 == true) {
        echo $user_id;
        echo $user_email;
    }

    $sql = "update ambulance set a_status = 'Not Available' where a_id = $ambulence_id";
    $result = mysqli_query($con, $sql);
    if ($result == true) {
        $t = 1;
    }
    //echo $id;
    //echo $sql;
    $_SESSION['msg'] = "Ambulence booking successfully";
    header("Location: /MedHelp/ambulence_find.php");
    $con->close();
    exit();
} else {
    $_SESSION['msg'] = "Already  booked";
    header("Location: /MedHelp/ambulence_find.php");
}
