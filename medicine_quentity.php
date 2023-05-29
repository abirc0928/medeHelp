<?php
include '_dbconnect.php';
$id = "";
session_start();
$check = 1;
$check2 = 1;



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $m = $_POST['m_quentity'];
    $_SESSION['m_q'] = $m;
    if ($m != null and $m != 0) {
        header("location: medicine_order.php");
    } else {
        $check2 = 0;
    }
    $check = 0;
}

if ($check == 1) {
    $queries = array();
    parse_str($_SERVER['QUERY_STRING'], $queries);
    $id = $queries['id'];
    $_SESSION["m"] = $id;
    
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
            <form action="/MedHelp/medicine_quentity.php" method="POST">
                <input hidden type="text" name="id" value="<?php echo $id ?>">
                <br><br><br><br><br><br>
                
                <?php
                if ($check2 == 0) {
                    echo "<p align='center'> <font color=red  size='3pt'>Please Enter The Quantity!</font> </p>";
                }
                ?>
                <div class="doc">
                    <p>Medicine Quantity</p>
                    <br><input type="text" name="m_quentity" placeholder="Enter Medicine Quantity">
                </div>

                <br><br>
                <input type="submit" name="fd" value="Order ">
            </form>
        </div>
    </div>

</body>

</html>