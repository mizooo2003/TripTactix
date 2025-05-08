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
                    <h1 class="page-header">Dashboard</h1>
                </div>
            </div><!--/.row-->

            <div class="panel panel-container">
                <div class="row">

                    <?php
                    $sql = "select * from places_requests";
                    $result = $DB->query($sql) or die("failed to query".mysqli_error($DB));
                    $count = $result->num_rows;
                    ?>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-teal panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-plane fa-xl  color-blue"></em>
                                <div class="large"><?php echo $count; ?></div>
                                <div class="text-muted">Booking Requests</div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sql = "select * from feedback";
                    $result = $DB->query($sql) or die("failed to query".mysqli_error($DB));
                    $count = $result->num_rows;
                    ?>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-blue panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
                                <div class="large"><?php echo $count; ?></div>
                                <div class="text-muted">Messages</div>
                            </div>
                        </div>
                    </div>
                    <?php
                    $sql = "select * from users";
                    $result = $DB->query($sql) or die("failed to query".mysqli_error($DB));
                    $count = $result->num_rows;
                    ?>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-orange panel-widget border-right">
                            <div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
                                <div class="large"><?php echo $count; ?></div>
                                <div class="text-muted">Users</div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sql = "select * from transportations";
                    $result = $DB->query($sql) or die("failed to query".mysqli_error($DB));
                    $count = $result->num_rows;
                    ?>
                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-red panel-widget ">
                            <div class="row no-padding"><em class="fa fa-xl fa-map-marker fa-search color-red"></em>
                                <div class="large"><?php echo $count; ?></div>
                                <div class="text-muted">Transportations</div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sql = "select * from tourism_places";
                    $result = $DB->query($sql) or die("failed to query".mysqli_error($DB));
                    $count = $result->num_rows;
                    ?>

                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-red panel-widget ">
                            <div class="row no-padding"><em class="fa fa-xl fa-map-marker fa-search color-red"></em>
                                <div class="large"><?php echo $count; ?></div>
                                <div class="text-muted">Places</div>
                            </div>
                        </div>
                    </div>

                    <?php
                    $sql = "select * from cities";
                    $result = $DB->query($sql) or die("failed to query".mysqli_error($DB));
                    $count = $result->num_rows;
                    ?>

                    <div class="col-xs-6 col-md-3 col-lg-3 no-padding">
                        <div class="panel panel-red panel-widget ">
                            <div class="row no-padding"><em class="fa fa-xl fa-flag fa-search color-red"></em>
                                <div class="large"><?php echo $count; ?></div>
                                <div class="text-muted">Cities</div>
                            </div>
                        </div>
                    </div>

                </div><!--/.row-->
            </div>




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