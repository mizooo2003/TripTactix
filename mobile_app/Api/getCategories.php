<?php
include('../dashboard/conn.php');

$jsonArray = array();

$sql = "select * from categories";

$result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));


while($row = $result->fetch_assoc()):
{
    $jsonArray[] = $row;
}
endwhile;


echo json_encode($jsonArray);




?>