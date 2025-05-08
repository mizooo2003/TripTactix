<?php
include('conn.php');

if (isset($_POST['register'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $cpass = $_POST['cpassword'];
    $location = $_POST['address'];
    $phone = $_POST['phone'];
    $img = $_FILES['image']['name'];
    $img_tmp = $_FILES['image']['tmp_name'];
    move_uploaded_file($img_tmp, "users/$img");

    if ($pass == $cpass) {
        $sql = "INSERT INTO `users`(`image`, `name`, `email`, `phone`, `address`, `password`) VALUES 
            ('$img','$name','$email','$phone','$location','$pass')";

        $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

        if ($result == true) {

            $_SESSION['success'] = 1;
            header("location:../register.php");
        }
    } else {
        $_SESSION['error'] = 1;
        header('location:../register.php');
    }
}
