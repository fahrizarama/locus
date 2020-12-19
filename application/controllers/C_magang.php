<?php

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
        $data['view_file'] = "admin/moduls/magang/v_fajupro";
        $this->load->view('admin/admin_view', $data);
    }
}
