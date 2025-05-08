<?php
include('conn.php');

$jsonArray = array();

$sql = "SELECT trip_programs.id,
                trip_programs.program_title,
                trip_programs.foregin_ticket, 
                trip_programs.egyptian_ticket, 
                tourism_places.title as place_title,
                tourism_places.place_image,
                tour_guides.guide_name, 
                transportations.duration, 
                DATE_FORMAT(transportations.time_slot , '%h:%i %p') AS formatted_time ,
                 transportations.direction, 
                transportation_types.title AS type_name, city_from.city AS city_from, city_to.city AS city_to 
                FROM trip_programs 
                INNER JOIN transportations ON transportations.id = trip_programs.transportation_id 
                INNER JOIN tourism_places ON tourism_places.id = trip_programs.place_id
                INNER JOIN tour_guides ON tour_guides.id = trip_programs.guid_id
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