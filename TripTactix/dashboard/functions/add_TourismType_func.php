<?php
include('conn.php');

if(isset($_POST['add']))
{
    
    $title = $_POST['title'];

    
    $sql = "INSERT INTO `tourism_types`(`type_title`) VALUES ('$title')";
    
    $result = $DB->query($sql);
    
    if($result == true)
    {
        header('location:../add_tourism_types.php?success=1');
    }
        
        
        
    
}

?>