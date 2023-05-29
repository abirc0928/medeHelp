<?php
include '_dbconnect.php';
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $id = $queries['id'];
    $sql = "update medicine_order_table set status = 'Delivered' where s_id = '$id'";
    $re  = mysqli_query($con,$sql);
    header("Location: /MedHelp/admin_user_medicine.php");
?>