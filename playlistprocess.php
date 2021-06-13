<?php
require_once ('includes/header.php');
require_once ('includes/database.php');

if(isset($_POST['added'])){
$song_id = $_POST['id'];
$user_id=$_SESSION['id'];
$query_str="INSERT INTO playlist(song_id,user_id) values('$song_id','$user_id')";
$conn->query($query_str);
exit();
}
if(isset($_POST['removed'])){
    $song_id = $_POST['id'];
    $user_id=$_SESSION['id'];
    $query_str="DELETE FROM playlist where song_id=$song_id and user_id=$user_id";
    $conn->query($query_str);
    exit();
    }

$conn->close();
include ('includes/footer.php');

?>