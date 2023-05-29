<?php
include '_dbconnect.php';

session_start();
$a = 0;
$check = 0;
$t = 0;

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];
echo $id;

$sql = "DELETE FROM doctor_entry WHERE d_id = '$id'";
$result = mysqli_query($con, $sql);
if(!$result){
    $_SESSION['msg'] = " Can't delete, doctor is appointed with some patients";
}

$con->close();

header("Location: /MedHelp/doctor_list.php");
exit();
