<?php
include '_dbconnect.php';

$a = 0;
$check = 0;
session_start();

$msg = $_SESSION['msg'];
$_SESSION['msg'] = null;


$t = 0;



$sql1 = "SELECT * FROM doctor_entry";

$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    while ($row = $result1->fetch_assoc()) {
        $html = $html  . "<tr>" .
            '<form action="/MedHelp/doctor_list.php" method="POST">' .
            '<td><input hidden type="text" name="id" placeholder="Enter Doctor ID" value="' . $row["d_id"] . '">' . $row["d_name"] . " </td>" .
            "<td>" . $row["d_degree"] . "</td>" .
            "<td>" . $row["d_specialization"] . "</td> " .
            "<td>" . $row["d_phone"] . "</td>" .
            "<td>" . $row["d_time"] . "</td> " .
            "<td>" . $row["d_off_day"] . "</td>" .
            "<td>" . $row["d_hospital_name"] . "</td> " .
            "<td>" . $row["d_hospital_locetion"] . "</td> " .
            '<td>' .
            '<a class="btn btn-primary" href="/Medhelp/take_appointment.php?id=' . $row["d_id"] . '">Take appoinment</a> ' .
            '</td>' .
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
        include('header_user.html');
        ?>
        <div class="container table-list">

            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <!-- <img src="img/doctor.png" class="rounded profile" alt="..."> -->
                    </div>
                </div>
            </div>

            <?php if ($msg) { ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            <?php echo $msg ?>
                        </div>
                    </div>

                </div>
            <?php } ?>


            <div class="row">

                <div class="col-md-6 float-left">
                    <h2 class="float-left">Doctors List</h2>
                </div>
            </div>
            <table id="table_id" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Name</th>
                    <th>Degree</th>
                    <th>Specialized In</th>
                    <th>Phone </th>
                    <th>Time</th>
                    <th>Off Day</th>
                    <th>Hospital Name</th>
                    <th>Location</th>
                    <th>Action</th>
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