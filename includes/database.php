<?php
	//define parameters
	$host = "localhost";
	$port;
	$login = "id17018274_adi";
	$password = "Aditya@11132021";
	$database = "id17018274_music_website";
	$tblsongs = "songs";
	$tblUsers = "users";
	  
	//Connect to the mysql server
	$conn = @new mysqli($host, $login, $password, $database, $port);
	"ALTER TABLE songs AUTO_INCREMENT=1";


	//Handle connection errors 
	if (mysqli_connect_errno() != 0) {
	    $errno = mysqli_connect_errno();
	    $errmsg = mysqli_connect_error();
	    die("Connect Failed with: ($errno) $errmsg<br/>\n");
	}
?>