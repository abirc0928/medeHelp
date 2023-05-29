<?php
include '_dbconnect.php';

session_start();
$a = 0;
$check = 0;
$t = 0;

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "DELETE FROM medicine_order_table WHERE s_id = $id";
$result = mysqli_query($con, $sql);

$con->close();

header("Location: /MedHelp/medicine_order_table_show.php");
exit();
