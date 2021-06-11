<?php
session_start();
require_once ('includes/database.php');
require_once ('includes/header.php');

if(isset($_POST['songadd'])){

$title = $_POST['song_name'];
$author = $_POST['author'];
$year = $_POST['song_year'];
$images = $_FILES["image"]['name'];
$tracks = $_FILES['track']['name'];
$genres=$_POST['genre'];
$downloads=$_POST['downloads'];

//handle error
if(file_exists("img/bg-img/" . $_FILES["image"]["name"]))
{
    $store = $_FILES["image"]["name"];
    $_SESSION['status']="Image already exists. '.$store.'";
    header("Location:addsongs.php");
}
else if(file_exists("audio/" . $_FILES["track"]["name"]))  
{
  $store = $_FILES["track"]["name"];
  $_SESSION['status']="Image already exists. '.$store.'";
  header("Location: addsongs.php"); 
}

else{

  
//define sql statement
$query_str = "INSERT INTO songs VALUES (NULL, '$title', '$author','$year', '$images','$tracks',0,'$genres',0)";

//execute the query
$result = @$conn->query($query_str);
$check=true;

  if(!$result) {
    $errno = $conn->errno;
    $errmsg = $conn->error;
    echo "Insertion failed with: ($errno) $errmsg<br/>\n";
    $conn->close();
    exit;
  }

  else{
  move_uploaded_file($_FILES["image"]["tmp_name"],"img/bg-img/".$_FILES["image"]["name"]);
  move_uploaded_file($_FILES["track"]["tmp_name"],"audio/".$_FILES["track"]["name"]);
  $_SESSION['success']="Song Added";
  header("Location: addsongs.php");  
  }
}
}
