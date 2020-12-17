<?php

class Profil_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Profil_m');
		$this->load->model('Merchant_m');
	}

	public function index(){

		$tentang = $this->Profil_m->getAll2();
		$data['tentang'] = $tentang;

		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/profil_v', $data);
		$this->load->view('parts/footer', $data);
		
	}
}