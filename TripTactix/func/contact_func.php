<?php
include('conn.php');

if(isset($_POST['submit']))
{


    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $message = $_POST['message'];


    $sql = "INSERT INTO `feedback`(`fname`,`lname` ,`email`,`message`) VALUES ('$fname','$lname','$email','$message')";

    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));

    if($result == true)
    {
        $_SESSION['success'] = 1;
         header('location:../contact.php');
    }
}



?>