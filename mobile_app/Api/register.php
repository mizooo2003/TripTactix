<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

error_reporting(0);
include('conn.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($_FILES['image']['name'])) {

        // Generate a unique filename
        $uploadDir = "../../TripTactix/func/users/";
        $fileExt = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
        $uniqueName = uniqid("img_", true) . "." . $fileExt;
        $targetPath = $uploadDir . $uniqueName;
        move_uploaded_file($_FILES["image"]["tmp_name"], $targetPath);
    }

    $sql = "INSERT INTO `users`(`image`,`name`, `email`, `password`, `phone`, `address`) 
    VALUES ('$uniqueName','$name','$email','$password','$phone','$address')";


    $result  = $DB->query($sql) or die("failed To Query" . mysqli_error($DB));


    if ($result) {
        echo json_encode("success");
    } else {
        echo json_encode("Error");
    }
}
