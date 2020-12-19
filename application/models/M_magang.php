<?php

use PhpOffice\PhpSpreadsheet\Writer\Xlsx\StringTable;

defined('BASEPATH') or die('No direct script access allowed!');

class M_magang extends CI_Model
{
    private $tb_kampus = "tb_kampus";
    private $tb_fakultas = "tb_fakultas";


    public function kampus()
    {
        return $this->db->get($this->tb_kampus)->result();
    }

    public function save_kampus()
    {
        $post = $this->input->post();
        $this->nama_kampus = $post['nama_kampus'];
        $this->alamat = $post['alamat'];
        $this->telp = $post['telp'];
        $this->email = $post['email'];
        $this->website = $post['website'];
        $this->kota_kabupaten = $post['kota_kabupaten'];
        $this->provinsi = $post['provinsi'];

        $this->db->insert($this->tb_kampus, $this);
    }

    public function update_kampus()
    {
        $post = $this->input->post();
        $this->id_kampus = $post['id_kampus'];
        $this->nama_kampus = $post['nama_kampus'];
        $this->alamat = $post['alamat'];
        $this->telp = $post['telp'];
        $this->email = $post['email'];
        $this->website = $post['website'];
        $this->kota_kabupaten = $post['kota_kabupaten'];
        $this->provinsi = $post['provinsi'];

        $this->db->update($this->tb_kampus, $this, array('id_kampus' => $post['id_kampus']));
    }

    public function delete_kampus($id_kampus)
    {
        return $this->db->delete($this->tb_kampus, array("id_kampus" => $id_kampus));
    }

    public function fakultas()
    {
        return $this->db->get($this->tb_fakultas)->result();
    }

    public function save_fakultas()
    {
        $post = $this->input->post();
        $this->id_fakultas = $post['fakultas'];
        $this->nama_fakultas = $post['nama_fakultas'];
        
        $this->db->insert($this->tb_fakultas, $this);
    }
}