<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Download a song";

require_once ('includes/header.php');
require_once ('includes/database.php');

//retrieve user id from a querystring
$song_id = $_GET['id'];

$query_str = "SELECT * FROM songs WHERE song_id = $song_id";
//execut the query
$result = $conn->query($query_str);
$row1=$result->fetch_assoc();
$filepath='audio/' . $row1['track'];

if (!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Selection failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
  }
header('Content-Type:application/octet-stream');
header('Content-Description: File Transfer');
header('Content-Disposition: attachment; filename=' . basename($filepath));
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma:public');
readfile('audio/' . $row1['track']);
exit;
?>

<?php
// close the connection.
$conn->close();
header("Location:index.php");
include ('includes/footer.php');
?>