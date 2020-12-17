<?php

class Profil_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Profil_m');
		$this->load->model('member_m');
	}

	public function index(){

		$tentang = $this->Profil_m->getAll2();
		$data['tentang'] = $tentang;

		$this->load->view('parts/header', $data);
		$this->load->view('pages/profil_v', $data);
		$this->load->view('parts/footer', $data);
		
	}

	public function profil_personal($id_member){

		$data['profil'] = $this->member_m->getAll($id_member);

		$data['members'] = $this->member_m->getAllKategori()->result();
		
		$this->load->view('parts/header', $data);
		if($this->session->userdata('id_kategori') == '1') {
            $this->load->view('member/personal/profil_v', $data);
        } elseif($this->session->userdata('id_kategori') == '2') {
            $this->load->view('member/komunitas/profil_v', $data);
        } elseif($this->session->userdata('id_kategori') == '3') {
            $this->load->view('member/perusahaan/profil_v', $data);
        } else {
            $this->load->view('member/pendidikan/profil_v', $data);
        }
		$this->load->view('parts/footer', $data);
		
	}
}