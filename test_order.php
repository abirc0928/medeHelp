<?php
include '_dbconnect.php';
session_start();
$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$email = $_SESSION['email'];
$sql22 = "select user_id from user_account where user_email = '$email'";

$result22 = mysqli_query($con, $sql22);
$num22 = mysqli_num_rows($result22);
$user_id = "";

if ($num22 > 0) {
    while ($row = $result22->fetch_assoc()) {
        $user_id =  $row["user_id"];
    }
}
echo $user_id;

$sql = "select * FROM test WHERE t_id = '$id'";
$result1 = mysqli_query($con, $sql);
$num1 = mysqli_num_rows($result1);

$t_id = "";
$t_name = "";

$t_price = "";

if ($num1 > 0) {
    if ($row = $result1->fetch_assoc()) {
        $t_id = $row["t_id"];
        $t_name = $row["t_name"];

        $t_price = $row["t_price"];
    }
}

$sql15 = "INSERT INTO `test_table` (`t_id`, `t_name`, `t_price`, `user_id`, `user_email`)
     VALUES ('$t_id', '$t_name', '$t_price', ' $user_id', '$email');";
$result15 = mysqli_query($con, $sql15);
header("location: test.php");
