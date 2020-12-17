<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('member');

	}

	public function index()
	{	
		$member = $this->member->getAll();
		$data['result'] = $member;

		$this->load->view('parts/header', $data);
		$this->load->view('member/personal/daftar_anggota', $data);
		$this->load->view('parts/footer', $data);
	}

}

/* End of file anggota_c.php */
/* Location: ./application/controllers/anggota_c.php */ ?>