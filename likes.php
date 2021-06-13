<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "like a song";

session_start();

require_once ('includes/database.php');



  if(isset($_POST['liked'])){

    $song_id = $_POST['id'];
    $user_id=$_SESSION['id'];
    $query_str = "SELECT * FROM songs WHERE song_id = $song_id";
    $result = $conn->query($query_str);
    $row1=$result->fetch_assoc();
    $newCount = $row1['likes']+1;
    $updatQuery= "UPDATE songs SET likes = $newCount WHERE song_id =$song_id";
    $conn->query($updatQuery);
    
    $query_str="INSERT INTO likes(userid,songid) values('$user_id','$song_id')";
    $conn->query($query_str);
    echo $newCount;
    exit();
    
    }
    if(isset($_POST['unliked'])){

        $song_id = $_POST['id'];
        $user_id=$_SESSION['id'];
        $query_str = "SELECT * FROM songs WHERE song_id = $song_id";
        $result = $conn->query($query_str);
        $row1=$result->fetch_assoc();
        $newCount = $row1['likes']-1;

        $query_str="DELETE FROM likes where userid=$user_id and songid=$song_id";
        $conn->query($query_str);

        $updatQuery= "UPDATE songs SET likes = $newCount WHERE song_id =$song_id";
        $conn->query($updatQuery);
        echo $newCount ;
        
        exit();
        
        }



?>

<?php
// close the connection.
$conn->close();
// header("Location:counts.php");
include ('includes/footer.php');
?>