<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function __construct() {
		parent::__construct();
		$this->load->model("model_quiz");
    }
	
	public function index() {
		$data['list'] = $this->model_quiz->listAll();
	
		$this->load->view('header');
		$this->load->view('main/view_home', $data);
		$this->load->view('footer');
	}
	
	public function quiz($name = '') {
		$data['quiz'] = $this->model_quiz->get($name);
		$data['praises'] = $this->model_quiz->praises();
		$data['taunts'] = $this->model_quiz->taunts();
		
		if ($data['quiz'] == '') {
			redirect('/');
			return;
		}
	
		$this->load->view('header');
		$this->load->view('main/view_quiz', $data);
		$this->load->view('footer');
	}
}