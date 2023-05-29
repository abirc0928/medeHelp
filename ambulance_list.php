<?php
include '_dbconnect.php';

$a = 0;
$check = 0;
session_start();
$t = 0;

$msg = $_SESSION['msg'];
$_SESSION['msg'] = null;

$sql1 = "SELECT *  FROM ambulance";

$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    while ($row = $result1->fetch_assoc()) {
        $html = $html  . "<tr>" .
            '<form action="/MedHelp/ambulance_list.php" method="POST">' .
            '<td><input hidden type="text" name="id" placeholder="Enter Doctor ID" value="' . $row["a_id"] . '">' . $row["a_number_plate"] . " </td>" .
            "<td>" . $row["a_locaion"] . "</td>" .
            "<td>" . $row["a_type"] . "</td> " .
            "<td>" . $row["a_driver_name"] . "</td> " .
            "<td>" . $row["a_driver_phone"] . "</td> " .
            '<td>' .
            '<a class="btn btn-primary" href="/Medhelp/ambulance_edit.php?id=' . $row["a_id"] . '">Edit</a> ' .
            '<a class="btn btn-danger" href="/Medhelp/ambulance_delete.php?id=' . $row["a_id"] . '">Delete</a> ' .
            '</td>' .
            '</form>' .
            "</tr>";
    }
}


$con->close();
?>



<html>

<head>
    <title>Ambulance list</title>
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
            <?php if ($msg) { ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-danger" role="alert">
                            <?php echo $msg ?>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <div class="row">

                <div class="col-md-6 float-left">
                    <h2 class="float-left">Ambulance List</h2>
                </div>
                <div class="col-md-6 ">
                    <a href="ambulance_add.php" class="btn btn-success float-right">
                        Add Ambulance
                    </a>
                </div>
            </div>

            <table id="table_id" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Number Plate</th>
                    <th>Location </th>
                    <th>Type</th>
                    <th>Driver Name </th>
                    <th>Driver Phone </th>
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