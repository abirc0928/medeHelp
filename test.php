<?php
session_start();
if (isset($_POST['button1'])) {

    header("location: test_confirm.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include '_dbconnect.php';
    $test_name = $_POST['test_name'];
    $_SESSION['test_name'] = $test_name;
    echo $test_name;
    if ($test_name != null) {
        header("location: test_find.php");
    }
}

?>

<html>

<head>
    <title>Medical Test</title>
    <link rel="stylesheet" href="test.css">
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
            <form action="/MedHelp/test.php" method="POST">
                <h1>LAB TEST AT YOUR DOORSTEP</h1><br>
                <p>A guarantee of 100% quality.</p><br><br><br><br>
                <div class="doc">
                    <p>Test Name</p>
                    <br><input type="text" name="test_name" placeholder="Enter Test Name">
                </div>
                <div class="doc2">
                    <br><br>
                    <input type="submit" name="fd" value="Find Test"><br><br>
                    <input type="submit" name="button1" value="Confirm order" />
                </div>
            </form>
        </div>
    </div>

</body>

</html>