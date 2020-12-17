<?php

class Survey_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Survey_m');
		$this->load->model('Merchant_m');
		$this->load->library('form_validation');
		$this->load->library('recaptcha');
	}

	public function index(){

		$survey = $this->Survey_m->getAll2();
		$data['survey'] = $survey;
		
        $data = array(
            'widget' => $this->recaptcha->getWidget(),
            'script' => $this->recaptcha->getScriptTag(),
        );

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('no_tlp', 'No Telepon', 'required');
        $this->form_validation->set_rules('deskripsi_survey', 'Tanggapan', 'required');

        $this->form_validation->set_message('required','%s masih kosong silahkan diisi');

        $recaptcha = $this->input->post('g-recaptcha-response');
        if (!empty($recaptcha)) {
            $response = $this->recaptcha->verifyResponse($recaptcha);
            if (isset($response['success']) and $response['success'] === true) {
		        if ($this->form_validation->run() == FALSE){
		            $this->load->view('parts/header', $data);
		    		$this->load->view('pages/survey_v', $data);
		            $this->load->view('parts/footer', $data);
		        }
		        else{
		        	if (!empty($recaptcha)) {
		        		echo "<script>alert('Kirim Survey Gagal!!. Silahkan Ulangi Kembali'); </script>";
		        	}
		            $post = $this->input->post(null, TRUE);
		            $this->Survey_m->add_data($post);

		            if ($this->db->affected_rows() > 0) {
		                echo "<script>alert('Data Survey Berhasil Dikirimkan!!'); </script>";
		            }
		            else{
		                echo "<script>alert('Kirim Survey Gagal!!. Silahkan Ulangi Kembali'); </script>";
		            }
		            echo "<script>window.location='".site_url('survey_c')."';</script>";            
		        }
                
            }
        }
        else{
		
        if ($this->form_validation->run() == FALSE){
			$partner = $this->Merchant_m->jenis_partner()->result();
			$data['jenis_partner'] = $partner;
			
            $this->load->view('parts/header', $data);
    		$this->load->view('pages/survey_v', $data);
            $this->load->view('parts/footer', $data);
		}
        else{
        	echo "<script>alert('Kirim Survey Gagal!!. Silahkan Ulangi Kembali dan Pastikan Checklist Captcha'); </script>";
        	echo "<script>window.location='".site_url('survey_c')."';</script>";
        	}           
        }
	}

}