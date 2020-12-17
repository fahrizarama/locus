<?php

class Produk_c extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Produk_m');
        $this->load->model('Merchant_m');
    }

    public function index()
    {
        $data['produk'] = $this->Produk_m->get_all_produk()->result();
        $data['jenis_partner'] = $this->Merchant_m->jenis_partner()->result();
        $this->load->view('parts/header', $data);
        $this->load->view('pages/produk/produk_v', $data);
        $this->load->view('parts/footer', $data);
    }

    public function detail($id)
    {
        $data['produk'] = $this->Produk_m->get_all_produk()->result();
        $data['jenis_partner'] = $this->Merchant_m->jenis_partner()->result();
        $data['detail'] = $this->Produk_m->detail_data($id);

        $this->load->view('parts/header', $data);
        $this->load->view('pages/produk/detailproduk', $data);
        $this->load->view('parts/footer', $data);
    }
}
