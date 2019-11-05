<?php
class laporan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_laporan');
    }

    function index()
    {
        $data['record'] = $this->model_laporan->tampillaporanpenjualan();
        $this->template->load('template','laporan/laporan_penjualan',$data);
    }

    function updatestatus()
    {
        $id=  $this->uri->segment(3);
        $this->model_laporan->updatestatuspemesanan($id);
        redirect('pemesanan');
    }
    
    function tampil_data_pemesanan()
    {
        $data['record']=$this->model_laporan->tampildatapemesanan();
        $this->template->load('template','laporan/laporanpemesanan',$data);
    } 

    function tampil_data_barang()
    {
        $data['record']=$this->model_laporan->tampildatabarang();
        $this->template->load('template','laporan/laporandatabarang',$data);
    }

    function tampil_pembelian()
    {
        $data['record']=$this->model_laporan->tampildatapembelian();
        $this->template->load('template','laporan/laporanpembelian',$data);
    }

}