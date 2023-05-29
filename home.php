<html>

<head>
    <title>User Home</title>
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
        <br><br><br><br>
        <div class="text">
            <h1><b>WELCOME TO MEDHELP</b></h1>
            <p>One stop shop to meet all your medical needs.</p><br><br><br><br>
            <a href="doctor_appointment.php">
                <input type="submit" name="submit1" value="Take Appointment with Doctor"><br><br>
            </a>
            <a href="ambulence_find.php">
                <input type="submit" name="submit2" value="Hire an Ambulance"><br><br>
            </a>
            <a href="medicine_find.php">
                <input type="submit" name="submit3" value="Buy Medicine"><br><br>
            </a>
            <a href="test_find.php">
                <input type="submit" name="submit4" value="Do Medical Tests"><br><br>
            </a>
            <a href="medicine_order_table_show.php">
                <input type="submit" name="submit4" value="My Cart"><br><br>
            </a>
        </div>
    </div>

</body>

</html>