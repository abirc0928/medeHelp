<?php
include '_dbconnect.php';

session_start();

$sql1 = "SELECT * FROM `pharmacy`";

$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);


$html = "";
if ($num1 > 0) {
    while ($row = $result1->fetch_assoc()) {


        $html = $html  . "<tr>" .
            '<form action="/MedHelp/ambulance_list.php" method="POST">' .
            '<td><input hidden type="text" name="id" placeholder="Enter Doctor ID" value="' . $row["m_id"] . '">' . $row["m_name"] . " </td>" .
            "<td>" . $row["m_power"] . "</td>" .
            "<td>" . $row["m_generic"] . "</td> " .
            "<td>" . $row["m_price"] . "</td> " .

            '<td>' .
            '<a class="btn btn-primary" href="/Medhelp/medicine_quentity.php?id=' . $row["m_id"] . '">Add to cart</a> ' .
            '</td>' .
            '</form>' .
            "</tr>";
    }
}



$con->close();
?>



<html>

<head>
    <title>Medicine List</title>
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
            <div class="row">

                <div class="col-md-6 float-left">
                    <h2 class="float-left">Medicine List</h2>
                </div>
            </div>

            <table id="table_id" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Medicine Name</th>
                    <th>Power level</th>
                    <th>Generic Name</th>
                    <th>Price per unit</th>
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