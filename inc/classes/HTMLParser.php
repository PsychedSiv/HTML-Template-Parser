<?php

	//if there is no constant defined called __CONFIG__, do not load this file
	if(!defined('__CONFIG__')){
		exit("you do not have a config file");
	}

	class HTMLParser{

		private $HTMLTemplate;
		private $values;

		//Initializing the instance of HTMLParser Class
		public function __construct($values, $HTMLTemplate = "<!DOCTYPE html><html><head></head><body><h1 id='title'></h1><p id='paragraph'></p></body></html>"){
			// can hanlde different kind of invalid template inputs 
			// and a default template if no input template is provided
			if($HTMLTemplate){
				$this->HTMLTemplate = $HTMLTemplate;
			} else{
				$this->HTMLTemplate = "<!DOCTYPE html><html><head></head><body><h1 id='title'></h1><p id='paragraph'></p></body></html>";
			}

			// sanatize each value in the $values array
			foreach($values as $key => $value){
				$this->values[$key] = $this->stringSanitizer($value);
			}
		}

		//Interface for user to call the assignValues method
		public function parseTemplate(){
			$this->assignValues($this->values, $this->HTMLTemplate);
			return $this->HTMLTemplate;	
		}

		//Assigns the user defined values into the HTML template
		private function assignValues($values, $HTMLTemplate){
			// regular expression can have bad performance (worst case exponential runningtime)
			// HTML is irregular language, regular expression is inadequent for parsing of HTML (IMO)
			$doc = new DOMDocument();
			$doc->formatOutput = true;
			$doc->loadHTML($HTMLTemplate);				

			foreach($values as $key => $value){
				$doc->getElementById($key)->textContent = $value;
			}

			// Sanatizes the finished result
			$this->HTMLTemplate = $this->stringSanitizer($doc->saveHTML());
		}

		/**
	    * @param string $string    String to filter befor ´putting inside InnoDB(I Used MyISAM)
	    * @return                  Filter and return a valid string to put into the Database.
	    */
		private function stringSanitizer($string){
		    $string = filter_var($string, FILTER_SANITIZE_FULL_SPECIAL_CHARS); 
		    return $string;
		}

	}

?>
