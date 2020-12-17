<?php

class Event_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Event_m');
		$this->load->model('Merchant_m');
	}

	public function index(){

		$event = $this->Event_m->getAll2();
		$data['event'] = $event;

		$event2 = $this->Event_m->getAll3();
		$data['event2'] = $event2;

		$event3 = $this->Event_m->getAll4();
		$data['event3'] = $event3;
		
		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/event_v', $data);
		$this->load->view('parts/footer', $data);
		
	}
	public function detail($id){
		$event = $this->Event_m->getAll2();
		$data['event'] = $event;

		$detail = $this->Event_m->detail_data($id);
		$data['detail'] = $detail;
		
		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/event/detailevent', $data);
		$this->load->view('parts/footer', $data);
		
	}
}