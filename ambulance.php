<?php
session_start();
$t = $_SESSION["email"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $location = $_POST['location'];
    $_SESSION['location'] = $location;
    header("location: ambulence_find.php");
    
}
?>
<html>

<head>
    <title>Find Ambulance</title>
    <link rel="stylesheet" href="ambulance.css">
</head>

<body>
    <div class="cover">
        <div class="bar">
            <img src="img/Logo.png" class="logo">
            <ul>
                <li><a href="home.php">Home</a></li>
                <li><a href="doctor.php">Doctor</a></li>
                <li><a href="ambulance.php">Ambulance</a></li>
                <li><a href="pharma.php">Pharmacy</a></li>
                <li><a href="test.php">Medical Test</a></li>
                <li><a href="login.php"><img src="img/profile.png" class="logout"> Logout </a></li>
            </ul>
        </div>
        <div class="text">

            <br><br><br><br><br>
            <h1>ONE CALL THAT CAN SAVE A LIFE</h1><br>
            <p>Delivering the best in any emergency.</p><br>
            <form action="/MedHelp/ambulance.php" method="POST">
                <div class="doc">
                    <br><br><br>
                    <p>Location</p>
                    <br><input type="text" name="location" placeholder="Enter Location">
                </div>

                <br>
                <input type="submit" name="fd" value="Find Ambulance">
        </div>
        </from>
    </div>
</body>

</html>