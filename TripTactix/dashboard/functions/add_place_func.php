<?php
include('conn.php');

if(isset($_POST['add']))
{
    $title = mysqli_real_escape_string($DB, $_POST['title']); 
    $city = mysqli_real_escape_string($DB, $_POST['city']); 
    $egyptian_ticket = mysqli_real_escape_string($DB, $_POST['egyptian_ticket']); 
    $foreign_ticket = mysqli_real_escape_string($DB, $_POST['foreign_ticket']); 
    $direction = mysqli_real_escape_string($DB, $_POST['direction']);
    $desc = mysqli_real_escape_string($DB, $_POST['desc']); 
    $img = $_FILES['img']['name'];
    $tmp_name = $_FILES['img']['tmp_name'];
    
    move_uploaded_file($tmp_name, "places/$img");

    // Create the SQL query with escaped values
    $sql = "INSERT INTO `tourism_places`(`place_image`, `title`, `desc`, `city_id`, `egyptian_ticket`, `foreign_ticket`, `direction`)
            VALUES ('$img', '$title', '$desc', '$city', '$egyptian_ticket', '$foreign_ticket', '$direction')";
    
    $result = $DB->query($sql) or die("failed to query: " . mysqli_error($DB));
    
    if($result == true)
    {
        header('location:../add_places.php?success=1');
    }
}
?>
