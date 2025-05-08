<?php
include('conn.php');

if(isset($_POST['add']))
{
    
    $title = $_POST['title'];

    
    $sql = "INSERT INTO `transportation_types`(`title`) VALUES ('$title')";
    
    $result = $DB->query($sql);
    
    if($result == true)
    {
        header('location:../add_transporation_types.php?success=1');
    }
        
        
        
    
}

?>