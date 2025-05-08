<?php
include('conn.php');

$jsonArray = array();

$sql = "SELECT tour_guides.id,
tour_guides.egyptian_ticket,
tour_guides.foreign_ticket, 
tour_guides.guide_image,
 tour_guides.guide_name,
  cities.city
   
   from tour_guides 
   INNER JOIN cities on cities.id = tour_guides.city_id";


$result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));


while($row = $result->fetch_assoc()):
{
    $jsonArray[] = $row;
}
endwhile;


echo json_encode($jsonArray);




?>