<?php
include('conn.php');

if(isset($_GET['id']))
{


    $sql = "update  places_requests set status = 'Delivered' where id ='$_GET[id]'";

    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));

    if($result == true)
    {
         header('location:../places_requests.php?update=1');
    }
}



?>