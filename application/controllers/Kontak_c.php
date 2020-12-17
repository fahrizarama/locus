<?php

class Kontak_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Kontak_m');
		$this->load->model('Merchant_m');	
	}

	public function index(){
		$kontak = $this->Kontak_m->getAll1();
		$data['kontak'] = $kontak;

		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/Kontak_v', $data);
		$this->load->view('parts/footer', $data);
	}
}