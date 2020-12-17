<?php

class Artikel_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Artikel_m');
		$this->load->model('M_artikel', 'artikel');
		$this->load->model('M_komentar', 'komentar');
		$this->load->model('Merchant_m');
		$this->load->library('form_validation');
		$this->load->library('recaptcha');
	}

	public function index(){

        $data['result'] = $this->Artikel_m->artikelview();
		$data['artikel'] = $this->Artikel_m->getAll2();
		$data['data'] = $this->Artikel_m->artikelpopuler();
		$data['jenis_partner'] = $this->Merchant_m->jenis_partner()->result();

		$this->load->view('parts/header', $data);
		$this->load->view('pages/artikel_v', $data);
        $this->load->view('parts/footer', $data);
		
	}

	public function detail($id){

		$data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag(),
        );
        $data['komentar'] = $this->Artikel_m->komentarview($id);
		$data['data'] = $this->Artikel_m->artikelpopuler();
		$data['artikel'] = $this->Artikel_m->getAll2();
        $data['result'] = $this->Artikel_m->artikelview($id);
		$data['jenis_partner'] = $this->Merchant_m->jenis_partner()->result();

        $this->form_validation->set_rules('nama_komentar', 'Nama', 'required');
        $this->form_validation->set_rules('email_komentar', 'Email', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required');
        $this->form_validation->set_rules('deskripsi_komentar', 'Tanggapan', 'required');

        $this->form_validation->set_message('required','%s masih kosong silahkan diisi');


        $id_artikel = $this->input->post('id_artikel');
        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
		        if ($this->form_validation->run() == FALSE){
					$this->load->view('parts/header', $data);
					$this->load->view('pages/artikel/detailartikel', $data);
			        $this->load->view('parts/footer', $data);
		        }
		        else{
		        	$post = $this->input->post(null, TRUE);
		            $this->Artikel_m->add_data($post);


		            if ($this->db->affected_rows() > 0) {
		                echo "<script>alert('Komentar Berhasil Dikirimkan!!'); </script>";
		            }
		            else{
		            	echo "<script>alert('Kirim Komentar Gagal!!. Silahkan Ulangi Kembali'); </script>";
		            }
		            echo "<script>window.location='".site_url('artikel_c/detail/'.$id_artikel)."';</script>";   
		        }
            }
        }
        else{
	        if ($this->form_validation->run() == FALSE){
				$this->load->view('parts/header', $data);
				$this->load->view('pages/artikel/detailartikel', $data);
		        $this->load->view('parts/footer', $data);
	        }
	        else{
	        	echo "<script>alert('Kirim Komentar Gagal!!. Silahkan Ulangi Kembali dan Pastikan Checklist Captcha'); </script>";
	            echo "<script>window.location='".site_url('artikel_c/detail/'.$id_artikel)."';</script>";   
	        }
        }

	}

}
