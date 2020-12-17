<?php

class C_partner extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_partner', 'partner');
    }

    public function index($id = '')
    {
        $data['view_file'] = 'admin/moduls/V_partner';

        $getJenisOne = $this->partner->get_jenis_one()->result();
        foreach ($getJenisOne as $item) {
            $id_jenis = $item->id_jenis_partner;
        }

        if($id) {
            $data['result'] = $this->partner->partnerFindByJenis($id)->result();
            $data['id_jenis'] = $this->partner->jenis_partner($id)->result();
        } else {
            $data['result'] = $this->partner->partnerFindByJenis($id_jenis)->result();
            $data['id_jenis'] = $this->partner->jenis_partner($id_jenis)->result();
        }
        $data['jenis_partner'] = $this->partner->jenis_partner()->result();
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
        $nama_partner = $this->input->post('nama_partner');       
        $deskripsi_partner = $this->input->post('deskripsi_partner');
        $website_partner = $this->input->post('website_partner');       
        $email_partner = $this->input->post('email_partner');
        $kontak_partner = $this->input->post('kontak_partner');
        $jenis_partner = $this->input->post('jenis_partner');
        
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
                'logo_partner' => 'logo_partner'
            )
        );

        $dataInsert['nama_partner'] = $nama_partner;
        $dataInsert['deskripsi_partner'] = $deskripsi_partner;
        $dataInsert['website_partner'] = $website_partner;
        $dataInsert['email_partner'] = $email_partner;
        $dataInsert['kontak_partner'] = $kontak_partner;
        $dataInsert['jenis_partner'] = $jenis_partner;

        foreach ($dataUpload as $key => $value) {
            $dataInsert[$key] = $value;
        }

        if ($this->partner->insert($dataInsert)) {
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

        $getData = $this->partner->partner($id);

        if ($getData->num_rows() == 0) {
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

        if ($this->partner->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_produk()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->partner->partner($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/partner/edit', $data, true)
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
        $id = getPost('id_partner');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->partner->partner($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $nama_partner = getPost('nama_partner');
        $deskripsi_partner = getPost('deskripsi_partner');
        $website_partner = getPost('website_partner');
        $email_partner = getPost('email_partner');
        $kontak_partner = getPost('kontak_partner');

        $updateData['nama_partner'] = $nama_partner;
        $updateData['deskripsi_partner'] = $deskripsi_partner;
        $updateData['website_partner'] = $website_partner;
        $updateData['email_partner'] = $email_partner;
        $updateData['kontak_partner'] = $kontak_partner;

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
                'logo_partner' => 'logo_partner'
            )
        );

        foreach ($dataUpload as $key => $value) {
            $updateData[$key] = $value;
        }

        if ($this->partner->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }

    //JENIS PARTNER
    public function jenis_partner() {
        $data['view_file'] = 'admin/moduls/V_jenis_partner';
        $data['result'] = $this->partner->jenis_partner()->result();
        return $this->load->view('admin/admin_view', $data);
    }

    public function add_jenis_partner()
    {       
        $nama_jenis_partner = $this->input->post('nama_jenis_partner');

        $dataInsert['nama_jenis_partner'] = $nama_jenis_partner;

        if ($this->partner->insert_jenis_partner($dataInsert)) {
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

    public function hapus_jenis_partner()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->partner->jenis_partner($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }

        if ($this->partner->delete_jenis_partner($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_jenis()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->partner->jenis_partner($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/partner/jenis_partner/edit', $data, true)
        ));
    }

    public function edit_jenis_partner()
    {
        $id = getPost('id_jenis_partner');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->partner->jenis_partner($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $nama_jenis_partner = getPost('nama_jenis_partner');

        $updateData['nama_jenis_partner'] = $nama_jenis_partner;

        if ($this->partner->update_jenis_partner($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
