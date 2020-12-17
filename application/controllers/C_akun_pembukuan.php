<?php

class C_akun_pembukuan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_akun_pembukuan', 'akun');
    }

    public function akun($kategori)
    {
        $data['view_file'] = 'admin/moduls/akun_pembukuan/V_akun';
        $data['result'] = $this->akun->get_akun($kategori)->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function add_akun()
    {
        $id_akun = $this->input->post('id_akun');       
        $nama_akun = $this->input->post('nama_akun');
        $kategori_akun = $this->input->post('kategori_akun');

        $dataInsert['id_akun'] = $id_akun;
        $dataInsert['nama_akun'] = $nama_akun;
        $dataInsert['saldo_akun'] = '0';
        $dataInsert['kategori_akun'] = $kategori_akun;

        if ($this->akun->insert_akun($dataInsert)) {
            echo json_encode(array(
                'RESULT' => 'OK',
                'MESSAGE' => 'Akun berhasil ditambahkan'
            ));
            exit;
        } else {
            echo json_encode(array(
                'RESULT' => 'FAILED',
                'MESSAGE' => 'Gagal menambahkan akun'
            ));
            exit;
        }
    }

    public function hapus_akun()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->akun->get_akun($kategori = '', $id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        if ($this->akun->delete_akun($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_akun()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->akun->get_akun($kategori = '', $id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/akun_pembukuan/edit/edit_akun', $data, true)
        ));
    }

    public function edit_akun()
    {
        $id = getPost('id_akun');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->akun->get_akun($kategori = '', $id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $kode = getPost('kode');
        $nama_akun = getPost('nama_akun');

        $updateData['id_akun'] = $kode;
        $updateData['nama_akun'] = $nama_akun;

        if ($this->akun->update_akun($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
