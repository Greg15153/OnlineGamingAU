<?php
	require_once("framework/globals.php");
	//$th->load("Error");

	if($do == "") {
		$th->load("Header");
		$th->load("Home");
		$th->load("Footer");
	}
	else if($do != "" && in_array($do, $validPlugins)){
		handleRequest($do);
		$th->load($do);
	}
	else {
		header("Location: index.php?msg=100");
	}
?>
