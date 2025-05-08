<?php
include('func/conn.php');

$register = "";
$login = "";
$profile = "";
$logout = "";

if (isset($_SESSION['logged_id'])) {
   
    $profile = "<li><a href='profile.php'>Profile</a></li>";
    $logout = "<li><a href='logout.php'>Logout</a></li>";
}
else
{

    $register = "<li><a href='Register.php'>Register</a></li>";
    $login = "<li><a href='login.php'>Login</a></li>";
}


?>
<nav class="main-nav">
    <!-- ***** Logo Start ***** -->
    <a href="index.php" class="logo">
        <h2 style="color: white; margin-top: 15px">Trip Tactix</h2>
    </a>
    <!-- ***** Logo End ***** -->
    <!-- ***** Menu Start ***** -->
    <ul class="nav">
        <li><a href="index.php" class="active">Home</a></li>
        <li><a href="about.php">About</a></li>
        <li class="nav-item">
            Services
            <ul class="dropdown">
                <li><a href="tourism_places.php">Tourism Places</a></li>
                <li><a href="tourGuides.php">Tour Guides</a></li>
                <li><a href="transportations.php">Transportations</a></li>
                <li><a href="trip_programs.php">Trip Programs</a></li>

            </ul>
        </li>

        <li class="nav-item">
            Account
            <ul class="dropdown">
                <?php echo $register ?>
                <?php echo $login ?>
                <?php echo $profile ?>
                <?php echo $logout ?>
            </ul>
        </li>

        <li><a href="contact.php">Contact Us</a></li>
    </ul>
    <a class="menu-trigger">
        <span>Menu</span>
    </a>
    <!-- ***** Menu End ***** -->
</nav>