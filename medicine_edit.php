<?php
include '_dbconnect.php';
$a = 0;
$check = 0;
session_start();
$t = 0;
$id = "";
$m_name = "";
$m_price = "";
$m_generic = "";
$m_power = "";
$m_quentity = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $m_name = $_POST['m_name'];
    $m_price = $_POST['m_price'];
    $m_generic = $_POST['m_generic'];
    $m_power = $_POST['m_power'];
    $m_quentity = $_POST['m_quentity'];
    echo $id;
    if ($m_name == null) {
        $a = 1;
        $check = 1;
    }
    if ($m_price == null) {
        $a = 1;
        $check = 1;
    }
    if ($m_generic == null) {
        $a = 1;
        $check = 1;
    }
    if ($m_power == null) {
        $a = 1;
        $check = 1;
    }
    if ($check == 0) {
        $sql = "update pharmacy set m_name = '$m_name', m_price = '$m_price', m_generic= '$m_generic', m_power = '$m_power', m_quentity = '$m_quentity' where m_id = $id";

        $result = mysqli_query($con, $sql);
        if ($result == true) {
            $t = 1;
        }
        header("Location: /MedHelp/medicine_list.php");
        $con->close();
        exit();
    }
}

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);
$id = $queries['id'];

$sql = "select * FROM pharmacy WHERE m_id = $id";
$result1 = mysqli_query($con, $sql);

$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    if ($row = $result1->fetch_assoc()) {
        $m_name = $row["m_name"];
        $m_price = $row["m_price"];
        $m_generic = $row["m_generic"];
        $m_power = $row["m_power"];
        $m_quentity = $row["m_quentity"];
    }
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
            <form action="/MedHelp/medicine_edit.php" method="POST">
                <input hidden type="text" name="id" value="<?php echo $id ?>">
                <br><br>
                <p>Medicine Name</p>
                <input type="text" name="m_name" placeholder="Enter Medicine Name" value="<?php echo $m_name ?>">
                <br><br>
                <p>Unit Price</p>
                <input type="text" name="m_price" placeholder="Enter Unit Price" value="<?php echo $m_price ?>">
                <br><br>
                <p>Generic Name</p>
                <input type="text" name="m_generic" placeholder="Enter Generic Name" value="<?php echo $m_generic ?>">
                <br><br>
                <p>Power Level</p>
                <input type="text" name="m_power" placeholder="Enter Power Level" value="<?php echo $m_power ?>">
                <p>Quentity</p>
                <input type="text" name="m_quentity" placeholder="Enter Power Level" value="<?php echo $m_quentity?>">

                <br><br>
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>