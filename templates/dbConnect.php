<?php
	$conn = new mysqli("localhost", "root", "", "knightgaming");	
	if(mysqli_connect_errno()){
		echo "Problem connecting to database. Error: ".mysqli_connect_error();
	}
?>