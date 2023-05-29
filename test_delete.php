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
$sql = "DELETE FROM test WHERE t_id = $id";
$result = mysqli_query($con, $sql);
echo $result;
if(!$result){
    $_SESSION['msg'] = " Can't delete, Ambulence is appointed with some patients";
}


$con->close();

header("Location: /MedHelp/test_list.php");
exit();
