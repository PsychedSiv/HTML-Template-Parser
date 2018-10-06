<?php

	/*
	 * Copyright 2018, Siver AL-khayat, All rights reserved.
	 *  
	 * E-mail: _______@hotmail.com
	 */

	//allow the config
	define('__CONFIG__', true);
	//require the config
	require "inc/config.php";


	/*User may want to provide a custom HTMLTemplate
	*Ex: (Key should represent ID of element in template)
	*	template = '<p id="firstName"></p>'
	*	keyValueArray = ["firstName"=>"Siver"]	
	*/
	/*$HTML_template = "<!DOCTYPE html>
					<html>
						<head>
						</head>
						<body>
							<h2 id='title'></h2>
							<h3 id='paragraph'></h3>
						</body>
					</html>";*/
	$HTML_template = "";

	//Key-Value Pair
	$values = ["title" => "HTML", "paragraph" => "welcome"];

	$HTML_parser_obj = new HTMLParser( $values, $HTML_template );

	echo $HTML_parser_obj->parseTemplate();
