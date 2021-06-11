<?php
	//define parameters
	$host = "localhost";
	$port;
	$login = "root";
	$password = "";
	$database = "music_database";
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