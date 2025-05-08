<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datepicker3.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>

<body>
    <?php include('header.php') ?>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="index.php">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Dashboard</li>
            </ol>
        </div><!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Transportations Requests</h1>
            </div>
        </div><!--/.row-->

        <?php
        if (isset($_GET['delete'])) {

        ?>

            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>Request Was Deleted Successfully</div>

        <?php
            header('refresh:4,url=transportations_requests.php');
            ob_end_flush();
        }
        ?>



        <table class="table">
            <thead class="thead-dark" style="background-color:#343a40; color:white;">
                <tr>
                    <th scope="col">Place Image</th>
                    <th scope="col">Transportation Type</th>
                    <th scope="col">City From</th>
                    <th scope="col">City To</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Time Slot</th>
                    <th scope="col">User Image</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Email</th>
                    <th scope="col">User Phone</th>
                    <th scope="col">User Address</th>
                    <th scope="col">Ticket Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col">Request Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT transportation_requests.id, users.image, users.name, users.email,
                 users.phone, users.address, transportations.city_image, transportations.duration,
                 transportations.time_slot, 
                  transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to,
                  transportation_requests.ticket_price, transportation_requests.qty,
                   transportation_requests.req_date, transportation_requests.status 
                   from transportation_requests 
                   INNER JOIN users on users.id = transportation_requests.user_id 
                    INNER JOIN transportations on transportations.id = transportation_requests.transportation_id 
                  INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
                INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
                INNER JOIN transportation_types ON transportation_types.id = transportations.type_id";
                $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

                while ($row = $result->fetch_assoc()): {

                ?>

                        <tr>
                            <td><img src="functions/places/<?php echo $row['city_image']; ?>" width="70" height="70"></td>
                            <td><?php echo $row['type_name']; ?></td>
                            <td><?php echo $row['city_from']; ?></td>
                            <td><?php echo $row['city_to']; ?></td>
                            <td><?php echo $row['duration']; ?></td>
                            <td><?php echo date('h:i:s a', strtotime($row['time_slot'])) ?></td>
                            <td><img src="../func/users/<?php echo $row['image']; ?>" width="70" height="70"></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['ticket_price']; ?> EGP</td>
                            <td><?php echo $row['qty']; ?></td>
                            <td><?php echo number_format( $row['qty'] * $row['ticket_price']); ?> EGP</td>

                            <td><?php echo date('d/m/y h:i:s a', strtotime($row['req_date']))  ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <div class=" action-buttons">
                                    <a href="functions/delete_transportation_request.php?id=<?php echo $row['id']; ?>" class="trash">
                                        <em class="fa fa-trash"></em>
                                    </a>
                                </div>
                                <div class="action-buttons">
                                    <a href="functions/update_trans_request.php?id=<?php echo $row['id']; ?>" class="trash">
                                        <em class="fa fa-check"></em>
                                    </a>
                                </div>
                            </td>
                        </tr>

                <?php
                    }
                endwhile;
                ?>

            </tbody>
        </table>







        <div class="row">





        </div><!--/.row-->
    </div> <!--/.main-->

    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/chart.min.js"></script>
    <script src="js/chart-data.js"></script>
    <script src="js/easypiechart.js"></script>
    <script src="js/easypiechart-data.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/custom.js"></script>
    <script>
        window.onload = function() {
            var chart1 = document.getElementById("line-chart").getContext("2d");
            window.myLine = new Chart(chart1).Line(lineChartData, {
                responsive: true,
                scaleLineColor: "rgba(0,0,0,.2)",
                scaleGridLineColor: "rgba(0,0,0,.05)",
                scaleFontColor: "#c5c7cc"
            });
        };
    </script>

</body>

</html>