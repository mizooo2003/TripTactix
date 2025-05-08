<?php
include('conn.php');

if(isset($_POST['add']))
{
    $title = $_POST['name']; 
    $city = $_POST['city']; 
    $egyptian_ticket = $_POST['egyptian_ticket']; 
    $foreign_ticket = $_POST['foreign_ticket']; 
    $img = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    
    move_uploaded_file($tmp_name,"guides/$img");
    
    
    $sql = "INSERT INTO `tour_guides`(`guide_image`, `guide_name`, `city_id`, `egyptian_ticket`, `foreign_ticket`) 
    VALUES ('$img','$title','$city','$egyptian_ticket','$foreign_ticket')";
    
    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));
    
    if($result == true)
    {
        
        header('location:../add_tour_guides.php?success=1');
        
    }
    
    
}


?>