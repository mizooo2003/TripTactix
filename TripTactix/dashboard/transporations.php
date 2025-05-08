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
                <h1 class="page-header">ALL Transportations</h1>
            </div>
        </div><!--/.row-->

        <?php
        if (isset($_GET['delete'])) {

        ?>

            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>Transportation Was Deleted Successfully</div>

        <?php
            header('refresh:4,url=transporations.php');
            ob_end_flush();
        }
        ?>



        <table class="table">
            <thead class="thead-dark" style="background-color:#343a40; color:white;">
                <tr>
                    <th scope="col">Image</th>
                    <th scope="col">Type</th>
                    <th scope="col">City From</th>
                    <th scope="col">City To</th>
                    <th scope="col">Egyptians Ticket Price</th>
                    <th scope="col">Foreigners Ticket Price</th>
                    <th scope="col">Picking Time</th>
                    <th scope="col">Duration</th>
                    <th scope="col">Direction</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT transportations.id, transportations.city_image, transportations.foreign_ticket,
                 transportations.egyptian_ticket, transportations.duration, transportations.time_slot , 
                 transportations.direction, transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to
                 FROM transportations 
                 INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
                 INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
                 INNER JOIN transportation_types ON transportation_types.id = transportations.type_id;";
                $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

                while ($row = $result->fetch_assoc()): {

                ?>

                        <tr>
                            <td><img src="functions/places/<?php echo $row['city_image']; ?>" width="70" height="70"></td>
                            <td><?php echo $row['type_name']; ?></td>
                            <td><?php echo $row['city_from']; ?></td>
                            <td><?php echo $row['city_to']; ?></td>
                            <td><?php echo $row['egyptian_ticket']; ?> EGP</td>
                            <td><?php echo $row['foreign_ticket']; ?> EGP</td>
                            <td><?php echo date('h:i:s a', strtotime($row['time_slot'])) ?> </td>
                            <td><?php echo $row['duration']; ?> Hours</td>
                            <td><a target="_blank" href="<?php echo $row['direction']; ?>"><i class="fa fa-map-marker"></i> </a> </td>
                            <td>
                                <div class=" action-buttons">
                                    <a href="functions/delete_transportations.php?id=<?php echo $row['id']; ?>" class="trash">
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