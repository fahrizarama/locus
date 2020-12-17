<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perusahaan_c extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Beranda_m');
		$this->load->model('member_m');
	}

	public function index()
	{
		$slider = $this->Beranda_m->getAll2();
		$data['slider'] = $slider;
		$data['members'] = $this->member_m->getAllKategori()->result();

		$this->load->view('parts/header', $data);
		$this->load->view('member/perusahaan/home', $data);
		$this->load->view('parts/footer', $data);
	}

	public function anggota($id = '')
	{	
		$data['members'] = $this->member_m->getAllKategori()->result();

		if($id) {
			$member = $this->member_m->getData($id);
			$data['result'] = $member;
		} else {
			$member = $this->member_m->getData();
			$data['result'] = $member;
		}

		$this->load->view('parts/header', $data);
		$this->load->view('member/perusahaan/daftar_anggota', $data);
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
	
	public function modal_edit_member()
    {
        $id = getPost('id');

		if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');
		
		$getData = $this->member_m->getAll($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('member/profil/edit', $data, true)
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

    public function edit_member()
    {
        $id = getPost('id_member');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->member_m->getAll($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
		}
		
		if(getPost('password') == '' ) {
			$password = $this->session->userdata('view_password');
		} else {
			$password = getPost('password');
		}

		if(getPost('ulangi_password') == '' ) {
			$ulangi_password = $this->session->userdata('view_password');
		} else {
			$ulangi_password = getPost('ulangi_password');
		}

        $nama_member = getPost('nama_member');
        $profesi_member = getPost('profesi');
        $username = getPost('username');

        $updateData['nama_member'] = $nama_member;
        $updateData['username'] = $username;
		$updateData['profesi_member'] = $profesi_member;
		$updateData['password'] = md5($password);
		$updateData['view_password'] = $ulangi_password;

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
                'foto_kta' => 'foto_kta'
            )
        );

        foreach ($dataUpload as $key => $value) {
            $updateData[$key] = $value;
        }

		if($password == $ulangi_password) {
			if ($this->member_m->update($id, $updateData)) {
				return JSONResponseDefault('OK', 'Data berhasil diubah');
			} else {
				return JSONResponseDefault('FAILED', 'Gagal mengubah data');
			}
		} else {
			return JSONResponseDefault('FAILED', 'Password Tidak Sama');
		}
    }

}

/* End of file perusahaan_c.php */
/* Location: ./application/controllers/perusahaan_c.php */ ?>