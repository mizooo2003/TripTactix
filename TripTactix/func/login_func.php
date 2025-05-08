<?php

include('conn.php');

if (isset($_POST['login'])) {



    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email = '$email' and password = '$password'";

    $result = $DB->query($sql) or die("failed to query" . mysqli_error($DB));

    $row = $result->fetch_assoc();

    $user_email = $row['email'];
    $pass = $row['password'];

    if ($email == $user_email && $password == $pass) {
        $_SESSION['logged_id'] = $row['id'];
        $_SESSION['user_name'] = $row['name'];
        $_SESSION['user_email'] = $row['email'];
        $_SESSION['user_number'] = $row['phone'];
        $_SESSION['user_location'] = $row['address'];
        $_SESSION['user_image'] = $row['image'];

        $_SESSION['success'] = 1;
        header('location:../login.php');
    } else {
        $_SESSION['error'] = 1;
        header('location:../login.php');
    }
}
