<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
$page_title = "Delete a song";

require_once ('includes/header.php');
require_once('includes/database.php');

//retrieve user id from a querystring
$song_id = $_GET['id'];

//deleting data from folder
$query1_str="SELECT * FROM songs WHERE song_id = '" . $song_id . "'";
$res=$conn->query($query1_str);
$row1=$res->fetch_array();
$img1=$row1["image"];
$sng=$row1["track"];
unlink("img/bg-img/".$img1);
unlink("audio/".$sng);

//deleting data from database
$query_str = "DELETE FROM songs WHERE song_id = '" . $song_id . "'";

//execut the query
$result = $conn->query($query_str);

//Handle selection errors
if (!$result) {
  $errno = $conn->errno;
  $errmsg = $conn->error;
  echo "Selection failed with: ($errno) $errmsg<br/>\n";
  $conn->close();
  exit;
}
?>
  //confirm delete

<div class="container wrapper mt-5">
  <div class="h1 text-danger text-center mt-5">song has been deleted.</div>
</div>

<?php
// close the connection.
$conn->close();
header( "Refresh:3; url=index.php", true, 303);
include ('includes/footer.php');
?>