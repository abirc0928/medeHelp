<?php
$a = 0;
$check = 0;
session_start();
$t = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $m_name = $_POST['m_name'];
    $m_price = $_POST['m_price'];
    $m_generic = $_POST['m_generic'];
    $m_power = $_POST['m_power'];
    $m_quentity = $_POST['m_quentity'];

    if ($m_name == null) {
        $a = 1;
        $check = 1;
    }
    if ($m_price == null) {
        $a = 1;
        $check = 1;
    }
    if ($m_generic == null ) {
        $a = 1;
        $check = 1;
    }
    if ($m_power == null ) {
        $a = 1;
        $check = 1;
    }
    if ($m_quentity == null ) {
        $a = 1;
        $check = 1;
    }
    if ($check == 0) {
        $sql = "INSERT INTO `pharmacy` (`m_name`, `m_price`, `m_generic`, `m_power`,`m_quentity`) 
        VALUES ('$m_name', '$m_price', '$m_generic', '$m_power','$m_quentity');";
        $result = mysqli_query($con, $sql);
        if ($result == true) {
            $t = 1;
        }
        header("Location: /MedHelp/medicine_list.php");
        exit();
    }
    $con->close();
}
?>
<html>

<head>
    <title>Pharmacy Entry</title>
    <link rel="stylesheet" href="Admin_pharma.css">
</head>

<body>
    <div class="cover">
        <div class="bar">
            <img src="img/Logo.png" class="logo">
            <ul>
                <li><a href="Admin_home.php">Home</a></li>
                <li><a href="Admin_login.php"><img src="img/profile.png" class="logout"> Logout </a></li>
            </ul>
        </div>
        <div class="form">
            <img src="img/pharma.jpg" class="profile">
            <h1>Data Entry for Pharmacy</h1>
            <?php
            if ($a == 1) {
                echo "<p align='center'> <font color=red  size='3pt'>Please Enter The All Information!</font> </p>";
            }
            if ($t == 1) {
                echo "<p align='center'> <font color=green  size='3pt'>Successfully added!</font> </p>";
            }
            ?>
            <form action="/MedHelp/medicine_add.php" method="POST">
                <br><br>
                <p>Medicine Name</p>
                <input type="text" name="m_name" placeholder="Enter Medicine Name">
                <br><br>
                <p>Unit Price</p>
                <input type="text" name="m_price" placeholder="Enter Unit Price">
                <br><br>
                <p>Generic Name</p>
                <input type="text" name="m_generic" placeholder="Enter Generic Name">
                <br><br>
                <p>Power Level</p>
                <input type="text" name="m_power" placeholder="Enter Power Level">
                <p>Quantity</p>
                <input type="text" name="m_quentity" placeholder="Enter Quantity">

                <br><br>
                <input type="submit" name="cadmin" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>