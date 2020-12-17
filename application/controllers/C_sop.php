<?php

class C_sop extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_sop', 'sop');
    }

    public function index()
    {
        $data['view_file'] = 'admin/moduls/V_sop';
        $data['result'] = $this->sop->sop()->result();
        return $this->load->view('admin/admin_view', $data);
    }


    public function add_sop()
    {
        $bagian_sop = $this->input->post('bagian_sop');
        $deskripsi_sop = $this->input->post('deskripsi_sop');
        $tanggal_mulai = $this->input->post('tanggal_mulai');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        
      

        $dataInsert['bagian_sop'] = $bagian_sop;
        $dataInsert['deskripsi_sop'] = $deskripsi_sop;
        $dataInsert['tanggal_mulai'] = $tanggal_mulai;
        $dataInsert['tanggal_akhir'] = $tanggal_akhir;

       

        if ($this->sop->insert($dataInsert)) {
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

    public function hapus_sop()
    {
        $id = getPost('id', null);

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->sop->sop($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Tidak ada data yang ditemukan');
        }


        if ($this->sop->delete($id)) {
            return JSONResponseDefault('OK', 'Data berhasil dihapus');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal menghapus data');
        }
    }

    public function modal_edit_sop()
    {
        $id = getPost('id');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->sop->sop($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $data['data'] = $getData->row();

        return JSONResponse(array(
            'RESULT' => 'OK',
            'HTML' => $this->load->view('admin/moduls/sop/edit', $data, true)
        ));
    }

    // private function edit_img_remover($upload, $row, $index = array())
    // {
    //     $data = array();
    //     $deletedData = array();

    //     foreach ($index as $key => $value) {
    //         if ($_FILES[$value]['size'] > 0) {
    //             $data[$key] = $value;
    //             $deletedData[] = $row->$key;
    //         }
    //     }

    //     $this->remover($upload, $deletedData, 'assets/img');

    //     return $this->uploader($upload, $data);
    // }

    public function edit_sop()
    {
        $id = getPost('id_sop');

        if ($id == null) return JSONResponseDefault('FAILED', 'ID tidak ditemukan');

        $getData = $this->sop->sop($id);

        if ($getData->num_rows() == 0) {
            return JSONResponseDefault('FAILED', 'Data tidak ditemukan');
        }

        $bagian_sop = getPost('bagian_sop');
        $deskripsi_sop = getPost('deskripsi_sop');
        $tanggal_mulai = getPost('tanggal_mulai');
        $tanggal_akhir = getPost('tanggal_akhir');

        $updateData['bagian_sop'] = $bagian_sop;
        $updateData['deskripsi_sop'] = $deskripsi_sop;
        $updateData['tanggal_mulai'] = $tanggal_mulai;
        $updateData['tanggal_akhir'] = $tanggal_akhir;

        // $upload = new FileUploadLibrary();
        // $upload->setConfig(array(
        //     'upload_path' => realpath('assets/img'),
        //     'allowed_types' => 'jpg|png|jpeg',
        //     'max_size' => 2048, //2 MB
        //     'encrypt_name' => true
        // ));
        // $upload->initialize();

        // $dataUpload = $this->edit_img_remover(
        //     $upload,
        //     $getData->row(),
        //     array(
        //         'poster_sop' => 'poster_sop'
        //     )
        // );

        // foreach ($dataUpload as $key => $value) {
        //     $updateData[$key] = $value;
        // }

        if ($this->sop->update($id, $updateData)) {
            return JSONResponseDefault('OK', 'Data berhasil diubah');
        } else {
            return JSONResponseDefault('FAILED', 'Gagal mengubah data');
        }
    }
}
