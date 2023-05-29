<?php
include '_dbconnect.php';
$id = "";
session_start();
$check = 1;
$check2 = 1;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_id = $_POST['id'];
    $_q = $_POST['m_quentity'];
    $_P  = $_POST['price'];
    $per_qu = $_POST['pre_qu'];
    $t_q = $_POST['t_qu'];

    $total = ($_P*$_q );
    $sql11 = "UPDATE medicine_order_table SET m_querntity = '$_q' , m_price = '$total' WHERE m_id ='$_id';";
    $result11 = mysqli_query($con,$sql11);

    $total_quentity =$t_q;
    if($_q < $per_qu){
        $temp = $per_qu - $_q;
        $total_quentity = $total_quentity + $temp;
    }
    if($_q > $per_qu){
        $temp =$_q - $per_qu ;
        $total_quentity = $total_quentity - $temp;
    }
    $sql13 = "UPDATE pharmacy SET m_quentity = '$total_quentity'  WHERE m_id ='$_id';";
    $result13 = mysqli_query($con,$sql13);
   
    header("Location: /MedHelp/medicine_order_table_show.php");
   
}

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];
$_SESSION["m"] = $id;
$s2 = "select * from medicine_order_table where m_id = '$id'";
$r2 = mysqli_query($con,$s2);
$num1 = mysqli_num_rows($r2);
$qu = "";
$p = "";
$t_qu = "";

if ($num1 > 0) {
    if ($row = $r2->fetch_assoc()) {
        $qu = $row["m_querntity"];
    }
}

$s3 = "select * from pharmacy where m_id = '$id'";
$r3 = mysqli_query($con,$s3);
$num3 = mysqli_num_rows($r3);


if ($num3 > 0) {
    if ($row = $r3->fetch_assoc()) {
        
        $p = $row["m_price"];
        $t_qu =$row["m_quentity"];
        
    }
}

?>

<html>

<head>
    <title>Medicine Quantity</title>
    <link rel="stylesheet" href="quantity.css">
    <?php
    include('css.html');
    include('script.html');
    ?>
</head>

<body>
    <div class="cover">
        <?php
        include('header_user.html');
        ?>
        <div class="bar">
            <div class="row">
                <div class="col-md-12">

                </div>
            </div>

        </div>
        <div class="text">
            <form action="/MedHelp/medicine_user_edit.php" method="POST">
                <input hidden type="text" name="id" value="<?php echo $id ?>">
                <br><br><br><br><br><br>

                <?php
                if ($check2 == 0) {
                    echo "<p align='center'> <font color=red  size='3pt'>Please Enter The Quentity!</font> </p>";
                }
                ?>
                <div class="doc">
                    <input hidden type="text" name="id" value="<?php echo $id ?>">
                    <input hidden type="text" name="price" value="<?php echo $p ?>">
                    <input hidden type="text" name="pre_qu" value="<?php echo $qu ?>">
                    <input hidden type="text" name="t_qu" value="<?php echo $t_qu ?>">
                    <p>Medicine Quantity</p>
                    <br><input type="text" name="m_quentity" placeholder="Enter Medicine Quentity" value="<?php echo $qu ?>">
                </div>

                <br><br>
                <input type="submit" name="fd" value="Order ">
            </form>
        </div>
    </div>

</body>

</html>