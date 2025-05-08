<?php
include('../dashboard/conn.php');

$jsonArray = array();

$sql = "SELECT requests.id as MainID, requests.total_amt, requests.country,
 requests.city, requests.district, COUNT(req_details.id) as totalSpares
  FROM `requests`
   inner JOIN req_details on req_details.header_id = requests.id 
   WHERE user_id  = '$_GET[userID]'
   GROUP BY requests.id;
 ";

$result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));


while ($row = $result->fetch_assoc()): {
        $jsonArray[] = $row;
    }
endwhile;


echo json_encode($jsonArray);
