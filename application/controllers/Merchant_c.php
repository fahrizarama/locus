<?php

class Merchant_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Merchant_m');
	}

	public function partner($id) {

		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$partnerFind = $this->Merchant_m->partnerfind($id);
		$data['partnerFind'] = $partnerFind;

		$this->load->view('parts/header');
		$this->load->view('pages/partner/partner_v', $data);
		$this->load->view('parts/footer');
	}
	
	public function detail($id){
		$merchant = $this->Merchant_m->getAll2();
		$data['merchant'] = $merchant;

		$detail = $this->Merchant_m->detail_data($id);
		$data['detail'] = $detail;

		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/partner/detailpartner', $data);
		$this->load->view('parts/footer', $data);
	}
}