<?php
require_once ('includes/header.php');
require_once ('includes/database.php');

if(isset($_GET['added'])){
$song_id = $_GET['id'];
$user_id=$_SESSION['id'];
$query_str="INSERT INTO playlist(song_id,user_id) values('$song_id','$user_id')";
$conn->query($query_str);
exit;

}
if(isset($_GET['removed'])){
    $song_id = $_GET['id'];
    $user_id=$_SESSION['id'];
    $query_str="DELETE FROM playlist where song_id=$song_id and user_id=$user_id";
    $conn->query($query_str);
    exit;
    
    }

$conn->close();
?>