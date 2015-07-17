<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_quiz extends CI_Model {
	public function __construct() {
        parent::__construct();
	}

	public function listAll() {
		$raw = get_filenames("sets/");
		$data = str_replace(".csv", "", $raw);
		
		return json_encode(array('data' => $data));
	}
	
	public function get($name) {	
		$filePath = "sets/".$name.".csv";
		
		return json_encode(array('data' => $this->getData($filePath, -1)));
	}
	
	public function taunts() {
		return json_encode(array('data' => $this->getData("taunts.csv", 0)));
	}
	
	public function praises() {
		return json_encode(array('data' => $this->getData("praises.csv", 0)));
	}
	
	private function getData($filePath, $type) {
		ini_set('auto_detect_line_endings', TRUE);
		if (file_exists($filePath)) {
			return $this->csv_to_array($filePath, $type);
		}
		return null;
	}
	
	private function csv_to_array($filename='', $type, $delimiter=',') {
		if(!file_exists($filename) || !is_readable($filename)) {
	        return false;
		}
		
	   $data = array();
	   if (($handle = fopen($filename, 'r')) !== FALSE) {
			$i = 0;
	   	while (($row = fgetcsv($handle, 0, $delimiter)) !== false) {
				//print json_encode($row); 				
				if ($type == 0) {
					$data[$i] = $row[0];
				} else {
					$data[$i] = $row;
				}
				$i++;
			}
			fclose($handle);
	    }
	    return $data;
	}
}