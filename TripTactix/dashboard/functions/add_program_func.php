<?php
include('conn.php');

if(isset($_POST['add']))
{
    $title = $_POST['program_title'];
    $place = $_POST['place']; 
    $guide = $_POST['guide']; 
    $transportation= $_POST['transportation']; 
    $egyptian_ticket = $_POST['egyptian_ticket']; 
    $foreign_ticket = $_POST['foreign_ticket']; 

    
    
    $sql = "INSERT INTO `trip_programs`(`program_title`,`place_id`, `guid_id`, `transportation_id`, `egyptian_ticket`, `foregin_ticket`) 
    VALUES ('$title','$place','$guide','$transportation','$egyptian_ticket','$foreign_ticket')";
    
    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));
    
    if($result == true)
    {
        
        header('location:../add_trip_programs.php?success=1');
        
    }
    
    
}


?>