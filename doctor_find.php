<?php
include '_dbconnect.php';
session_start();
$t = $_SESSION["email"];
echo $t;

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $location = $_POST['loc'];
    $Specialization = $_POST['sp'];
    $_SESSION["location"] = $location;
    $_SESSION["Specialization"] = $Specialization;

    header("Location: /MedHelp/doctor_appointment.php");
}
    
?>
<html>
<head>
    <title>Doctor</title>
    <link rel="stylesheet" href="doctor.css">
</head>
<body>
    <div class= "cover">
    <div class="bar">
            <img src ="img/Logo.png" class ="logo">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="doctor.php">Doctor</a></li>
                <li><a href="ambulance.php">Ambulance</a></li>
                <li><a href="pharma.php">Pharmacy</a></li>
                <li><a href="test.php">Medical Test</a></li>
                <li><a href="login.php"><img src ="img/profile.png" class ="logout"> Logout </a></li>
            </ul>
        </div> 
        <div class="text">
            <form action="/MedHelp/doctor_find.php" method="POST">
            <br><br><br><br><h1>FIND DOCTOR AT YOUR COMFORT ZONE</h1><br>
            <p>Excellent care from expertise, close to you.</p><br><br><br><br>
            <div class="doc">
            <p>Location</p>
            <br><input type="text" name="loc" placeholder="Enter Location">
            </div>
            <div class="doc2">
            <p><br>Specialization</p>
            <br><input type="text" name="sp" placeholder="Enter Specialization"><br><br>
            <input type="submit" value ="Find Doctor">
            </div>
            </form>
        </div>
    </div>
   
</body>
</html>