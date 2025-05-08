<?php
include('conn.php');

if(isset($_POST['add']))
{
    $type = $_POST['type']; 
    $city_from = $_POST['city_from']; 
    $city_to = $_POST['city_to']; 
    $egyptian_ticket = $_POST['egyptian_ticket']; 
    $foreign_ticket = $_POST['foreign_ticket']; 
    $direction = $_POST['direction'];
    $time = $_POST['time']; 
    $duration = $_POST['duration']; 
    $img = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    
    move_uploaded_file($tmp_name,"places/$img");
    
    
    $sql = "INSERT INTO `transportations`(`city_image`, `type_id`, `city_from`, 
    `city_to`, `egyptian_ticket`, `foreign_ticket`, `duration`, `time_slot`, `direction`) 
    VALUES ('$img','$type','$city_from','$city_to','$egyptian_ticket','$foreign_ticket','$duration','$time','$direction')";
    
    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));
    
    if($result == true)
    {
        
        header('location:../add_transporations.php?success=1');
        
    }
    
    
}


?>