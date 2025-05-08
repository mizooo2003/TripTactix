<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/datepicker3.css" rel="stylesheet">
        <link href="css/styles.css" rel="stylesheet">

    </head>
    <body>
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">Log in</div>
                    <div class="panel-body">
                        <form role="form" method="post" action="functions/login_func.php">
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" placeholder="UserName" name="name" type="text" autofocus="">
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" >
                                </div>

                                <input type="submit" name="login" class="btn btn-primary" value="Login"></fieldset>
                        </form>
                        <?php
                        if(isset($_GET['error']))
                        {
                        ?>
                        <center>
                            <a href="#">Wrong UserName Or Password !</a>
                        </center>
                        <?php 
                        }
                        ?>
                    </div>
                </div>
            </div><!-- /.col-->
        </div><!-- /.row -->	


        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>
