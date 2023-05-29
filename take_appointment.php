<?php
include '_dbconnect.php';

session_start();
$user_email = $_SESSION["email"];


$sq = "SELECT user_id FROM `user_account` WHERE user_email = '$user_email'";
$result1 = mysqli_query($con, $sq);
$num1 = mysqli_num_rows($result1);


$user_id = '';
if ($num1 > 0) {
    while ($row = $result1->fetch_assoc()) {
        $user_id = $row['user_id'];
    }
}

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$d_id = $queries['id'];


$sq1 = "SELECT * FROM `doctor_entry` WHERE d_id = '$d_id'";
$result2 = mysqli_query($con, $sq1);
$num2 = mysqli_num_rows($result2);


$d_name = "";
$d_sp = "";
$d_h = "";
$d_l = "";



if ($num2 > 0) {
    while ($row = $result2->fetch_assoc()) {
       
        $d_name = $row["d_name"];
        $d_sp = $row["d_specialization"];
        $d_h = $row["d_hospital_name"];
        $d_l = $row["d_hospital_locetion"];
    }
}


$sql = "INSERT INTO `doctor_appointment` (`dr_id`, `dorctor_name`, `doctor_specialized`, `doctor_hospital`, `dr_location`, `user_email`, `user_id`)
VALUES ('$d_id', '$d_name', '$d_sp', '$d_h', '$d_l', '$user_email', ' $user_id');";
$result55 = mysqli_query($con, $sql);

$con->close();

$_SESSION['msg'] = "Appointemnt added successfully";

header("Location: /MedHelp/doctor_appointment.php");
exit();
