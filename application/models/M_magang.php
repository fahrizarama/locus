<?php

use PhpOffice\PhpSpreadsheet\Writer\Xlsx\StringTable;

defined('BASEPATH') or die('No direct script access allowed!');

class M_magang extends CI_Model
{
    private $tb_kampus = "tb_kampus";
    private $tb_fakultas = "tb_fakultas";
    private $tb_jurusan = "tb_jurusan";
    private $tb_prodi = "tb_prodi";
    private $tb_keahlian_magang = "tb_keahlian_magang";
    private $tb_mahasiswa = "tb_mahasiswa";
    private $tb_keahlian_mahasiswa = "tb_keahlian_mahasiswa";


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
        $this->email_kampus = $post['email_kampus'];
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
        $this->email_kampus = $post['email_kampus'];
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
        $this->id_fakultas = $post['id_fakultas'];
        $this->nama_fakultas = $post['nama_fakultas'];

        $this->db->insert($this->tb_fakultas, $this);
    }

    public function update_fakultas()
    {

        $post = $this->input->post();
        $this->id_fakultas = $post['id_fakultas'];
        $this->nama_fakultas = $post['nama_fakultas'];

        $this->db->update($this->tb_fakultas, $this, array('id_fakultas' => $post['id_fakultas']));
    }

    public function delete_fakultas($id_fakultas)
    {
        return $this->db->delete('tb_fakultas', array("id_fakultas" => $id_fakultas));
    }

    public function jurusan()
    {
        return $this->db->get($this->tb_jurusan)->result();
    }

    public function save_jurusan()
    {
        $post = $this->input->post();
        $this->id_jurusan = $post['id_jurusan'];
        $this->nama_jurusan = $post['nama_jurusan'];

        $this->db->insert($this->tb_jurusan, $this);
    }

    public function update_jurusan()
    {
        $post = $this->input->post();
        $this->id_jurusan = $post['id_jurusan'];
        $this->nama_jurusan = $post['nama_jurusan'];

        $this->db->update($this->tb_jurusan, $this, array('id_jurusan' => $post['id_jurusan']));
    }

    public function delete_jurusan($id_jurusan)
    {
        return $this->db->delete($this->tb_jurusan, array("id_jurusan" => $id_jurusan));
    }

    public function prodi()
    {
        return $this->db->get($this->tb_prodi)->result();
    }

    public function save_prodi()
    {
        $post = $this->input->post();
        $this->id_prodi = $post['id_prodi'];
        $this->nama_prodi = $post['nama_prodi'];

        $this->db->insert($this->tb_prodi, $this);

    }

    public function update_prodi()
    {
        $post = $this->input->post();
        $this->id_prodi = $post['id_prodi'];
        $this->nama_prodi = $post['nama_prodi'];

        $this->db->update($this->tb_prodi, $this, array('id_prodi' => $post['id_prodi']));
    }

    public function delete_prodi($id_prodi)
    {
        return $this->db->delete($this->tb_prodi, array('id_prodi' => $id_prodi));
    }

    public function keahlian_magang()
    {
        return $this->db->get($this->tb_keahlian_magang)->result();
    }

    public function save_keahlian_magang()
    {
        $post = $this->input->post();
        $this->id_keahlian = $post['id_keahlian'];
        $this->nama_keahlian = $post['nama_keahlian'];

        $this->db->insert($this->tb_keahlian_magang, $this);
    }

    public function update_keahlian_magang()
    {
        $post = $this->input->post();
        $this->id_keahlian = $post['id_keahlian'];
        $this->nama_keahlian = $post['nama_keahlian'];

        $this->db->update($this->tb_keahlian_magang, $this, array('id_keahlian' => $post['id_keahlian']));
    }

    public function delete_keahlian_magang($id_keahlian)
    {
        return $this->db->delete($this->tb_keahlian_magang, array('id_keahlian' => $id_keahlian));
    }

    public function mahasiswa()
    {
        $this->db->select('*');
        $this->db->from('tb_mahasiswa');
        $this->db->join('tb_kampus', 'tb_kampus.id_kampus = tb_mahasiswa.id_kampus', 'left outer');
        $this->db->join('tb_fakultas', 'tb_fakultas.id_fakultas = tb_mahasiswa.id_fakultas', 'left outer');
        $this->db->join('tb_jurusan', 'tb_jurusan.id_jurusan = tb_mahasiswa.id_jurusan', 'left outer');
        $this->db->join('tb_prodi', 'tb_prodi.id_prodi = tb_mahasiswa.id_prodi', 'left_outer');
        $this->db->where('status', 1);
        return $this->db->get()->result();
    }

    public function save_mahasiswa()
    {
        $post = $this->input->post();
        $this->nim = $post['nim'];
        $this->nama = $post['nama'];
        $this->alamat_rumah = $post['alamat_rumah'];
        $this->alamat_tinggal = $post['alamat_tinggal'];
        $this->no_telepon = $post['no_telepon'];
        $this->email = $post['email'];
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->id_kampus = $post['id_kampus'];
        $this->id_fakultas = $post['id_fakultas'];
        $this->id_jurusan = $post['id_jurusan'];
        $this->id_prodi = $post['id_prodi'];
        $this->angkatan = $post['angkatan'];
        $this->keahlian_awal = $post['keahlian_awal'];
        $this->tanggal_mulai = $post['tanggal_mulai'];
        $this->tanggal_selesai = $post['tanggal_selesai'];
        $this->status = $post['status'];

        $this->db->insert($this->tb_mahasiswa, $this);
    }

    public function update_mahasiswa()
    {
        $post = $this->input->post();
        $this->id_mahasiswa = $post['id_mahasiswa'];
        $this->nim = $post['nim'];
        $this->nama = $post['nama'];
        $this->alamat_rumah = $post['alamat_rumah'];
        $this->alamat_tinggal = $post['alamat_tinggal'];
        $this->no_telepon = $post['no_telepon'];
        $this->email = $post['email'];
        $this->jenis_kelamin = $post['jenis_kelamin'];
        $this->id_kampus = $post['id_kampus'];
        $this->id_fakultas = $post['id_fakultas'];
        $this->id_jurusan = $post['id_jurusan'];
        $this->id_prodi = $post['id_prodi'];
        $this->angkatan = $post['angkatan'];
        $this->keahlian_awal = $post['keahlian_awal'];
        $this->tanggal_mulai = $post['tanggal_mulai'];
        $this->tanggal_selesai = $post['tanggal_selesai'];
        $this->status = $post['status'];

        $this->db->update($this->tb_mahasiswa, $this, array('id_mahasiswa' => $post['id_mahasiswa']));
    }

    public function delete_mahasiswa($id_mahasiswa)
    {
        return $this->db->delete($this->tb_mahasiswa, array('id_mahasiswa' => $id_mahasiswa));
    }

    public function mahasiswa_selesai($status, $id)
    {
        $this->db->query("UPDATE `tb_mahasiswa` SET `status`= '$status' WHERE tb_mahasiswa.id_mahasiswa='$id'");
    }

    public function keahlian_mahasiswa()
    {
        return $this->db->get($this->tb_keahlian_mahasiswa)->result();
    }

}
