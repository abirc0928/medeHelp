<?php
include '_dbconnect.php';
$check = 0;
session_start();
$msg = $_SESSION['msg'];
$_SESSION['msg'] = null;
if ($msg == 'Ambulence booking successfully') {
    $check = 1;
}
$sql1 = "SELECT * FROM `ambulance` ";

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
            "<td>" . $row["a_status"] . "</td> " .
            '<td>' .
            '<a class="btn btn-primary" href="/Medhelp/ambulence_status_change.php?id=' . $row["a_id"] . '">Book</a> ' .
            '</td>' .
            '</form>' .
            "</tr>";
    }
}


$con->close();
?>



<html>

<head>
    <title>Ambulance List</title>
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
                <?php if ($check == 1) { ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="alert alert-success" role="alert">
                                <?php echo $msg ?>
                            </div>
                        </div>

                    </div>
                <?php } ?>
                <?php if ($check == 0){ ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="alert alert-danger" role="alert">
                                <?php echo $msg ?>
                            </div>
                        </div>

                    </div>
                <?php } ?>
            <?php } ?>

            <div class="row">

                <div class="col-md-6 float-left">
                    <h2 class="float-left">Ambulance List</h2>
                </div>

            </div>

            <table id="table_id" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Number Plate</th>
                    <th>Location </th>
                    <th>Type</th>
                    <th>Driver Name </th>
                    <th>Driver Phone </th>
                    <th>Status</th>
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