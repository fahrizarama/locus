<?php

use Matrix\Functions;

class C_magang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_magang');
    }

    public function kampus()
    {
        $data['kampus'] = $this->M_magang->kampus();
        $data['update'] = $this->M_magang->kampus();
        $data['view_file'] = "admin/moduls/magang/v_kampus";
        $this->load->view('admin/admin_view', $data);
    }

    public function save_kampus()
    {
        $s_kampus = $this->M_magang;
        $s_kampus->save_kampus();
        echo "<script>
                alert('Data kampus berhasil tersimpan');
                window.location.href = '" . base_url('C_magang/kampus') . "';
            </script>";
    }

    public function update_kampus()
    {
        $u_kampus = $this->M_magang;
        $u_kampus->update_kampus();
        echo "<script>
                alert('Data kampus berhasil terupdate');
                window.location.href = '" . base_url('C_magang/kampus') . "';
            </script>";
    }

    public function delete_kampus($id_kampus)
    {
        if ($this->M_magang->delete_kampus($id_kampus)) {
            redirect(site_url('C_magang/kampus'));
        }
    }

    public function fajupro()
    {
        $data['fakultas'] = $this->M_magang->fakultas();
        $data['ef'] = $this->M_magang->fakultas();
        $data['jurusan'] = $this->M_magang->jurusan();
        $data['ej'] = $this->M_magang->jurusan();
        $data['prodi'] = $this->M_magang->prodi();
        $data['ep'] = $this->M_magang->prodi();
        $data['view_file'] = "admin/moduls/magang/v_fajupro";
        $this->load->view('admin/admin_view', $data);
    }

    public function save_fakultas()
    {
        $s_fakultas = $this->M_magang;
        $s_fakultas->save_fakultas();
        echo "<script>
                alert('Data fakultas berhasil disimpan');
                window.location.href = '" . base_url('C_magang/fajupro') . "';
            </script>";
    }

    public function update_fakultas()
    {
        $u_fakultas = $this->M_magang;
        $u_fakultas->update_fakultas();
        echo "<script>
                alert('Data fakultas berhasil diupdate');
                window.location.href = '" . base_url('C_magang/fajupro') . "';
            </script>";
    }

    public function delete_fakultas($id_fakultas)
    {
        $this->M_magang->delete_fakultas($id_fakultas);
        redirect(site_url('C_magang/fajupro'));
    }

    public function save_jurusan()
    {
        $s_jurusan = $this->M_magang;
        $s_jurusan->save_jurusan();
        echo "<script>
                alert('Data jurusan berhasil disimpan');
                window.location.href = '" . base_url('C_magang/fajupro') . "';
            </script>";
    }

    public function update_jurusan()
    {
        $u_jurusan = $this->M_magang;
        $u_jurusan->update_jurusan();
        echo "<script>
                alert('Data jurusan berhasil diupdate');
                window.location.href = '" . base_url('C_magang/fajupro') . "';
            </script>";
    }

    public function delete_jurusan($id_jurusan)
    {
        $this->M_magang->delete_jurusan($id_jurusan);
        redirect(site_url('C_magang/fajupro'));
    }

    public function save_prodi()
    {
        $s_prodi = $this->M_magang;
        $s_prodi->save_prodi();
        echo "<script>
                alert('Data prodi berhasil disimpan');
                window.location.href = '" . base_url('C_magang/fajupro') . "';
            </script>";
    }

    public function update_prodi()
    {
        $u_prodi = $this->M_magang;
        $u_prodi->update_prodi();
        echo "<script>
                alert('Data prodi berhasil diupdate');
                window.location.href = '" . base_url('C_magang/fajupro') . "';
            </script>";
    }

    public function delete_prodi($id_prodi)
    {
        $this->M_magang->delete_prodi($id_prodi);
        redirect(site_url('C_magang/fajupro'));
    }

    public function keahlian()
    {
        $data['keahlianmahasiswa'] = $this->M_magang->keahlian_mahasiswa();
        $data['khmhs'] = $this->M_magang->keahlian_mahasiswa();
        $data['keahlianmagang'] = $this->M_magang->keahlian_magang();
        $data['vk'] = $this->M_magang->keahlian_magang();
        $data['ek'] = $this->M_magang->keahlian_magang();
        $data['mhs'] = $this->M_magang->mahasiswa();
        $data['mhs2'] = $this->M_magang->mahasiswa();
        $data['mhs3'] = $this->M_magang->mahasiswa();
        $data['vk2'] = $this->M_magang->keahlian_magang();
        $data['view_file'] = "admin/moduls/magang/v_keahlian";
        $this->load->view('admin/admin_view', $data);
    }

    public function save_keahlian_magang()
    {
        $s_keahlianmag = $this->M_magang;
        $s_keahlianmag->save_keahlian_magang();
        echo "<script>
                alert('Data keahlian magang berhasil disimpan');
                window.location.href = '" . base_url('C_magang/keahlian') . "';
            </script>";
    }

    public function update_keahlian_magang()
    {
        $u_keahlianmag = $this->M_magang;
        $u_keahlianmag->update_keahlian_magang();
        echo "<script>
                alert('Data keahlian magang berhasil diupdate');
                window.location.href = '" . base_url('C_magang/keahlian') . "';
            </script>";
    }

    public function delete_keahlian_magang($id_keahlian)
    {
        $this->M_magang->delete_keahlian_magang($id_keahlian);
        redirect(site_url('C_magang/keahlian'));
    }

    public function nama_mahasiswa($id)
    {
        $data = $this->M_magang->get_by_id($id);
        echo json_encode($data);
    }

    public function save_keahlian_mhs()
    {
        $s_keahlianmhs = $this->M_magang;
        $s_keahlianmhs->save_keahlian_mhs();
        echo "<script>
                alert('Data keahlian mahasiswa berhasil disimpan');
                window.location.href = '" . base_url('C_magang/keahlian') . "';
            </script>";
    }

    public function update_keahlian_mhs()
    {
        $u_keahlianmhs = $this->M_magang;
        $u_keahlianmhs->update_keahlian_mhs();
        echo "<script>
                alert('Data keahlian mahasiswa berhasil diupdate');
                window.location.href = '" . base_url('C_magang/keahlian') . "';
            </script>";
    }

    public function delete_keahlian_mhs($id)
    {
        $this->M_magang->delete_keahlian_mhs($id);
        redirect(site_url('C_magang/keahlian'));
    }

    public function mahasiswa()
    {
        $data['mahasiswa'] = $this->M_magang->mahasiswa();
        $data['kampus'] = $this->M_magang->kampus();
        $data['ekampus'] = $this->M_magang->kampus();
        $data['fklts'] = $this->M_magang->fakultas();
        $data['eflkts'] = $this->M_magang->fakultas();
        $data['jrsn'] = $this->M_magang->jurusan();
        $data['ejrsn'] = $this->M_magang->jurusan();
        $data['prd'] = $this->M_magang->prodi();
        $data['eprd'] = $this->M_magang->prodi();
        $data['dtlmhs'] = $this->M_magang->mahasiswa();
        $data['em'] = $this->M_magang->mahasiswa();
        $data['view_file'] = "admin/moduls/magang/v_mahasiswa";
        $this->load->view('admin/admin_view', $data);
    }

    public function save_mahasiswa()
    {
        $s_mahasiswa = $this->M_magang;
        $s_mahasiswa->save_mahasiswa();
        echo "<script>
                alert('Data mahasiswa berhasil disimpan');
                window.location.href = '" . base_url('C_magang/mahasiswa') . "';
            </script>";
    }

    public function update_mahasiswa()
    {
        $u_mahasiswa = $this->M_magang;
        $u_mahasiswa->update_mahasiswa();
        echo "<script>
                alert('Data mahasiswa berhasil diupdate');
                window.location.href = '" . base_url('C_magang/mahasiswa') . "';
            </script>";
    }

    public function delete_mahasiswa($id_mahasiswa)
    {
        $this->M_magang->delete_mahasiswa($id_mahasiswa);
        redirect(site_url('C_magang/mahasiswa'));
    }

    public function mahasiswa_selesai($id)
    {
        $status = 'Selesai';
        $this->M_magang->mahasiswa_selesai($status, $id);
        echo "<script>
        alert('Mahasiswa telah selesai melaksanakan magang');
        window.location.href = '" . base_url('C_magang/mahasiswa') . "';
    </script>";
    }

    public function tugas_magang()
    {
        $data['mahasiswa'] = $this->M_magang->get_mahasiswa();
        $data['etm'] = $this->M_magang->tugas_magang();
        $data['vmhs'] = $this->M_magang->get_mahasiswa();
        $data['vkhl'] = $this->M_magang->keahlian_magang();
        $data['keahlian'] = $this->M_magang->keahlian_magang();
        $data['tugasmagang'] = $this->M_magang->tugas_magang();
        $data['view_file'] = "admin/moduls/magang/v_tugas_magang";
        $this->load->view('admin/admin_view', $data);
    }

    public function save_tugasmagang()
    {
        $s_tgsmagang = $this->M_magang;
        $s_tgsmagang->save_tugasmagang();
        echo "<script>
        alert('Tugas Magang berhasil disimpan');
        window.location.href = '" . base_url('C_magang/tugas_magang') . "';
    </script>";
    }

    public function update_tugasmagang()
    {
        $u_tgsmagang = $this->M_magang;
        $u_tgsmagang->update_tugasmagang();
        echo "<script>
        alert('Tugas Magang berhasil diupdate');
        window.location.href = '" . base_url('C_magang/tugas_magang') . "';
    </script>";
    }

    public function delete_tugasmagang($id)
    {
        $this->M_magang->delete_tugasmagang($id);
        redirect(site_url('C_magang/tugas_magang'));
    }

    public function tugas_selesai($id)
    {
        $status = 'Selesai';
        $this->M_magang->tugas_selesai($status, $id);
        echo "<script>
        alert('Tugas telah selesai dikerjakan');
        window.location.href = '" . base_url('C_magang/tugas_magang') . "';
    </script>";
    }
}
