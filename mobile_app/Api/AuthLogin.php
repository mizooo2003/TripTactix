<?php
error_reporting(0);
include('conn.php');

$email = $_GET['email'];
$pass = $_GET['pass'];


$sql = "select * from users where email = '$email' and password = '$pass'";

$result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));

$count = $result->num_rows;

$row = $result->fetch_assoc();

if($count > 0)
{
    $jsonArray[] = $row;

    $arr = array("status" => "true", "data" => $jsonArray);

    echo json_encode($arr);
}
else
{
    $jsonArray[] = $row;

    $arr = array("status" => "false", "data" => $jsonArray);

    echo json_encode($arr);
}




?>