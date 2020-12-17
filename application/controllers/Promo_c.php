<?php

class Promo_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Promo_m');
		$this->load->model('Merchant_m');
	}

	public function index(){

		$promo = $this->Promo_m->getAll2();
		$data['promo'] = $promo;

		$promo2 = $this->Promo_m->getAll3();
		$data['promo2'] = $promo2;

		$promo3 = $this->Promo_m->getAll4();
		$data['promo3'] = $promo3;

		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/promo_v', $data);
		$this->load->view('parts/footer', $data);
		
	}

	public function detail_promo($id){

		$promo = $this->Promo_m->getAll2();
		$data['promo'] = $promo;

		$detail = $this->Promo_m->detail_promo($id);
		$data['detail'] = $detail;

		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/promo/detailpromo', $data);
		$this->load->view('parts/footer', $data);
		
	}
}