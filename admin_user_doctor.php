<?php
include '_dbconnect.php';

session_start();


$sql1 = "SELECT d.* , u.user_name 
FROM doctor_appointment as d 
INNER JOIN user_account as u 
on d.user_email = u.user_email;";

$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);


$html = "";
if ($num1 > 0) {
    while ($row = $result1->fetch_assoc()) {


        $html = $html  . "<tr>" .
            '<form action="/MedHelp/ambulance_list.php" method="POST">' .
            "<td>" . $row["dorctor_name"] . "</td> " .
            "<td>" . $row["doctor_specialized"] . "</td> " .
            "<td>" . $row["doctor_hospital"] . "</td> " .
            "<td>" . $row["dr_location"] . "</td> " .
            "<td>" . $row["user_name"] . "</td> " .
            "<td>" . $row["user_email"] . "</td> " .
            "<td>" . $row["user_id"] . "</td> " .
            '</form>' .
            "</tr>";
    }
}



$con->close();
?>



<html>

<head>
    <title>Doctor Appointment</title>
    <?php
    include('css.html');
    include('script.html');
    ?>
</head>

<body>
    <div class="cover">
        <?php
        include('header.html');

        ?>
        <div class="container table-list">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <!-- <img src="img/doctor.png" class="rounded profile" alt="..."> -->
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6 float-left">
                    <h2 class="float-left">Doctor Appointment List</h2>
                </div>
                
            </div>

            <table id="table_id" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Doctor Name</th>
                    <th>Specialized In</th>
                    <th>Hospital</th>
                   
                   
                    <th>Location</th>
                    <th>User name</th>
                    <th>User Mail</th>
                    
                    <th>User Id</th>
                    
                    
                </thead>
                <tbody>
                    <?php
                    echo  $html
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            "scrollY": "580px",
        });
    });
</script>

</html>