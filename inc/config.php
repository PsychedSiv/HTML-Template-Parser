<?php

	//if there is no constant defined called __CONFIG__, do not load this file
	if(!defined('__CONFIG__')){
		exit("you do not have a config file");
	}

	//Allow errors (for debugging)
	error_reporting(-1);
	ini_set('display_errors', 'On');

	include_once "classes/HTMLParser.php";
	//include_once "classes/ ___ .php"

?>