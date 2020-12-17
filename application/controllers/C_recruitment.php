<?php

class C_recruitment extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_recruitment');
    }

    public function index()
    {
        $data['view_file'] = 'admin/moduls/V_recruitment';
        $data['result'] = $this->M_recruitment->get_data_pelamar()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function detail_pelamar()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getDataPelamar = $this->M_recruitment->get_detail_pelamar($id);

        if ($getDataPelamar->num_rows() == 0) {
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

        $data['pelamar'] = $getDataPelamar->row();
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
            'HTML' => $this->load->view('admin/moduls/recruitment/detail', $data, true)
        ));
    }

    function get_random_password($chars_min=6, $chars_max=8, $use_upper_case=true, $include_numbers=true, $include_special_chars=false)
    {
        $length = rand($chars_min, $chars_max);
        $selection = 'aeuoyibcdfghjklmnpqrstvwxz';
        if($include_numbers) {
            $selection .= "1234567890";
        }
        if($include_special_chars) {
            $selection .= "!@\"#$%&[]{}?|";
        }
                                
        $password = "";
        for($i=0; $i<$length; $i++) {
            $current_letter = $use_upper_case ? (rand(0,1) ? strtoupper($selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))]) : $selection[(rand() % strlen($selection))];            
            $password .=  $current_letter;
        }                
        
      return $password;
    }

    public function confirm_pelamar()
    {
        $id = getPost('id_karyawan');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getDataPelamar = $this->M_recruitment->get_detail_pelamar($id);

        if ($getDataPelamar->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $password = $this->get_random_password();
        $jabatan = $this->input->post('jabatan');
        $status = 'Karyawan';

        $updateData['status'] = $status;
        $updateData['id_jabatan'] = $jabatan;
        $updateData['password'] = $password;

        if ($this->M_recruitment->confirm($id, $updateData)) {
            return JSONResponseDefault('OK', 'Pelamar Diterima');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal Menerima Pelamar');
        }

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

    public function hapus_pelamar()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getDataPelamar = $this->M_recruitment->get_detail_pelamar($id);

        if ($getDataPelamar->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        $upload = new FileUploadLibrary();
        $row = $getData->row();

        $remove = $this->remover(
            $upload,
            array(
                $row->logo_partner
            ),
            'assets/img'
        );

        if (!$remove) {
            return JSONResponseDefault('FAILED', 'Gagal menghapus beberapa gambar');
        }

        if ($this->M_recruitment->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }
}