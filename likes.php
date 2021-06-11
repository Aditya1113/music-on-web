<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "like a song";

require_once ('includes/header.php');
require_once ('includes/database.php');

//retrieve user id from a querystring
$song_id = $_GET['id'];

$query_str = "SELECT * FROM songs WHERE song_id = $song_id";
//execut the query
$result = $conn->query($query_str);
$row1=$result->fetch_assoc();

if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
  }
$newCount = $row1['likes'] + 1;
$updatQuery= "UPDATE songs SET likes = $newCount WHERE song_id =$song_id";
$conn->query($updatQuery);
exit;
?>

<?php
// close the connection.
$conn->close();
header("Location:index.php");
include ('includes/footer.php');
?>