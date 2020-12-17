<?php

class C_tentang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_tentang', 'tentang');
    }

    public function index()
    {
        $data['view_file'] = 'admin/moduls/V_tentang';
        $data['result'] = $this->tentang->tentang()->result();
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
        $nama_depan = $this->input->post('nama_depan');
        $nama_belakang = $this->input->post('nama_belakang');
        $deskripsi_tentang = $this->input->post('deskripsi_tentang');

        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/img'),
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload = $this->uploader($upload, array(
            'foto_tentang' => 'foto_tentang'
        ));

        $dataInsert['nama_depan'] = $nama_depan;
        $dataInsert['nama_belakang'] = $nama_belakang;
        $dataInsert['deskripsi_tentang'] = $deskripsi_tentang;

        foreach ($dataUpload as $key => $value) {
            $dataInsert[$key] = $value;
        }

        if ($this->tentang->insert($dataInsert)) {
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

        $getData = $this->tentang->tentang($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        $upload = new FileUploadLibrary();
        $row = $getData->row();

        $remove = $this->remover($upload, array(
            $row->foto_tentang
        ), 'assets/img');

        if (!$remove) {
            return JSONResponseDefault('FAILED', 'Gagal menghapus beberapa gambar');
        }

        if ($this->tentang->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->tentang->tentang($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/tentang/edit', $data, true)
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
        $id = getPost('id_tentang');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->tentang->tentang($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $nama_depan = getPost('nama_depan');
        $nama_belakang = getPost('nama_belakang');
        $deskripsi_tentang = getPost('deskripsi_tentang');
        $visi = getPost('visi');
        $misi = getPost('misi');

        $updateData['nama_depan'] = $nama_depan;
        $updateData['nama_belakang'] = $nama_belakang;
        $updateData['deskripsi_tentang'] = $deskripsi_tentang;
        $updateData['visi'] = $visi;
        $updateData['misi'] = $misi;

        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/img'),
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload = $this->edit_img_remover($upload, $getData->row(), array(
            'foto_tentang' => 'foto_tentang'
        ));

        foreach ($dataUpload as $key => $value) {
            $updateData[$key] = $value;
        }

        if ($this->tentang->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
