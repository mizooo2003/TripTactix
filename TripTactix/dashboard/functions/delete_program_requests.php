<?php
include('conn.php');

if(isset($_GET['id']))
{


    $sql = "delete from program_requests where id ='$_GET[id]'";

    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));

    if($result == true)
    {
         header('location:../program_requests.php?delete=1');
    }
}



?>