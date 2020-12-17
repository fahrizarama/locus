<?php

class Event_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Event_m');
		
	}

	public function index(){

		$event = $this->Event_m->getAll2();
		$data['event'] = $event;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/event_v', $data);
		$this->load->view('parts/footer', $data);
		
	}
	public function detail($id){
		$event = $this->Event_m->getAll2();
		$data['event'] = $event;

		$detail = $this->Event_m->detail_data($id);
		$data['detail'] = $detail;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/event/detailevent', $data);
		$this->load->view('parts/footer', $data);
		
	}
}