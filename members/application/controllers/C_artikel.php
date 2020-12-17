<?php

class C_artikel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_artikel', 'artikel');
        $this->load->model('M_member', 'member');
    }

    public function index()
    {
        $data['view_file'] = 'admin/moduls/V_artikel';
        $data['data'] = $this->member->member();
        $data['result'] = $this->artikel->artikelfind()->result();
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
        $judul_artikel = $this->input->post('judul_artikel');       
        $deskripsi_artikel = $this->input->post('deskripsi_artikel');
        $tanggal_artikel = $this->input->post('tanggal_artikel');
        $artikel_dilihat = $this->input->post('artikel_dilihat');
        $id_member = $this->input->post('id_member');
        
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

    public function hapus_produk()
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

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->artikel->artikelfind($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['row'] = $this->member->member();
        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/artikel/edit', $data, true)
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
        $id = getPost('id_artikel');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->artikel->artikelfind($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }


        $id_member = getPost('id_member');
        $judul_artikel = getPost('judul_artikel');
        $deskripsi_artikel = getPost('deskripsi_artikel');
        $tanggal_artikel = getPost('tanggal_artikel');
        $artikel_dilihat = getPost('artikel_dilihat');

        $updateData['id_member'] = $id_member;
        $updateData['judul_artikel'] = $judul_artikel;
        $updateData['deskripsi_artikel'] = $deskripsi_artikel;
        $updateData['tanggal_artikel'] = $tanggal_artikel;
        $updateData['artikel_dilihat'] = $artikel_dilihat;

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
