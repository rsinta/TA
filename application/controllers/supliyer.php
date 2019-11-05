<?php
class supliyer extends ci_controller{
    
   function __construct() {
        parent::__construct();
        $this->load->model('model_supliyer');
        check_session();
    }
    
    function index()
    {
       
        if($_SESSION['level']==1)
        {
            $data['record']=  $this->model_supliyer->tampildata();
        
            //$this->load->view('operator/lihat_data',$data);
            $this->template->load('template','supliyer/form_view',$data);
        }
        else
        {
            redirect('auth/login');
        }
     
      
    }
    
    function post()
    {
        if(isset($_POST['submit'])){
            // proses data
            $this->model_supliyer->post();
            redirect('supliyer');   
        }
        else{
            //$this->load->view('operator/form_input');
            $this->template->load('template','supliyer/form_input');
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            $this->model_supliyer->edit();
             redirect('operator');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_supliyer->get_one($id)->row_array();
            //$this->load->view('operator/form_edit',$data);
            $this->template->load('template','supliyer/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->db->where('id_supliyer',$id);
        $this->db->delete('supliyer');
        redirect('supliyer');
    }
}