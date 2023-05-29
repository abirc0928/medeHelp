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

$sql = "DELETE FROM test_table WHERE ss_id = $id";
$result = mysqli_query($con, $sql);

$con->close();

header("Location: /MedHelp/test_confirm.php");
exit();
