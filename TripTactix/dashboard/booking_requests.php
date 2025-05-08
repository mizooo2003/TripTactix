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
                    <h1 class="page-header">Booking Requests</h1>
                </div>
            </div><!--/.row-->

            <?php
            if(isset($_GET['delete']))
            {

            ?>

            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>Request Was Deleted Successfully</div>

            <?php
                header('refresh:4,url=booking_requests.php');
                ob_end_flush();
            }
            ?>
            
            
            <?php
            if(isset($_GET['approved']))
            {

            ?>

            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>Request Was approved Successfully</div>

            <?php
                header('refresh:4,url=booking_requests.php');
                ob_end_flush();
            }
            ?>




            <table class="table">
                <thead class="thead-dark" style="background-color:#343a40; color:white;">
                    <tr>
                        <th scope="col">Program Image</th>
                        <th scope="col">Program Title</th>
                        <th scope="col">Program Location</th>
                        <th scope="col">Check-in Date</th>
                        <th scope="col">Number Of Persons</th>
                        <th scope="col">Total</th>
                        <th scope="col">UserName</th>
                        <th scope="col">User E-mail</th>
                        <th scope="col">User Phone</th>
                        <th scope="col">Country</th>
                        <th scope="col">city</th>
                        <th scope="col">Requirements</th>
                        <th scope="col">Status</th>
                        <th scope="col">Approve</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT booking_requests.id, booking_requests.u_name, booking_requests.u_email, booking_requests.u_phone, booking_requests.country, booking_requests.city, booking_requests.req, booking_requests.persons_num, programs.img, programs.title, programs.location, (booking_requests.persons_num * programs.total) as total, booking_requests.date, booking_requests.u_id, booking_requests.status FROM booking_requests INNER JOIN programs on programs.id = booking_requests.program_id";
                    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));

                    while($row = $result->fetch_assoc()):
                    {

                    ?>

                    <tr>
                        <td><img src="functions/programs/<?php echo $row['img']; ?>" width="70" height="70"></td>
                        <td><?php echo $row['title']; ?></td>
                        <td><?php echo $row['location']; ?></td>
                        <td><?php echo $row['date']; ?></td>
                        <td><?php echo $row['persons_num']; ?></td>
                        <td><?php echo number_format($row['total']); ?> EGP</td>
                        <td><?php echo $row['u_name']; ?></td>
                        <td><?php echo $row['u_email']; ?></td>
                        <td><?php echo $row['u_phone']; ?></td>
                        <td><?php echo $row['country']; ?></td>
                        <td><?php echo $row['city']; ?></td>
                        <td style="white-space:pre;"><?php echo $row['req']; ?></td>
                        <td><?php echo $row['status']; ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="functions/approve_request.php?id=<?php echo $row['id']; ?>" class="trash">
                                    <em class="fa fa-check"></em>
                                </a>
                            </div>
                        </td>
                        <td>
                            <div class=" action-buttons">
                                <a href="functions/delete_request.php?id=<?php echo $row['id']; ?>" class="trash">
                                    <em class="fa fa-trash"></em>
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
        </div>	<!--/.main-->

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/chart.min.js"></script>
        <script src="js/chart-data.js"></script>
        <script src="js/easypiechart.js"></script>
        <script src="js/easypiechart-data.js"></script>
        <script src="js/bootstrap-datepicker.js"></script>
        <script src="js/custom.js"></script>
        <script>
            window.onload = function () {
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