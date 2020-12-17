<?php

class Artikel_c extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('Artikel_m');
		$this->load->model('M_artikel', 'artikel');
		$this->load->model('M_komentar', 'komentar');
        $this->load->model('Beranda_m');
        $this->load->model('member_m');
		$this->load->library('form_validation');
		$this->load->library('recaptcha');
	}

	public function index(){

        $data['result'] = $this->Artikel_m->artikelview();
		$data['artikel'] = $this->Artikel_m->getAll2();
		$data['data'] = $this->Artikel_m->artikelpopuler();

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

	//ARTIKEL KHUSUS MEMBERS
	public function artikel($id_member) {
		$slider = $this->Beranda_m->getAll2();
		$data['slider'] = $slider;

        $data['result'] = $this->artikel->artikelFindByMembers($id_member);
        $data['members'] = $this->member_m->getAllKategori()->result();

        $this->load->view('parts/header', $data);
        if($this->session->userdata('id_kategori') == '1') {
            $this->load->view('member/personal/artikel', $data);
        } elseif($this->session->userdata('id_kategori') == '2') {
            $this->load->view('member/komunitas/artikel', $data);
        } elseif($this->session->userdata('id_kategori') == '3') {
            $this->load->view('member/perusahaan/artikel', $data);
        } else {
            $this->load->view('member/pendidikan/artikel', $data);
        }
        $this->load->view('parts/footer', $data);
		
	}

	private function uploader($upload, $index = array())
    {
        $data = array();

        foreach ($index as $key => $value) {
            if (isset($_FILES[$value]['size']) > 0) {
                if ($upload->upload($value)) {
                    $file_name = $upload->get_file_name();

                    $data[$key] = $file_name;
                } else {
                    return false;
                }
            } else {
                $data[$key] = null;
            }
        }

        return $data;
    }

    public function remover($upload, $index = array(), $location)
    {
        foreach ($index as $key => $value) {
            if (!$upload->remove($value, $location)) {
                return false;
            }
        }
        return true;
    }

    public function add_artikel()
    {
        $judul_artikel = $this->input->post('judul_artikel');       
        $deskripsi_artikel = $this->input->post('deskripsi_artikel');
        $tanggal_artikel = $this->input->post('tanggal_artikel');
		$artikel_dilihat = '0';
		$status_artikel = '0';
        $id_member = $this->session->userdata('id_member');
        
        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/img'),
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload = $this->uploader(
            $upload,
            array(
                'foto_artikel' => 'foto_artikel'
            )
        );

        $dataInsert['judul_artikel'] = $judul_artikel;
        $dataInsert['deskripsi_artikel'] = $deskripsi_artikel;
        $dataInsert['tanggal_artikel'] = $tanggal_artikel;
		$dataInsert['artikel_dilihat'] = $artikel_dilihat;
		$dataInsert['status_artikel'] = $status_artikel;
        $dataInsert['id_member'] = $id_member;

        foreach ($dataUpload as $key => $value) {
            $dataInsert[$key] = $value;
        }

        if ($this->artikel->insert($dataInsert)) {
            echo json_encode(array(
                'RESULT' => 'OK',
                'MESSAGE' => 'Data berhasil ditambahkan'
            ));
            exit;
        } else {
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Gagal menambahkan data'
            ));
            exit;
        }
    }

    public function hapus_artikel()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->artikel->artikel($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        $upload = new FileUploadLibrary();
        $row = $getData->row();

        $remove = $this->remover(
            $upload,
            array(
                $row->foto_artikel
            ),
            'assets/img'
        );

        if (!$remove) {
            return JSONResponseDefault('FAILED', 'Gagal menghapus beberapa gambar');
        }

        if ($this->artikel->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_artikel()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->artikel->artikel($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('member/artikel/edit', $data, true)
        ));
    }

    private function edit_img_remover($upload, $row, $index = array())
    {
        $data = array();
        $deletedData = array();

        foreach ($index as $key => $value) {
            if ($_FILES[$value]['size'] > 0) {
                $data[$key] = $value;
                $deletedData[] = $row->$key;
            }
        }

        $this->remover($upload, $deletedData, 'assets/img');

        return $this->uploader($upload, $data);
    }

    public function edit_artikel()
    {
        $id = getPost('id_artikel');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->artikel->artikelfind($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $judul_artikel = getPost('judul_artikel');
        $deskripsi_artikel = getPost('deskripsi_artikel');
        $tanggal_artikel = getPost('tanggal_artikel');
        $artikel_dilihat = getPost('artikel_dilihat');
        $status_artikel = '0';
        $id_member = $this->session->userdata('id_member');

        $updateData['id_member'] = $id_member;
        $updateData['judul_artikel'] = $judul_artikel;
        $updateData['deskripsi_artikel'] = $deskripsi_artikel;
        $updateData['tanggal_artikel'] = $tanggal_artikel;
        $updateData['artikel_dilihat'] = $artikel_dilihat;
        $updateData['status_artikel'] = $status_artikel;

        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/img'),
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload = $this->edit_img_remover(
            $upload,
            $getData->row(),
            array(
                'foto_artikel' => 'foto_artikel'
            )
        );

        foreach ($dataUpload as $key => $value) {
            $updateData[$key] = $value;
        }

        if ($this->artikel->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }

}
