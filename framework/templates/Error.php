<?php
	require_once("framework/globals.php");
	global $mh, $msg;
	if($msg != "") {
?>
	<div id="error">
<?
		$mh->load($msg);
?>
	</div>
<?
	}
?>
