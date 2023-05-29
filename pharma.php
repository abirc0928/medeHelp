<?php
session_start();
if(isset($_POST['button1'])) {
    
    header("location: medicine_order_table_show.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $medi_name = $_POST['medicine_name'];
    $_SESSION['medicine_name'] = $medi_name;
    if ($medi_name != null) {
        header("location: medicine_find.php");
    }
}

?>

<html>

<head>
    <title>Find Medicine</title>
    <link rel="stylesheet" href="pharma.css">
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
            <form action="/MedHelp/pharma.php" method="POST">
                <br><br><br><br><br><br>
                <h1>THE PHARMACY YOU CAN TRUST</h1><br>
                <p>For every patient's need.</p><br><br><br><br>
                <div class="doc">
                    <p>Medicine Name</p>
                    <br><input type="text" name="medicine_name" placeholder="Enter Medicine Name">
                </div>

                <br><br>
                <input type="submit" name="fd" value="Find Medicine"><br><br>
                <input type="submit" name="button1" value="Confrom order" />
            </form>
        </div>
    </div>

</body>

</html>