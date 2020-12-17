<?php

class C_komentar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_komentar', 'komentar');
        $this->load->model('M_artikel', 'artikel');
        date_default_timezone_set("Asia/Jakarta");
    }

    public function index()
    {
        $data['view_file'] = 'admin/moduls/V_komentar';
        $data['data'] = $this->artikel->artikel();
        $data['result'] = $this->komentar->komentarfind()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function comment_by_artikel($id) 
    {
        $data['view_file'] = 'admin/moduls/V_komentar';
        $data['data'] = $this->artikel->artikel();
        $data['result'] = $this->komentar->komentarfind('', $id)->result();
        return $this->load->view('admin/admin_view', $data);
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

    public function add_produk()
    {
        $id_artikel = $this->input->post('id_artikel');
        $nama_komentar = $this->input->post('nama_komentar');
        $email_komentar = $this->input->post('email_komentar');
        $no_tlp = $this->input->post('no_tlp');
        $deskripsi_komentar = $this->input->post('deskripsi_komentar');

        $dataInsert['id_artikel'] = $id_artikel;
        $dataInsert['nama_komentar'] = $nama_komentar;
        $dataInsert['email_komentar'] = $email_komentar;
        $dataInsert['no_tlp'] = $no_tlp;
        $dataInsert['deskripsi_komentar'] = $deskripsi_komentar;

        if ($this->komentar->insert($dataInsert)) {
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

    public function hapus_produk()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->komentar->komentar($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        if ($this->komentar->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->komentar->komentarfind($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['row'] = $this->artikel->artikel();
        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/komentar/edit', $data, true)
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

    public function edit_produk()
    {
        $id = getPost('id_komentar');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->komentar->komentarfind($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }


        $id_artikel = getPost('id_artikel');
        $nama_komentar = getPost('nama_komentar');
        $email_komentar = getPost('email_komentar');
        $no_tlp = getPost('no_tlp');
        $deskripsi_komentar = getPost('deskripsi_komentar');

        $updateData['id_artikel'] = $id_artikel;
        $updateData['nama_komentar'] = $nama_komentar;
        $updateData['email_komentar'] = $email_komentar;
        $updateData['no_tlp'] = $no_tlp;
        $updateData['deskripsi_komentar'] = $deskripsi_komentar;

        if ($this->komentar->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
