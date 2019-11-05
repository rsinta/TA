<?php
class operator extends ci_controller{
    
   function __construct() {
        parent::__construct();
        $this->load->model('model_operator');
        $this->load->model('model_user');
        check_session();
    }
    
    function index()
    {
       
        if($_SESSION['level']==1)
        {
            $data['record']=  $this->model_operator->tampildata();
        
            //$this->load->view('operator/lihat_data',$data);
            $this->template->load('template','operator/lihat_data',$data);
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
            $this->model_operator->post();
            redirect('operator');   
        }
        else{
            //$this->load->view('operator/form_input');
            $this->template->load('template','operator/form_input');
        }
    }
    
    function edit()
    {
        if(isset($_POST['submit'])){
            $this->model_operator->edit();
             redirect('operator');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_operator->get_one($id)->row_array();
            //$this->load->view('operator/form_edit',$data);
            $this->template->load('template','operator/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->db->where('id_karyawan',$id);
        $this->db->delete('karyawan');
        redirect('operator');
    }

    function deletemember()
    {
        $id=  $this->input->post('id_member');
        $this->db->where('id_member',$id);
        $this->db->delete('member');
        redirect('operator/tampil_member');
    }

    function tampil_member()
    {
        $data['record']=  $this->model_operator->tampildatamember();
        
        //$this->load->view('operator/lihat_data',$data);
        $this->template->load('template','operator/member',$data);
    }
    function tampil_member_by_name()
    {
        $data['record']=  $this->model_operator->tampildatamemberbyname()->result();
        echo json_encode($data['record']);
        //$this->load->view('operator/lihat_data',$data);
        //$this->template->load('template','operator/member',$data);
    }

    
}