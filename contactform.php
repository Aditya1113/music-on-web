<?php
include ('includes/database.php');
extract($_POST);


$sql = "INSERT into contactus (name,email,message,created_date) VALUES('" . $name . "','" . $email . "','" . $message . "','" . date('d-M-Y') . "')";


if (!$success) {
    die("Couldn't enter data: ".$conn->error);
}


header("Location:contact.php?note=success");

$conn->close();
?>