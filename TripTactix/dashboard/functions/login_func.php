<?php
include('conn.php');

if(isset($_POST['login']))
{
    $name = $_POST['name'];
    $pass = $_POST['password'];
    
    
    
    $sql = "select * from admin where name = '$name' and password = '$pass'";
    
    $result = $DB->query($sql) or die ("failed to query".mysqli_error($DB));
    
    
    $row = $result->fetch_assoc();
    
    $username = $row['name'];
    $password = $row['password'];
    
    if($name == $username && $pass == $password)
    {
        
        $_SESSION['logged_id'] = $row['id'];
        $_SESSION['logged_name'] = $row['name'];
        
        header('location:../index.php');
            
        
    }
    
    else
    {
        header('location:../login.php?error=1');
    }
    
    
}


?>