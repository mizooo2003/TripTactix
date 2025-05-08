<?php
include('conn.php');

$jsonArray = array();

$sql = "SELECT tourism_places.id,
tourism_places.egyptian_ticket,
tourism_places.foreign_ticket, 
 tourism_places.direction, 
tourism_places.place_image,
 tourism_places.title,
  tourism_places.desc, 
  cities.city
   
   from tourism_places 
   INNER JOIN cities on cities.id = tourism_places.city_id";


$result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));


while($row = $result->fetch_assoc()):
{
    $jsonArray[] = $row;
}
endwhile;


echo json_encode($jsonArray);




?>