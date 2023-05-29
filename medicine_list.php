<?php
include '_dbconnect.php';

$a = 0;
$check = 0;
session_start();
$t = 0;
$msg = $_SESSION['msg'];
$_SESSION['msg'] = null;


$sql1 = "SELECT *  FROM pharmacy";

$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    while ($row = $result1->fetch_assoc()) {
        $html = $html  . "<tr>" .
            '<form action="/MedHelp/medicine_list.php" method="POST">' .
            '<td><input hidden type="text" name="id" placeholder="Enter Doctor ID" value="' . $row["m_id"] . '">' . $row["m_name"] . " </td>" .
            "<td>" . $row["m_price"] . "</td>" .
            "<td>" . $row["m_generic"] . "</td> " .
            "<td>" . $row["m_power"] . "</td> " .
            "<td>" . $row["m_quentity"] . "</td> " .
            '<td>' .
            '<a class="btn btn-primary" href="/Medhelp/medicine_edit.php?id=' . $row["m_id"] . '">Edit</a> ' .
            '<a class="btn btn-danger" href="/Medhelp/medicine_delete.php?id=' . $row["m_id"] . '">Delete</a> ' .
            '</td>'  .
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
    <div class=" cover">
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
                    <h2 class="float-left">Medicine List</h2>
                </div>
                <div class="col-md-6 ">
                    <a href="medicine_add.php" class="btn btn-success float-right">
                        Add Medicine
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <table id="table_id" class="table table-striped table-bordered table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Generic</th>
                            <th>Power</th>
                            <th>Quentity</th>
                            <th>Actions</th>
                        </thead>
                        <tbody>
                            <?php
                            echo  $html
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
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