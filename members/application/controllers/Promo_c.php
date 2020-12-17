<?php

class Promo_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Promo_m');
		
	}

	public function index(){

		$promo = $this->Promo_m->getAll2();
		$data['promo'] = $promo;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/promo_v', $data);
		$this->load->view('parts/footer', $data);
		
	}

	public function detail_promo($id){

		$promo = $this->Promo_m->getAll2();
		$data['promo'] = $promo;

		$detail = $this->Promo_m->detail_promo($id);
		$data['detail'] = $detail;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/promo/detailpromo', $data);
		$this->load->view('parts/footer', $data);
		
	}
}