<?php

class Galeri_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Galeri_m');
		$this->load->model('Merchant_m');
	}

	public function index(){

		$galeri = $this->Galeri_m->getAll2();
		$data['galeri'] = $galeri;

		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('parts/header');
		$this->load->view('pages/galeri_v', $data);
		$this->load->view('parts/footer');
		
	}

	public function detail($id){
		$galeri = $this->Galeri_m->getAll2();
		$data['galeri'] = $galeri;

		$detail = $this->Galeri_m->detail_data($id);
		$data['detail'] = $detail;

		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/galeri_v', $data);
		$this->load->view('parts/footer', $data);
	}
}