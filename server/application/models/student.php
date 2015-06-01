<?php

class Student extends CI_Model {
	
	public function __construct() {
		// Call the CI_Model constructor
		parent::__construct();
	}
	
	public function create($name, $set) {
		// Create the user.
		$data = array(
			'name' => $name,
			'set' => $set,
			'score' => 0
		);
		$this->db->insert('students', $data);
	}
	
	public function exists($name) {
		$this->db->where('name', $name);
		$query = $this->db->get('students');
				
		if ($query->num_rows >= 1) {
			return true;
		}
				
		return false;
	}
	
	/*
	public function score($name, $score) {
		$data = array('score' => $score);
		$this->db->where('name', $name);
		$this->db->update('students', $data);
	}
	
	public function clearAll() {
		$this->db->truncate('students');
	}
	*/
   
}

