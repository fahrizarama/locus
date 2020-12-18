<?php

class C_surat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_surat');
    }

    public function surat_masuk()
    {
        $data['sm'] = $this->M_surat->surat_masuk();
        $data['esm'] = $this->M_surat->surat_masuk();
        $data['view_file'] = "admin/moduls/surat/v_suratm";
        $this->load->view('admin/admin_view', $data);
    }

    public function save_suratm()
    {
        $s_surat = $this->M_surat;
        $s_surat->save_suratm();
        echo "<script>
                alert('Data Surat Masuk Tersimpan');
                window.location.href = '" . base_url('C_surat/surat_masuk') . "';
            </script>";
    }

    public function update_suratm()
    {
        $u_surat = $this->M_surat;
        $u_surat->update_suratm();
        echo "<script>
                alert('Data Surat Masuk Di Update');
                window.location.href = '" . base_url('C_surat/surat_masuk') . "';
            </script>";
    }

    public function delete_suratm($id_surat_masuk)
    {
        if ($this->M_surat->delete_suratm($id_surat_masuk)) {
            redirect(site_url('C_surat/surat_masuk'));
        }
    }

    public function surat_keluar()
    {
        $data['sk'] = $this->M_surat->surat_keluar();
        $data['esk'] = $this->M_surat->surat_keluar();
        $data['view_file'] = "admin/moduls/surat/v_suratk";
        $this->load->view('admin/admin_view', $data);
    }
}
