<?php

class Beranda_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Beranda_m');
		$this->load->model('Promo_m');
		$this->load->model('Event_m');
		$this->load->model('Merchant_m');
		
	}

	public function index(){

		$slider = $this->Beranda_m->getAll2();
		$data['slider'] = $slider;

		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$promo = $this->Promo_m->getAll5();
		$data['promo_beranda'] = $promo;

		$promo_kosong = $this->Promo_m->getAll_promo_kosong();
		$data['promo_beranda_kosong'] = $promo_kosong;
		
		$event = $this->Event_m->getAll5();
		$data['event_beranda'] = $event;

		$event_kosong = $this->Event_m->getAll_event_kosong();
		$data['event_beranda_kosong'] = $event_kosong;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/beranda_v', $data);
		$this->load->view('parts/footer', $data);
		
	}
}