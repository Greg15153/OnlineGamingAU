<?php
	require_once("framework/globals.php");
	$th->load("Error");
	if($do != "gameInfo")
		$th->load("Header");
	if($do == "")
		$th->load("Home");
	else if($do != "" && in_array($do, $validPlugins)){
		handleRequest($do);
		$th->load($do);
	}
	else 
		header("Location: index.php?msg=100");
		if($do != "gameInfo")	
			$th->load("Footer");
?>