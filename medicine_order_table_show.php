<?php
include '_dbconnect.php';

$a = 0;
$check = 0;
session_start();

$queries = array();
parse_str($_SERVER['QUERY_STRING'], $queries);

$email = $_SESSION['email'];

$type = null;
if(sizeof($queries) > 0 && $queries['type'] != null) {
    $type = $queries['type'];
}



if ( $type != null && $type == 'confirm_order') {
    $sql11 = "UPDATE medicine_order_table SET status = 'not delivered' WHERE user_email ='$email';";
    $result11 = mysqli_query($con, $sql11);
    $check = 1;
   // header("location: home.php");
}


$ss = "SELECT SUM(m_price)as t FROM `medicine_order_table` WHERE user_email = '$email'";
$rr = mysqli_query($con, $ss);
$total = "";
while ($row = $rr->fetch_assoc()) {
    $total =  $row["t"];
}

$sql1 = "SELECT *  FROM medicine_order_table where user_email = '$email'";

$result1 = mysqli_query($con, $sql1);
$num1 = mysqli_num_rows($result1);
$html = "";

if ($num1 > 0) {
    while ($row = $result1->fetch_assoc()) {
        $html = $html  . "<tr>" .
            '<form action="/MedHelp/medicine_list.php" method="POST">' .
            '<td><input hidden type="text" name="id" placeholder="Enter Doctor ID" value="' . $row["s_id"] . '">' . $row["m_name"] . " </td>" .
            "<td>" . $row["m_power"] . "</td>" .
            "<td>" . $row["m_querntity"] . "</td> " .
            "<td>" . $row["m_price"] . "</td> " .
            '<td>' .
            '<a class="btn btn-primary" href="/Medhelp/medicine_user_edit.php?id=' . $row["m_id"] . '">Edit</a> ' .
            '<a class="btn btn-danger" href="/Medhelp/medicine_user_delete.php?id=' . $row["s_id"] . '">Delete</a> ' .
            '</td>'  .
            '</form>' .
            "</tr>";
    }
}


$con->close();
?>



<html>

<head>
    <title>Doctor Delete</title>
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
            <?php if ($check == 1) { ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="alert alert-success" role="alert">
                            <?php echo "Your Order has been confirmed" ?>
                        </div>
                    </div>

                </div>
            <?php } ?>
            <div class="row">

                <div class="col-md-6 float-left">
                    <h2 class="float-left">My Cart</h2>
                </div>

                <div class="col-md-4">
                    <p class="float-right"><strong>Total Cost: <?php echo  $total; ?></strong></p>
                </div>

                <div class="col-md-2 ">
                    <a href="medicine_order_table_show.php?type=confirm_order" class="btn btn-success float-right">
                        Confirm order
                    </a>
                </div>

            </div>

            <table id="table_id" class="table table-striped table-bordered table-hover">
                <thead>
                    <th>Name</th>
                    <th>Power</th>
                    <th>Quentity</th>
                    <th>Price</th>
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
</body>

<script>
    $(document).ready(function() {
        $('#table_id').DataTable({
            "scrollY": "580px",
        });
    });
</script>

</html>