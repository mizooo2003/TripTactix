<?php
include('conn.php');


if (isset($_POST['request'])) {
    if (isset($_SESSION['logged_id'])) {
        $sql = "INSERT INTO `transportation_requests`(`user_id`, `transportation_id`,`ticket_price`,`qty`,`req_date`,`status`) 
        VALUES ('$_SESSION[logged_id]' , '$_POST[hdn_id]','$_POST[price]',$_POST[qty], now() , 'Pending')";

        $result = $DB->query($sql);

        if ($result == true) {
            $_SESSION['success'] = 1;
            header("location:../transportations.php");
        }
    } else {
        $_SESSION['session_erorr'] = 1;
        header('location:../login.php');
    }
}
