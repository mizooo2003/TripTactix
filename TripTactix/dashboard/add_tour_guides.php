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
                <h1 class="page-header">Add Tour Guides</h1>
            </div>
        </div><!--/.row-->

        <?php
        if (isset($_GET['success'])) {

        ?>

            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>A New Tour Guide Was Added Successfully</div>

        <?php
            header('refresh:4,url=add_tour_guides.php');
            ob_end_flush();
        }
        ?>









        <div class="row">

            <div class="row">
                <div class="col-md-offset-1 col-sm-10">
                    <div class="login-panel panel panel-default">
                        <div class="panel-heading">Add New Tour Guide</div>
                        <div class="panel-body">
                            <form role="form" method="post" action="functions/add_tour_guides_func.php" enctype="multipart/form-data">
                                <fieldset>

                                    <div class="form-group">
                                        <label>Upload Tour Guide Image</label>
                                        <input class="form-control" name="img" type="file" required>
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" placeholder="Guide Name" name="name" type="text" required>
                                    </div>
                                    <div class="form-group">

                                        <select class="form-control" name="city" required>
                                            <option value="">Select City</option>
                                            <?php

                                            $sql = "select * from cities";
                                            $result = $DB->query($sql);
                                            while ($row = $result->fetch_assoc()): {

                                            ?>
                                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['city']; ?></option>
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
                                   
                                    <input type="submit" name="add" class="btn btn-primary pull-right" value="Add Tour Guide">
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

    <script>
        $(document).ready(function() {
            $('#transportation_cost').keyup(function() {
                var program_cost = $('#program_cost').val();
                var hotel_cost = $('#hotel_cost').val();
                var transportation_cost = $('#transportation_cost').val();

                $('#total').val(parseInt(program_cost) + parseInt(hotel_cost) + parseInt(transportation_cost));
            })
        });
    </script>

</body>

</html>