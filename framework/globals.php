<?php
#############################################
#											#
#			BreadWork Framework				#
#			   Copyright 2011				#
#											#
#############################################
	session_start();
	ob_start();

	error_reporting(0);
	require_once("mysql.php");
	require_once("Clean.php");
	require_once("TemplateHandler.php");
	require_once("MessageHandler.php");
	require_once("RequestHandler.php");
	
	###### Constants ######
	
	/* Define Constants */
	define("HOST", "localhost");
	
	/* User for MYSQL */
	define("USER", "root");
	
	/* Password for MYSQL */
	define("PASS", "");
	
	/* Database for MYSQL */
	define("DBASE", "knightgaming");
	
	/* Debug Mode Info */
	define("MODE", 0);
	
	/* Define Plugins Directory */
	define("PLUGIN_DIR", "framework/plugins/");
	
	/* Define DirectAccess constant */
	define("DirectAccess", 0);
	
	/* Defines Document Root */
	define("DOCR", $_SERVER['DOCUMENT_ROOT']);
	
	/* Define Folder Script is Installed to. */
	define("InstallDir", "framework");
	
	
	###### Global Variables ######

	/* Global MYSQL Object */
	$mysql = new MYSQL(HOST, USER, PASS, DBASE);
	
	/* Global Template Handler Object */
	$th = new TH();
	
	/* Global Message Handler Object */
	$mh = new MH();
	
	/* Global Security Object */
	$clean = new CLEAN($mysql);
	
	/* Global do $_GET value validates input */
	$do = $clean->cleanInput((isset($_GET['do']) ? $_GET['do'] : ""));
	
	/* Global Error Message */
	$msg = (isset($_GET['msg']) ? $_GET['msg'] : "");
	
	/* Valid Plugin Array */
	$validPlugins = array();
	
	####### Global Functions #######
	
	/*
		loadPlugin - loads plugins from /plugins directory into validPlugins array
		@return null
	*/
	function loadPlugins() {
		global $validPlugins, $do;
		if($do != "") {
			if(is_dir(PLUGIN_DIR)) {
				$dir = opendir(PLUGIN_DIR);
				while (false !== ($entry = readdir($dir))) {
					if($entry != "." && $entry != "..") {
						if($do == str_replace(".php" , "", $entry)) {
							$validPlugins[] = str_replace(".php" , "", $entry);
							require_once(PLUGIN_DIR ."/".$entry);
						}
					}
					else
						continue;
				}
			}
			else {
				header("Location: index.php?msg=505");
			}
		}
	}
	/* Load Plugins */
	loadPlugins();
?>