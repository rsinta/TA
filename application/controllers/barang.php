<?php
class Barang extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('model_barang');
        $this->load->model('model_bahan');
        check_session();

    }


    function index()
    {     
        if($_SESSION['level']==1)
        {
        $this->load->library('pagination');
        $config['base_url'] = base_url().'index.php/barang/index/';
        $config['total_rows'] = $this->model_barang->tampil_data()->num_rows();
        $config['per_page'] = 6; 
        $this->pagination->initialize($config); 
        $data['paging']     =$this->pagination->create_links();
        $halaman            =  $this->uri->segment(3);
        $halaman            =$halaman==''?0:$halaman-1;
        $data['record']     =    $this->model_barang->tampilkan_data_paging($config,$halaman);
        $this->template->load('template','barang/lihat_data',$data);
        }
        else
        {
            redirect('auth/login');
        }
      
    }
    
    function tambah_barang()
    {
        $this->template->load('template','barang/form_input');
    }


    function post()
    {
        if(isset($_POST['submit'])){
            $nama='BRG_'.get_current_date().$_FILES['berkas']['name'];
            $this->model_barang->post($nama);
            $this->aksi_upload($nama);

           redirect('barang');
            
        }
        else{
            $this->load->model('model_kategori');
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $data['bahan']=  $this->model_bahan->tampilkan_data()->result();
            //$this->load->view('barang/form_input',$data);
            $this->template->load('template','barang/form_input',$data);
        }
    }

    
    
    
    function edit()
    {
       if(isset($_POST['submit'])){
            // proses barang
            $id         =   $this->input->post('id');
            $nama       =   $this->input->post('nama_barang');
            $kategori   =   $this->input->post('kategori');
            $bahan      =   $this->input->post('bahan');
            $harga      =   $this->input->post('harga');
            $keterangan =   $this->input->post('keterangan');
            $foto       =   'BRG_'.get_current_date().$_FILES['berkas']['name'];
            if ($_FILES['berkas']['name']=="")
            {
                
                $data       = array('nama_barang'=>$nama,
                'id_kategori'=>$kategori,
                'id_bahan'=>$bahan,
                'keterangan'=>$keterangan,
                'harga_barang'=>$harga);
            }
            else
            {
                $this->model_barang->deleteimg($id);
                $data       = array('nama_barang'=>$nama,
                'id_kategori'=>$kategori,
                'id_bahan'=>$bahan,
                'harga_barang'=>$harga,
                'keterangan'=>$keterangan,
                'foto'=>$foto);
                $this->aksi_upload($foto);
            }
            
            $this->model_barang->edit($data,$id);
           
            redirect('barang');
        }
        else{
            $id=  $this->uri->segment(3);
            $this->load->model('model_kategori');
            $data['kategori']   =  $this->model_kategori->tampilkan_data()->result();
            $data['bahan']=  $this->model_bahan->tampilkan_data()->result();
            $data['record']     =  $this->model_barang->tampil_data_by_id($id)->row();
            //$this->load->view('barang/form_edit',$data);
            $this->template->load('template','barang/form_edit',$data);
        }
    }
    
    
    function delete()
    {
        $id=  $this->uri->segment(3);
        $this->model_barang->deleteimg($id);
        $this->model_barang->delete($id);
        redirect('barang');
    }

    public function aksi_upload($foto){
		$config['upload_path']          = './img/barang';
		$config['allowed_types']        = '*';
		$config['file_name']             = $foto;
		//$config['max_width']            = 1024;
		//$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			echo json_encode($error);
		}else{
            $data = array('upload_data' => $this->upload->data());
            //redirect('barang');
        }
    }
}