<?php

class Merchant_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Merchant_m');
	}

	public function kuliner(){

		$jenis = 1;
		$kuliner_find = $this->Merchant_m->partnerfind($jenis);
		$data['kuliner_find'] = $kuliner_find;

		$this->load->view('parts/header');
		$this->load->view('pages/partner/kuliner_v', $data);
		$this->load->view('parts/footer');
	}


	public function it(){

		$jenis = 2;
		$it_find = $this->Merchant_m->partnerfind($jenis);
		$data['it_find'] = $it_find;

		$this->load->view('parts/header');
		$this->load->view('pages/partner/it_v', $data);
		$this->load->view('parts/footer');
	}

	public function legal(){

		$jenis = 3;
		$legal_find = $this->Merchant_m->partnerfind($jenis);
		$data['legal_find'] = $legal_find;

		$this->load->view('parts/header');
		$this->load->view('pages/partner/legal_v', $data);
		$this->load->view('parts/footer');
	}
	
	public function detail($id){
		$merchant = $this->Merchant_m->getAll2();
		$data['merchant'] = $merchant;

		$detail = $this->Merchant_m->detail_data($id);
		$data['detail'] = $detail;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/partner/detailpartner', $data);
		$this->load->view('parts/footer', $data);
	}
}