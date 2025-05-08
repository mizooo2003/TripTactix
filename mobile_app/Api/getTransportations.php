<?php
include('conn.php');

$jsonArray = array();

$sql = "SELECT transportations.id, transportations.city_image, transportations.foreign_ticket,
transportations.egyptian_ticket, transportations.duration, DATE_FORMAT(transportations.time_slot , '%h:%i %p') AS formatted_time , 
transportations.direction, transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to
FROM transportations 
INNER JOIN cities AS city_from ON city_from.id = transportations.city_from 
INNER JOIN cities AS city_to ON city_to.id = transportations.city_to 
INNER JOIN transportation_types ON transportation_types.id = transportations.type_id";


$result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));


while($row = $result->fetch_assoc()):
{
    $jsonArray[] = $row;
}
endwhile;


echo json_encode($jsonArray);




?>