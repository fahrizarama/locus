<?php

class Beranda_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Beranda_m');
		
	}

	public function index(){

		$slider = $this->Beranda_m->getAll2();
		$data['slider'] = $slider;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/beranda_v', $data);
		$this->load->view('parts/footer', $data);
		
	}
}