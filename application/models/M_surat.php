<?php
defined('BASEPATH') or die('No direct script access allowed!');

class M_surat extends CI_Model
{
    private $tabel = "tb_surat_masuk";
    private $tabel2 = "tb_surat_keluar";

    //surat masuk
    public function surat_masuk()
    {
        return $this->db->get($this->tabel)->result();
    }

    public function save_suratm()
    {
        $post = $this->input->post();
        $this->no_surat = $post['no_surat'];
        $this->tanggal_surat = $post['tanggal_surat'];
        $this->perihal_surat = $post['perihal_surat'];
        $this->tembusan_surat = $post['tembusan_surat'];
        $this->penulis_surat = $post['penulis_surat'];
        $this->file_surat = $this->UploadFile();

        $this->db->insert($this->tabel, $this);
    }

    private function UploadFile()
    {
        $config['upload_path']          = './assets/file_surat/suratmasuk/';
        $config['allowed_types']        = 'pdf|docx';
        $nama_lengkap = $_FILES['file_surat']['name'];
        $config['file_name']            = $nama_lengkap;
        $config['overwrite']            = true;
        $config['max_size']             = 3024;

        //$this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('file_surat')) {
            return $this->upload->data("file_name");
        }
        print_r($this->upload->display_errors());
    }

    public function update_suratm()
    {
        $post = $this->input->post();
        $this->id_surat_masuk = $post['id_surat_masuk'];
        $this->no_surat = $post['no_surat'];
        $this->tanggal_surat = $post['tanggal_surat'];
        $this->perihal_surat = $post['perihal_surat'];
        $this->tembusan_surat = $post['tembusan_surat'];
        $this->penulis_surat = $post['penulis_surat'];
        if (!empty($_FILES["file_surat"]["name"])) {
            $this->file_surat = $this->UploadFile();
        } else {
            $this->file_surat = $post["old_file"];
        }
        $this->db->update($this->tabel, $this, array('id_surat_masuk' => $post['id_surat_masuk']));
    }

    public function delete_suratm($id_surat_masuk)
    {
        //$this->_deleteImage($id_produk);
        return $this->db->delete($this->tabel, array("id_surat_masuk" => $id_surat_masuk));
    }

    //surat keluar
    public function surat_keluar()
    {
        return $this->db->get($this->tabel2)->result();
    }
}
