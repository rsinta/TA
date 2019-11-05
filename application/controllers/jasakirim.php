<?php
class jasakirim extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_jasakirim');
        check_session();
    }
    
    function index(){
       
        if($_SESSION['level']==1)
        {
            $this->load->library('pagination');
            $config['base_url'] = base_url().'index.php/jasakirim/index/';
            $config['total_rows'] = $this->model_jasakirim->tampilkan_data()->num_rows();
            $config['per_page'] = 5; 
            $this->pagination->initialize($config); 
            $data['paging']     =$this->pagination->create_links();
            $halaman            =  $this->uri->segment(3);
            $halaman            =$halaman==''?0:$halaman-1;
            $data['record']     =    $this->model_jasakirim->tampilkan_data_paging($config,$halaman);
            $this->template->load('template','jasakirim/lihat_data',$data);
        
        }
        else
        {
            redirect('auth/login');
        }
       
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses jasakirim
            $this->model_jasakirim->post();
            redirect('jasakirim');
        }
        else{
            //$this->load->view('jasakirim/form_input');
            $this->template->load('template','jasakirim/form_input');
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            // proses jasakirim
            $this->model_jasakirim->edit();
            redirect('jasakirim');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_jasakirim->get_one($id)->row_array();
            //$this->load->view('jasakirim/form_edit',$data);
            $this->template->load('template','jasakirim/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_jasakirim->delete($id);
        redirect('jasakirim');
    }
}