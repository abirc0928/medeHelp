<?php
include '_dbconnect.php';

session_start();
$a = 0;
$check = 0;
$t = 0;

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "DELETE FROM ambulance WHERE a_id = $id";
$sql1 = "DELETE FROM ambulance_call WHERE a_id = $id";
$result = mysqli_query($con, $sql);
$result1 = mysqli_query($con, $sql1);
if(!$result){
    $_SESSION['msg'] = " Can't delete, Ambulence is appointed with some patients";
}

$con->close();

header("Location: /MedHelp/ambulance_list.php");
exit();
