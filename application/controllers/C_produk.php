<?php 

class C_produk extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('M_produk', 'produk');
        $this->load->model('M_partner', 'partner');
    }

    public function index() {
        $data['view_file'] = 'admin/moduls/V_produk';
        $data['result'] = $this->produk->get_produk()->result();
        $data['partner'] = $this->partner->partner()->result();
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
        $nama_produk = $this->input->post('nama_produk');       
        $deskripsi_produk = $this->input->post('deskripsi_produk');
        $id_partner = $this->input->post('id_partner');
        $harga_pokok = $this->input->post('harga_pokok');
        $harga_member = $this->input->post('harga_member');
        $harga_publish = $this->input->post('harga_publish');
        
        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/foto_produk'),
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload = $this->uploader(
            $upload,
            array(
                'foto' => 'foto_produk'
            )
        );

        $dataInsert['nama_produk'] = $nama_produk;
        $dataInsert['deskripsi'] = $deskripsi_produk;
        $dataInsert['id_partner'] = $id_partner;
        $dataInsert['harga_pokok'] = $harga_pokok;
        $dataInsert['harga_jual_member'] = $harga_member;
        $dataInsert['harga_publish'] = $harga_publish;

        foreach ($dataUpload as $key => $value) {
            $dataInsert[$key] = $value;
        }

        if ($this->produk->insert_produk($dataInsert)) {
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

        $getData = $this->produk->get_produk($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        $upload = new FileUploadLibrary();
        $row = $getData->row();

        $remove = $this->remover(
            $upload,
            array(
                $row->foto
            ),
            'assets/foto_produk'
        );

        if (!$remove) {
            return JSONResponseDefault('FAILED', 'Gagal menghapus beberapa gambar');
        }

        if ($this->produk->delete_produk($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->produk->get_produk($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['partner'] = $this->partner->partner()->result();
        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/produk/edit', $data, true)
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
        $id = getPost('id_produk');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->produk->get_produk($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $nama_produk = getPost('nama_produk');       
        $deskripsi_produk = getPost('deskripsi_produk');
        $id_partner = getPost('id_partner');
        $harga_pokok = getPost('harga_pokok');
        $harga_member = getPost('harga_member');
        $harga_publish = getPost('harga_publish');

        $updateData['nama_produk'] = $nama_produk;
        $updateData['deskripsi'] = $deskripsi_produk;
        $updateData['id_partner'] = $id_partner;
        $updateData['harga_pokok'] = $harga_pokok;
        $updateData['harga_jual_member'] = $harga_member;
        $updateData['harga_publish'] = $harga_publish;

        $upload = new FileUploadLibrary();
        $upload->setConfig(array(
            'upload_path' => realpath('assets/foto_produk'),
            'allowed_types' => 'jpg|png|jpeg',
            'max_size' => 2048, //2 MB
            'encrypt_name' => true
        ));
        $upload->initialize();

        $dataUpload = $this->edit_img_remover(
            $upload,
            $getData->row(),
            array(
                'foto' => 'foto_produk'
            )
        );

        foreach ($dataUpload as $key => $value) {
            $updateData[$key] = $value;
        }

        if ($this->produk->update_produk($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}