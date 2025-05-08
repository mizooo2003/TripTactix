<?php
error_reporting(0);
include('conn.php');

$jsonData = file_get_contents('php://input');
// Decode the JSON data into a PHP associative array
$data = json_decode($jsonData, true);
// Check if decoding was successful
if ($data !== null) {
    // Access the data and perform operations
    $userID = $data['userId'];
    $hdn_id = $data['hdn_id'];
    $price = $data['price'];
    $qty = $data['qty'];




    $sql = "INSERT INTO `tour_guides_requests`(`user_id`, `guide_id`,`ticket_price`,`qty`,`req_date`,`status`) 
        VALUES ('$userID' , '$hdn_id','$price','$qty', now() , 'Pending')";

    $result = $DB->query($sql);

    if ($result) {
        echo json_encode("success");
    } else {
        echo json_encode("error");
    }
} else {
    // JSON decoding failed
    http_response_code(400); // Bad Request
    echo json_encode("error");
}
