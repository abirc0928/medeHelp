<?php
include '_dbconnect.php';

$a = 0;
$check = 0;
session_start();

$email = $_SESSION['email'];
$sql2 = "select user_id from user_account where user_email = '$email'";
$result2 = mysqli_query($con, $sql2);
$num2 = mysqli_num_rows($result2);
$user_id = "";
if ($num2 > 0) {
    if ($row = $result2->fetch_assoc()) {
        $user_id =  $row["user_id"];
    }
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

$sql11 = "INSERT INTO `test_table` (`t_id`, `t_name`, `t_price`, `user_id`, `user_email`, `t_status`)
 VALUES ('$id', '$name', '$price', '$user_id', '$email', 'Not Delivered');";
$r = mysqli_query($con,$sql11);

$_SESSION['msg'] = "Test added successfully";
header("Location: /MedHelp/test_find.php");
exit();