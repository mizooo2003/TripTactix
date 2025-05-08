<?php
include('conn.php');

if(isset($_POST['add']))
{
    
    $title = $_POST['title'];

    
    $sql = "INSERT INTO `cities`(`city`) VALUES ('$title')";
    
    $result = $DB->query($sql);
    
    if($result == true)
    {
        header('location:../add_cities.php?success=1');
    }
        
        
        
    
}

?>