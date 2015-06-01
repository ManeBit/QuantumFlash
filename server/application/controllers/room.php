<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Room extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index() {
		echo json_encode(array('app_name' => 'QuantumFlash_Server', 'functions' => array('start', 'ls', 'taunts', 'praises')));
	}
	
	public function start($setName) {
		$filePath = "sets/".$setName.".csv";
		
		echo json_encode(array('data' => $this->getData($filePath, -1)));
	}
	
	public function ls() {
		$raw = get_filenames("sets/");
		$data = str_replace(".csv", "", $raw);
		
		echo json_encode(array('data' => $data));
	}
	
	public function taunts() {
		echo json_encode(array('data' => $this->getData("taunts.csv", 0)));
	}
	
	public function praises() {
		echo json_encode(array('data' => $this->getData("praises.csv", 0)));
	}
	
	private function getData($filePath, $type) {
		ini_set('auto_detect_line_endings', TRUE);
		if (file_exists($filePath)) {
			return $this->csv_to_array($filePath, $type);
		}
		return null;
	}
	
	private function csv_to_array($filename='', $type, $delimiter=',')
	{
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
