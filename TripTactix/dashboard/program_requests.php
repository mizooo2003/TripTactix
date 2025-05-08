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
                <h1 class="page-header">Program Requests</h1>
            </div>
        </div><!--/.row-->

        <?php
        if (isset($_GET['delete'])) {

        ?>

            <div class="alert bg-success" role="alert"><em class="fa fa-lg fa-warning">&nbsp;</em>Request Was Deleted Successfully</div>

        <?php
            header('refresh:4,url=program_requests.php');
            ob_end_flush();
        }
        ?>



        <table class="table">
            <thead class="thead-dark" style="background-color:#343a40; color:white;">
                <tr>
                    <th scope="col">Program Image</th>
                    <th scope="col">Program Title</th>
                    <th scope="col">User Image</th>
                    <th scope="col">User Name</th>
                    <th scope="col">User Email</th>
                    <th scope="col">User Phone</th>
                    <th scope="col">User Address</th>
                    <th scope="col">User Promo Code</th>
                    <th scope="col">Request Date</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT program_requests.id, program_requests.date, program_requests.status, programs.img, programs.title, users.name, users.email, users.phone, users.address, users.image, users.promo_code FROM program_requests INNER JOIN programs on programs.id = program_requests.program_id INNER JOIN users on users.id = program_requests.user_id";
                $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

                while ($row = $result->fetch_assoc()): {

                ?>

                        <tr>
                            <td><img src="functions/programs/<?php echo $row['img']; ?>" width="70" height="70"></td>
                            <td><?php echo $row['title']; ?></td>
                            <td><img src="../func/users/<?php echo $row['image']; ?>" width="70" height="70"></td>
                            <td><?php echo $row['name']; ?></td>
                            <td><?php echo $row['email']; ?></td>
                            <td><?php echo $row['phone']; ?></td>
                            <td><?php echo $row['address']; ?></td>
                            <td><?php echo $row['promo_code']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td>
                                <div class=" action-buttons">
                                    <a href="functions/delete_program_requests.php?id=<?php echo $row['id']; ?>" class="trash">
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