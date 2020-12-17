<?php

class Recruitmen_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('recaptcha');
		$this->load->model('Recruitmen_m');
		$this->load->model('Merchant_m');
	}

	public function index(){
		$partner = $this->Merchant_m->jenis_partner()->result();
		$data['jenis_partner'] = $partner;

		$this->load->view('pages/recruitmen_v', $data);
		$this->load->view('parts/footer' );
		$this->load->view('parts/header');
	}

	public function rekrutmen() {
		
		$foto = '0';
		$status = 'Pelamar';

		$this->form_validation->set_message('required','%s masih kosong silahkan diisi');

		$data_karyawan = array (
			'nama_lengkap' => $this->input->post('nama_lengkap'),
			'foto' => $foto,
			'email' => $this->input->post('email'),
			'NPWP' => $this->input->post('NPWP'),
			'status_nikah' => $this->input->post('status_nikah'),
			'jenis_kelamin' => $this->input->post('jenis_kelamin'),
			'tempat_tgl_lahir' => $this->input->post('tempat_tgl_lahir'),
			'agama' => $this->input->post('agama'),
			'alamat' => $this->input->post('alamat'),
			'status_rumah' => $this->input->post('status_rumah'),
			'telephone' => $this->input->post('telephone'),
			'kebangsaan' => $this->input->post('kebangsaan'),
			'suku' => $this->input->post('suku'),
			'tinggi_badan' => $this->input->post('tinggi_badan'),
			'berat_badan' => $this->input->post('berat_badan'),
			'merokok' => $this->input->post('merokok'),
			'cacat_fisik' => $this->input->post('cacat_fisik'),
			'sakit_periodik' => $this->input->post('sakit_periodik'),
			'alergi' => $this->input->post('alergi'),
			'status' => $status
		);

		if($this->form_validation->run('karyawan') === FALSE)
		{
			$this->load->view('pages/recruitmen_v', $data_karyawan);
			$this->load->view('parts/footer' );
			$this->load->view('parts/header');
		}else{
			$this->Recruitmen_m->add_data($data_karyawan);
			redirect( site_url('Recruitmen_c') );
		}
        
	}

}