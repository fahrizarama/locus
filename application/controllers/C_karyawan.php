<?php

class C_karyawan extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_karyawan', 'karyawan');
        $this->load->model('M_recruitment');
    }

    public function index()
    {
        $data['view_file'] = 'admin/moduls/V_karyawan';
        $data['result'] = $this->karyawan->get_data_karyawan()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function kirim_email($id) {
        //pengaturan email
        $this->load->library('email');//panggil library email codeigniter
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'bisnisask@gmail.com',//alamat email gmail pengirim
            'smtp_pass' => 'askbisnis100',//password email pengirim
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'wordwrap' => TRUE
        );

        $karyawan = $this->karyawan->get_detail_karyawan($id)->row();//Mengambil data karyawan yang akan dikirim email
        $data['karyawan'] = $karyawan;
        $message = $this->load->view('admin/moduls/karyawan/email_body', $data, true);//ini adalah isi/body email
        $email = $karyawan->email;//email penerima

        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        $this->email->from($config['smtp_user']);
        $this->email->to($email);
        $this->email->subject('Email verifikasi');//subjek email
        $this->email->message($message);
        
        //proses kirim email
        if($this->email->send()){
            $this->session->set_flashdata('message','Sukses kirim email');
            redirect('C_karyawan/index');
        }
        else{
            $this->session->set_flashdata('message', $this->email->print_debugger());
        }
    }

    public function detail_karyawan()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getDataKaryawan = $this->karyawan->get_detail_karyawan($id);

        if ($getDataKaryawan->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $getRiwayatKesehatan = $this->M_recruitment->get_riwayat_kesehatan($id);
        $getRiwayatPekerjaan = $this->M_recruitment->get_riwayat_pekerjaan($id);
        $getPendidikanFormal = $this->M_recruitment->get_pendidikan_formal($id);
        $getPendidikanNonFormal = $this->M_recruitment->get_pendidikan_non_formal($id);
        $getPengalamanOrganisasi = $this->M_recruitment->get_pengalaman_organisasi($id);
        $getReferensiPekerjaan = $this->M_recruitment->get_referensi_pekerjaan($id);
        $getPenguasaanBahasa = $this->M_recruitment->get_penguasaan_bahasa($id);
        $getPenguasaanKomputer = $this->M_recruitment->get_penguasaan_komputer($id);
        $getKontakDarurat = $this->M_recruitment->get_kontak_darurat($id);
        $getPemohonPekerjaan = $this->M_recruitment->get_pemohon_pekerjaan($id);
        $getDaftarJabatan = $this->M_recruitment->get_daftar_jabatan();

        $data['pelamar'] = $getDataKaryawan->row();
        $data['kesehatan'] = $getRiwayatKesehatan->result();
        $data['pekerjaan'] = $getRiwayatPekerjaan->result();
        $data['referensi'] = $getReferensiPekerjaan->result();
        $data['pendidikan_formal'] = $getPendidikanFormal->result();
        $data['pendidikan_non_formal'] = $getPendidikanNonFormal->result();
        $data['organisasi'] = $getPengalamanOrganisasi->result();
        $data['bahasa'] = $getPenguasaanBahasa->result();
        $data['komputer'] = $getPenguasaanKomputer->result();
        $data['kontak_darurat'] = $getKontakDarurat->row();
        $data['pemohon_pekerjaan'] = $getPemohonPekerjaan->row();
        $data['jabatan'] = $getDaftarJabatan->result();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/karyawan/detail', $data, true)
        ));
    }

    public function ganti_jabatan()
    {
        $id = getPost('id_karyawan');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getDataKaryawan = $this->karyawan->get_detail_karyawan($id);

        if ($getDataKaryawan->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $jabatan = $this->input->post('jabatan');

        $updateData['id_jabatan'] = $jabatan;

        if ($this->M_recruitment->confirm($id, $updateData)) {
            return JSONResponseDefault('OK', 'Ganti Jabatan Berhasil');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal Ganti Jabatan');
        }

    }

    //JABATAN
    private function upload_icon($upload, $index = array())
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

    public function remove_icon($upload, $index = array(), $location)
    {
        foreach ($index as $key => $value) {
            if (!$upload->remove($value, $location)) {
                return false;
            }
        }

        return true;
    }

    public function jabatan() {
        $data['view_file'] = 'admin/moduls/V_jabatan';
        $data['result'] = $this->karyawan->get_daftar_jabatan()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function tambah_jabatan() {
        $nama_jabatan = $this->input->post('nama_jabatan');
        
        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/icon_jabatan'),
            'allowed_types' => 'png',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload = $this->upload_icon(
            $upload,
            array(
                'icon' => 'icon_jabatan'
            )
        );

        $dataInsert['nama_jabatan'] = $nama_jabatan;

        if($dataUpload != NULL) {
            foreach ($dataUpload as $key => $value) {
                $dataInsert[$key] = $value;
            }
        }

        if ($this->karyawan->insert_jabatan($dataInsert)) {
            echo json_encode(array(
                'RESULT' => 'OK',
                'MESSAGE' => 'Data jabatan berhasil ditambahkan'
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

    public function hapus_jabatan() {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->karyawan->get_daftar_jabatan($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        $upload = new FileUploadLibrary();
        $row = $getData->row();

        $remove = $this->remove_icon(
            $upload,
            array(
                $row->icon
            ),
            'assets/icon_jabatan'
        );

        if (!$remove) {
            return JSONResponseDefault('FAILED', 'Gagal menghapus icon');
        }

        if ($this->karyawan->delete_jabatan($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_jabatan()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->karyawan->get_daftar_jabatan($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/jabatan/edit', $data, true)
        ));
    }

    private function edit_img_remove_icon($upload, $row, $index = array())
    {
        $data = array();
        $deletedData = array();

        foreach ($index as $key => $value) {
            if ($_FILES[$value]['size'] > 0) {
                $data[$key] = $value;
                $deletedData[] = $row->$key;
            }
        }

        $this->remove_icon($upload, $deletedData, 'assets/icon_jabatan');

        return $this->upload_icon($upload, $data);
    }

    public function edit_jabatan()
    {
        $id = getPost('id_jabatan');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->karyawan->get_daftar_jabatan($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $nama_jabatan = getPost('nama_jabatan');

        $updateData['nama_jabatan'] = $nama_jabatan;

        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/icon_jabatan'),
            'allowed_types' => 'png',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload = $this->edit_img_remove_icon(
            $upload,
            $getData->row(),
            array(
                'icon' => 'icon_jabatan'
            )
        );

        foreach ($dataUpload as $key => $value) {
            $updateData[$key] = $value;
        }

        if ($this->karyawan->update_jabatan($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }

}