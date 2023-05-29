<?php
include '_dbconnect.php';
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $id = $queries['id'];
    $sql = "update test_table set t_status = 'Delivered' where ss_id = '$id'";
    $re  = mysqli_query($con,$sql);
    header("Location: /MedHelp/admin_uesr_test.php");
?>