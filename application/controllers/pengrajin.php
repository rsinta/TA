<?php
class Pengrajin extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('model_pengrajin');
        check_session();

    }


    function index()
    {     
            $data['record']=  $this->model_pengrajin->tampildatapengrajin();
            
            //$this->load->view('operator/lihat_data',$data);
            $this->template->load('template','pengrajin/lihat_data',$data);
      
    }
    


    function post()
    {
        if(isset($_POST['submit'])){
            // proses barang
            $this->model_pengrajin->post();
            redirect('pengrajin');
        }
        else{
            $this->load->model('model_pengrajin');
            $data['pengrajin']=  $this->model_pengrajin->tampildatapengrajin()->result();
            //$this->load->view('barang/form_input',$data);
            $this->template->load('template','pengrajin/form_input',$data);
        }
    }

    
    
    
    function edit()
    {
        if(isset($_POST['submit'])){
            $this->model_pengrajin->edit();
             redirect('pengrajin');
        }
        else{
            $id=  $this->uri->segment(3);
            $data['record']=  $this->model_pengrajin->get_one($id)->row_array();
            //$this->load->view('operator/form_edit',$data);
            $this->template->load('template','pengrajin/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->input->post('id_pengrajin');
        $this->model_pengrajin->delete($id);
        
    }

    public function aksi_upload(){
		$config['upload_path']          = './img/barang';
		$config['allowed_types']        = '*';
		//$config['max_size']             = 100;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}else{
            $data = array('upload_data' => $this->upload->data());
            redirect('barang');
        }
    }
}