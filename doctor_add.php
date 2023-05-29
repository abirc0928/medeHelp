<?php
$a = 0;
$check = 0;
session_start();
$t = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $name = $_POST['name'];
    $degree = $_POST['degree'];
    $special = $_POST['special'];
    $phone = $_POST['phone'];
    $time = $_POST['time'];
    $off_day = $_POST['off_day'];
    $hospital = $_POST['hospital'];
    $location = $_POST['location'];
    if ($name == null) {
        $a = 1;
        $check = 1;
    }
    if ($degree == null) {
        $a = 1;
        $check = 1;
    }
    if ($special == null) {
        $a = 1;
        $check = 1;
    }
    if ($phone == null) {
        $a = 1;
        $check = 1;
    }
    if ($off_day == null) {
        $a = 1;
        $check = 1;
    }
    if ($hospital == null) {
        $a = 1;
        $check = 1;
    }
    if ($location == null) {
        $a = 1;
        $check = 1;
    }
    if ($check == 0) {
        $sql = "INSERT INTO `doctor_entry` (`d_name`, `d_degree`, `d_specialization`, `d_phone`, `d_time`, `d_off_day`, `d_hospital_name`, `d_hospital_locetion`)
        VALUES ('$name', '$degree', '$special', '$phone', '$time', '$off_day', '$hospital', '$location');";
        $result = mysqli_query($con, $sql);
        if ($result == true) {
            $t = 1;
        }
        header("Location: /MedHelp/doctor_list.php");
        exit();
    }
    $con->close();
}
?>

<html>

<head>
    <title>Doctor Entry</title>
    <link rel="stylesheet" href="Admin_doctor.css">
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
        <?php
        //include('header.html');
        ?>
        <div class="form">
            <img src="img/doctor.png" class="profile">
            <h1>Data Entry for Doctor</h1>
            <?php
            if ($a == 1) {
                echo "<p align='center'> <font color=red  size='3pt'>Please Enter The All Information!</font> </p>";
            }
            if ($t == 1) {
                echo "<p align='center'> <font color=green  size='3pt'>Successfully added!</font> </p>";
            }
            ?>
            <form action="/MedHelp/doctor_add.php" method="POST">
                <br><br>
                <p>Doctor Name</p>
                <input type="text" name="name" placeholder="Enter Doctor Name">
                <br><br>
                <p>Degree</p>
                <input type="text" name="degree" placeholder="Enter Degree">
                <br><br>
                <p>Specialization</p>
                <input type="text" name="special" placeholder="Enter Specialization">
                <br><br>
                <p>Phone Number</p>
                <input type="text" name="phone" placeholder="Enter Phone Number">
                <br><br>
                <p>Time</p>
                <input type="time" name="time" placeholder="Enter Time">
                <br><br>
                <p>Off-Day</p>
                <input type="text" name="off_day" placeholder="Enter off Day">
                <br><br>
                <p>Hospital Name</p>
                <input type="text" name="hospital" placeholder="Enter Hospital Name">
                <br><br>
                <p>Hospital Location</p>
                <input type="text" name="location" placeholder="Enter Hospital Location">

                <br><br>
                <input type="submit" name="cadmin" value="Submit">
            </form>
        </div>
    </div>
</body>

</html>