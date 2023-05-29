<?php
include '_dbconnect.php';
session_start();
$q = $_SESSION['m_q'];


    $email = $_SESSION['email'];
    $sql2 = "select user_id from user_account where user_email = '$email'";
    $user_id = "";
    $result2 = mysqli_query($con, $sql2);
    $num2 = mysqli_num_rows($result2);
    $user_id = "";

    if ($num2 > 0) {
        while ($row = $result2->fetch_assoc()) {
            $user_id =  $row["user_id"];
        }
    }

    $id = $_SESSION['m'];
    echo $id;
    $sql = "select * FROM pharmacy WHERE m_id = '$id'";
    $result1 = mysqli_query($con, $sql);
    $num1 = mysqli_num_rows($result1);

    $m_name = "";
    $m_power = "";
    $m_quentity = "";
    $m_price = "";

    if ($num1 > 0) {
        if ($row = $result1->fetch_assoc()) {

            $m_name = $row["m_name"];
            $m_power = $row["m_power"];
            $m_price = $row["m_price"];
            $m_quentity = $row["m_quentity"];
        }
    }
    echo $m_name;
    $q = $_SESSION['m_q'];
    $t = ($q*$m_price);
    if($q<=$m_quentity){
        $sql10 = "INSERT INTO `medicine_order_table` ( `m_id`, `m_name`, `m_power`, `m_querntity`, `m_price`, `user_id`, `user_email`) 
        VALUES ('$id', '$m_name', '$m_power', '$q', '$t', '$user_id', '$email');";
        $result10 = mysqli_query($con, $sql10);
        if($result10 == true){
            $Update_quentity = $m_quentity - $q;
           
            $sql11 = "UPDATE pharmacy SET m_quentity = '$Update_quentity' WHERE m_id ='$id';";
            $result11 = mysqli_query($con,$sql11);
        }
    }
    $s = "SELECT SUM(m_price)as t FROM `medicine_order_table` WHERE user_id = $user_id";
    $r =  mysqli_query($con, $s);
    $st = "";
    while ($row = $r->fetch_assoc()) {
        $st =  $row["t"];
    }
   
    header("location: medicine_order_table_show.php");
    