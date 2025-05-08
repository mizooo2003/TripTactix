<?php
include('functions/conn.php');
ob_start();
?>

<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="#"><span>Trip Tactix</span> Admin</a>

        </div>
    </div><!-- /.container-fluid -->
</nav>
<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
    <div class="profile-sidebar">
        <div class="profile-userpic">
            <img src="css/facebook-profile-picture-affects-chances-of-gettin_gstt.jpg" class="img-responsive" alt="">
        </div>
        <div class="profile-usertitle">
            <div class="profile-usertitle-name">Admin</div>
            <div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="divider"></div>

    <ul class="nav menu">
        <li><a href="index.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
        <li><a href="users.php"><em class="fa fa-user">&nbsp;</em> Users</a></li>
        <li><a href="messages.php"><em class="fa fa-envelope">&nbsp;</em> Messages</a></li>

        <li class="parent "><a data-toggle="collapse" href="#sub-itemm-1">
                <em class="fa fa-navicon">&nbsp;</em>Cities <span data-toggle="collapse" href="#sub-itemm-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-itemm-1">
                <li><a class="" href="add_cities.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Cities
                    </a></li>
                <li class="active"><a class="" href="cities.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>View Cities
                    </a></li>


            </ul>
        </li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-1Services">
                <em class="fa fa-navicon">&nbsp;</em>Transporation Types <span data-toggle="collapse" href="#sub-item-1Services" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1Services">
                <li><a class="" href="add_transporation_types.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Transporation Types
                    </a></li>
                <li class="active"><a class="" href="transportation_types.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>View Transporation Types
                    </a></li>


            </ul>
        </li>




        <li class="parent "><a data-toggle="collapse" href="#sub-item-1places">
                <em class="fa fa-navicon">&nbsp;</em>Tourism Places <span data-toggle="collapse" href="#sub-item-1places" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1places">
                <li><a class="" href="add_places.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Tourism Places
                    </a></li>
                <li class="active"><a class="" href="places.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>View Tourism Places
                    </a></li>


            </ul>
        </li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-1Types">
                <em class="fa fa-navicon">&nbsp;</em>Tour Guides <span data-toggle="collapse" href="#sub-item-1Types" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1Types">
                <li><a class="" href="add_tour_guides.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Tour Guides
                    </a></li>
                <li class="active"><a class="" href="tour_guides.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>View Tour Guides
                    </a></li>


            </ul>
        </li>


        <li class="parent "><a data-toggle="collapse" href="#sub-item-1Transporations">
                <em class="fa fa-navicon">&nbsp;</em>Transporations <span data-toggle="collapse" href="#sub-item-1Transporations" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1Transporations">
                <li><a class="" href="add_transporations.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Transporations
                    </a></li>
                <li class="active"><a class="" href="transporations.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>View Transporations
                    </a></li>


            </ul>
        </li>

        <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                <em class="fa fa-navicon">&nbsp;</em>Trip Programs <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1">
                <li><a class="" href="add_trip_programs.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Add Program
                    </a></li>
                <li class="active"><a class="" href="programs.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>View Program
                    </a></li>


            </ul>
        </li>






        <li class="parent "><a data-toggle="collapse" href="#sub-item-1Requests">
                <em class="fa fa-navicon">&nbsp;</em>Requests <span data-toggle="collapse" href="#sub-item-1Requests" class="icon pull-right"><em class="fa fa-plus"></em></span>
            </a>
            <ul class="children collapse" id="sub-item-1Requests">
                <li><a class="" href="places_requests.php">
                        <span class="fa fa-arrow-right">&nbsp;</span> Places Requests
                    </a></li>
                <li class="active"><a class="" href="transportations_requests.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>Transportations Requests
                    </a></li>
                <li class="active"><a class="" href="tour_guides_requests.php">
                        <span class="fa fa-arrow-right">&nbsp;</span>Tour Guides Requests
                    </a></li>


            </ul>
        </li>


        <li><a href="logout.php"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
    </ul>
</div><!--/.sidebar-->