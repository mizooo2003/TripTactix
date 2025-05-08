<?php
include('../dashboard/conn.php');

$jsonArray = array();

$sql = "SELECT *, products.id AS MainID, categories.cat_title AS cat,
COALESCE((SELECT  AVG(reviews.rating) from reviews where reviews.supplement_id = MainID),0)  as rating
FROM products 
INNER JOIN categories ON categories.id = products.cat_id
where products.cat_id = $_GET[cat_id]";

$result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));


while($row = $result->fetch_assoc()):
{
    $jsonArray[] = $row;
}
endwhile;


echo json_encode($jsonArray);




?>