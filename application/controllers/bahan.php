<?php
class Bahan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_bahan');
        check_session();
    }
    
    function index(){
       
        if($_SESSION['level']==1)
        {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'index.php/kategori/index/';
            $config['total_rows'] = $this->model_bahan->tampilkan_data()->num_rows();
            $config['per_page'] = 5; 
            $this->pagination->initialize($config); 
            $data['paging']     =$this->pagination->create_links();
            $halaman            =  $this->uri->segment(3);
            $halaman            =$halaman==''?0:$halaman-1;
            $data['record']     =    $this->model_bahan->tampilkan_data_paging($config,$halaman);
            $this->template->load('template','bahan/lihat_data',$data);
        
        }
        else
        {
            redirect('auth/login');
        }
       
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $this->model_bahan->post();
            redirect('bahan');
        }
        else{
            //$this->load->view('kategori/form_input');
            $this->template->load('template','bahan/form_input');
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses kategori
            $this->model_bahan->edit();
            redirect('bahan');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_bahan->get_one($id)->row_array();
            //$this->load->view('kategori/form_edit',$data);
            $this->template->load('template','bahan/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_bahan->delete($id);
        redirect('bahan');
    }
}