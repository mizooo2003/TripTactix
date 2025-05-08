<?php
include('conn.php');

if(isset($_GET['id']))
{
    $id = $_GET['id'];

    $sql = "delete from transportation_types where id = '$id'";
    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));
    
    header('location:../transportation_types.php?delete=1');
}

?>