<?php
class pembelian extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_pembelian');
        $this->load->model('model_barang');
        $this->load->model('model_pengrajin');
        check_session();
    }


    function index()
    { 
      
        if($_SESSION['level']==1)
        {
            $data['record'] = $this->model_barang->tampil_data_by_stok();
            $data['record3'] = $this->model_pengrajin->tampildata();
            $this->template->load('template','pembelian/form_view',$data);
            
        }
        else
        {
            redirect('auth/login');
        }
      
       
    }

    function updateorder()
    {
       $this->model_pembelian->selesai_pembelian_admin();
       redirect("pembelian");
    }

    function tampilpembelian()
    {
        $data['record'] = $this->model_pembelian->tampil_pembeliaan();
        
        $this->template->load('template','pembelian/form_view',$data);
    }
    function tampilpembelianbarang()
    {
        $data['barang'] = $this->model_barang->tampil_data()->result();
        $data['record2'] = $this->model_pembelian->tampil_pembeliaan()->result();
       echo json_encode($data);
    }
    
    function tambah_barang()
    {
        $this->template->load('template','barang/form_input');
    }
 
    function post_pembelian()
    {   $id_brng=$this->input->post('id_barang');
        $jml=$this->input->post('jumlah');
        $id_pengrajin = $this->input->post('id_pengrajin');
        $this->model_pembelian->insertdetailpembelian($id_brng,$jml,$id_pengrajin);
        redirect('pembelian');
      
    }

    function updatepembelian()
    {
      
        $totalbayar=$_POST['total'];
        $this->model_pembelian->insertpembelian($totalbayar);
    
    }

    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses barang
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $harga      =   $this->input->post('harga');
            $data       = array('nama_barang'=>$nama,
                                'jenis_barang'=>$kategori,
                                'harga'=>$harga);
            $this->model_barang->edit($data,$id);
            redirect('barang');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['record']     =  $this->model_barang->tampil_data_by_id($id);
            //$this->load->view('barang/form_edit',$data);
            $this->template->load('template','barang/form_edit',$data);
        }
    }
    
    
    function hapusdetailpembelian()
    {
        $id= $this->input->post('id_detail_pembelian');
        $this->model_pembelian->hapusdetailpembelian($id);
        redirect("pembelian");
    }
    function hapusdetailpembelianbatal()
    {
        $id= $this->input->post('id_detail_pembelian');
        $this->model_pembelian->hapusdetailpembelianbatal();
        redirect("pembelian");
    }
}