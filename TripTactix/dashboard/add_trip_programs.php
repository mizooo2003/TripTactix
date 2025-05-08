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
                <h1 class="page-header">Add Trip Programs</h1>
            </div>
        </div><!--/.row-->

        <?php
        if (isset($_GET['success'])) {

        ?>

            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>A New Program Was Added Successfully</div>

        <?php
            header('refresh:4,url=add_trip_programs.php');
            ob_end_flush();
        }
        ?>









        <div class="row">

            <div class="row">
                <div class="col-md-offset-1 col-sm-10">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">Add New Program</div>
                        <div class="panel-body">
                            <form role="form" method="post" action="functions/add_program_func.php" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="Program Title"
                                            name="program_title" type="text" required>
                                    </div>

                                    <div class="form-group">



                                        <select class="form-control" name="place" required>
                                            <option value="">Select Tourism Place</option>
                                            <?php

                                            $sql = "select * from tourism_places";
                                            $result = $DB->query($sql);
                                            while ($row = $result->fetch_assoc()): {

                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['title']; ?></option>
                                            <?php
                                                }
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>

                                    <div class="form-group">

                                        <select class="form-control" name="guide" required>
                                            <option value="">Select Tour Guide</option>
                                            <?php

                                            $sql = "select * from tour_guides";
                                            $result = $DB->query($sql);
                                            while ($row = $result->fetch_assoc()): {

                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['guide_name']; ?></option>
                                            <?php
                                                }
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>


                                    <div class="form-group">

                                        <select class="form-control" name="transportation" required>
                                            <option value="">Select City To</option>
                                            <?php

                                            $sql = "SELECT transportations.id, 
                  transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to
                 FROM transportations 
                 INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
                 INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
                 INNER JOIN transportation_types ON transportation_types.id = transportations.type_id";
                                            $result = $DB->query($sql);
                                            while ($row = $result->fetch_assoc()): {

                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['type_name']; ?> --> <?php echo $row['city_from']; ?> --> <?php echo $row['city_to']; ?> </option>
                                            <?php
                                                }
                                            endwhile;
                                            ?>
                                        </select>
                                    </div>



                                    <div class="form-group">
                                        <input class="form-control" placeholder="egyptian ticket price"
                                            name="egyptian_ticket" type="text" required>
                                    </div>

                                    <div class="form-group">
                                        <input class="form-control" placeholder="foreign ticket price"
                                            name="foreign_ticket" type="text" required>
                                    </div>

                                    <input type="submit" name="add" class="btn btn-primary pull-right" value="Add Program">
                                </fieldset>
                            </form>

                        </div>
                    </div>
                </div><!-- /.col-->
            </div><!-- /.row -->



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