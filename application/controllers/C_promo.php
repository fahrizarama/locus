<?php

class C_promo extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_promo', 'promo');
    }

    public function index()
    {
        $data['view_file'] = 'admin/moduls/V_promo';
        $data['result'] = $this->promo->promo()->result();
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
        $judul_promo = $this->input->post('judul_promo');
        $deskripsi_promo = $this->input->post('deskripsi_promo');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        
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
                'poster_promo' => 'poster_promo'
            )
        );

        $dataInsert['judul_promo'] = $judul_promo;
        $dataInsert['deskripsi_promo'] = $deskripsi_promo;
        $dataInsert['tanggal_mulai'] = $tanggal_mulai;
        $dataInsert['tanggal_akhir'] = $tanggal_akhir;

        foreach ($dataUpload as $key => $value) {
            $dataInsert[$key] = $value;
        }

        if ($this->promo->insert($dataInsert)) {
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

        $getData = $this->promo->promo($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        $upload = new FileUploadLibrary();
        $row = $getData->row();

        $remove = $this->remover(
            $upload,
            array(
                $row->poster_promo
            ),
            'assets/img'
        );

        if (!$remove) {
            return JSONResponseDefault('FAILED', 'Gagal menghapus beberapa gambar');
        }

        if ($this->promo->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->promo->promo($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/promo/edit', $data, true)
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
        $id = getPost('id_promo');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->promo->promo($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $judul_promo = getPost('judul_promo');
        $deskripsi_promo = getPost('deskripsi_promo');
        $tanggal_mulai = getPost('tanggal_mulai');
        $tanggal_akhir = getPost('tanggal_akhir');

        $updateData['judul_promo'] = $judul_promo;
        $updateData['deskripsi_promo'] = $deskripsi_promo;
        $updateData['tanggal_mulai'] = $tanggal_mulai;
        $updateData['tanggal_akhir'] = $tanggal_akhir;

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
                'poster_promo' => 'poster_promo'
            )
        );

        foreach ($dataUpload as $key => $value) {
            $updateData[$key] = $value;
        }

        if ($this->promo->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
