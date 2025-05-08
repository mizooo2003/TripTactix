<?php
include('conn.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "delete from trip_programs where id = '$id'";
    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));
    
    header('location:../programs.php?delete=1');
}

?>