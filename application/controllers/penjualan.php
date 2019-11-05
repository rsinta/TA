<?php
class penjualan extends CI_Controller{
    
    function __construct() {
        parent::__construct();
        $this->load->model('model_barang');
        $this->load->model('model_transaksi');
        $this->load->model('model_bahan');
        $this->load->model('model_kategori');
        $this->load->model('model_pengrajin');
       
    }

    function index(){
       
            $this->load->library('pagination');
            $config['base_url'] = base_url().'index.php/penjualan/index/';
            $config['total_rows'] = $this->model_barang->tampil_data()->num_rows();
            $config['per_page'] = 4; 
            $this->pagination->initialize($config); 
            $data['paging']     =$this->pagination->create_links();
            $halaman            =  $this->uri->segment(3);
            $halaman            =$halaman==''?0:$halaman-1;
            $data['databarang']     =    $this->model_barang->tampilkan_data_paging($config,$halaman);
            $data['terlaris']   = $this->model_barang->baranglaris();
            $this->template->load('template1','userinterface/penjualan',$data);     
       
    }

    function pemesanan()
    {   if(check_session())
        {
            $id= $_SESSION['userdata']->id_anggota;
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $data['pesanan']=  $this->model_transaksi->tampilpemesanan($id)->result();
            $data['pesananwaiting']= $this->model_transaksi->tampilpesananwaiting($id)->result();
            //$this->load->view('barang/form_input',$data);
            $this->template->load('template1','userinterface/pemesanan',$data);
        }
       
        
    }

    function tampil_pemesanan_admin()
    {
        if(check_session())
        {
            $id = $this->input->get('id');
            $data['pesanan'] = $this->model_transaksi->tampilpemesananbyidpesan($id)->row();
            $data['kategori']=  $this->model_kategori->tampilkan_data()->result();
            $data['bahan']=  $this->model_bahan->tampilkan_data()->result();
            $data['pengrajin']=  $this->model_pengrajin->tampildatapengrajin();
            $this->template->load('template','pemesanan/pemesanan',$data);
        }
        
    }

    
    function tampil_pemesanan()
    {
        if(check_session())
        {
        $id = $this->input->post('id');
        $data = $this->model_transaksi->tampilpemesananbyidpesan($id)->row();
        echo json_encode($data);
        }
    }

    function stokbarang()
    {
        if(check_session())
        {
       $id= $this->input->post('id_barang');
       $data= $this->model_barang->tampil_data_stok_byId($id)->result();
       echo json_encode($data);
        }
    }

    function penjualan_offline(){

        if($_SESSION['level']==1)
        {
        $data['record']=$this->model_barang->tampil_data();
        $this->template->load('template','POS/lihat_data',$data);
        }
        else
        {
            redirect('login');
        }
    
    }

    function penjualan_offline_tampildata(){
        $data['record']=$this->model_barang->tampil_data()->result();
        echo json_encode($data['record']);
    }
    function penjualan_tampildata_byname(){
        $data['record']=$this->model_barang->tampil_data_by_name()->result();
        echo json_encode($data['record']);
    }


    function post_penjualan()
    { 
        check_session();
       
            $id= $this->input->post('id_barang');
            $datatransaksi = array('id'=>$id);
            $jmlchart = $this->model_transaksi->insertdetail($datatransaksi);
     //redirect("penjualan");
    }

    function post_pending()
    {
        foreach($this->cart->contents() as $r)
        {
            $id= $r['id'];
            $qty=$r['qty'];
            $datatransaksi = array('id'=>$id,'qty'=>$qty);
            $jmlchart = $this->model_transaksi->insertdetail2($datatransaksi);
        }
        redirect('penjualan');
    }

    function poscartpending()
    {  
     
        $id= $this->input->post('id_barang');
        $data= $this->model_barang->tampil_data_by_id($id);
        $harga= $data->harga_barang;
        $berat= $data->berat_satuan;
        $namabarang= $data->nama_barang;
        $jml= 1;
        $carts=cart_config($id, $jml, $harga, $namabarang,$berat);
        $this->cart->insert($carts);
        echo json_encode($this->cart->contents());
    }

  
    function postpemesanan()
    { if(check_session())
        {
        $deskripsi= $this->input->post('deskripsi');
        $kategori= $this->input->post('kategori');
        $brtpesan= $this->input->post('brtpesan');
        $jmlpesan= $this->input->post('jmlpesan');
        $foto       =   'PSN'.get_current_date().$_FILES['berkas']['name'];
        $idanggota = $_SESSION['userdata']->id_anggota;
            $datatransaksi = array('id_anggota'=>$idanggota,
                                   'id_kategori'=>$kategori,
                                   'deskripsi'=>$deskripsi,
                                   'jumlah'=>$jmlpesan,
                                   'berat'=>$brtpesan,
                                   'id_pemesanan'=>'',
                                   'foto'=>$foto
                                );
            $jmlchart = $this->model_transaksi->insertpemesanan($datatransaksi);
            $this->aksi_upload($foto);
         }
            //redirect("penjualan");
        
    }

    function get_totalchart()
    { if(check_session())
        {
        $jmlchart = $this->model_transaksi->totalchart();
        echo $jmlchart;
        }
    }

    function get_trans_pending()
    {
        $jmlchart = $this->model_transaksi->totalchartpending();
        echo $jmlchart;
    }

    
    function get_pemesanan_pending()
    {
        $jmlchart = $this->model_transaksi->totalpemesananpending();
        echo $jmlchart;
    }

    function get_data_pending()
    {
        $datapending = $this->model_transaksi->datapending()->result();
        echo json_encode($datapending);
    }
    function get_datapemesanan_pending()
    {
        $datapending = $this->model_transaksi->datapemesananpending()->result();
        echo json_encode($datapending);
    }

    function get_datapemesanan_pending_byid()
    {
        $id= $this->input->post('id');
        $datapending = $this->model_transaksi->datapemesananpendingbyid($id)->result();
        echo json_encode($datapending);
    }

    function get_data_transaksiuser()
    { check_session();
        $id=$_POST['id'];
        $datapending = $this->model_transaksi->tampiltransaksiuser($id)->result();
        echo json_encode($datapending);
    }

    function accpending()
    { check_session();
        $id= $_POST['id_penjualan'];
        $datapending = $this->model_transaksi->accdatapending($id);
    }

    function accpendingpesan()
    { check_session();
        $id = $_POST['id_pemesanan'];
        $dataupdate=array('id_pengrajin'=>$_POST['id_pengrajin'],
                          'tgl_pelunasan'=>$_POST['tgl_pelunasan'],
                          'tgl_selesai'=>$_POST['tgl_selesai'],
                          'id_bahan'=>$_POST['bahan'],
                          'dp'=>$_POST['dp'],
                          'kekurangan'=>$_POST['kurang'],
                          'totalharga'=>$_POST['harga'],
                          'status'=>'Waiting',);
        $datapending = $this->model_transaksi->accdatapendingpesanan($id,$dataupdate);
        redirect('barang');
    }

    
    function chart()
    { check_session();
        if($_SESSION['level']==0)
        {
        $pembelian['databelanja'] = $this->model_transaksi->chart();
        $this->template->load('template1','userinterface/chart_penjualan',$pembelian);
        }
        else
        {
            redirect('login');
        }
    }

    function chartnologin()
    {
        $pending['data'] = count($this->cart->contents());
        $this->template->load('template1','userinterface/cart_penjualannologin',$pending);
    }

    
    function chartpenjualanoff()
    { check_session();
        if($_SESSION['level']==1)
        {
            $pembelian['databelanja'] = $this->model_transaksi->chartoff()->result();
            echo json_encode($pembelian['databelanja']);
        }
        else
        {
            $pembelian['databelanja'] = $this->model_transaksi->chart()->result();
            echo json_encode($pembelian['databelanja']);
        }
      
    }

    function hapusdetail($id)
    { check_session();
        $this->model_transaksi->hapusdetailonline($id);
        redirect("penjualan/chart");
    }
    function hapusdetailnolog($id)
    { 
        $this->cart->remove($id);
        redirect("penjualan/chartnologin");
    }
    function hapusdetailbatal()
    { check_session();
        $this->model_transaksi->hapusdetailonlinebatal();
        redirect("penjualan/chart");
    }
    function hapusdetailadmin()
    { check_session();
        $id= $this->input->post('id_detail');
        $this->model_transaksi->hapusdetail($id);
       
    }
    function hapusdetailadminbatal()
    { check_session();
        $id= $this->input->post('id_detail');
        $this->model_transaksi->hapusdetailbatal();
       
    }

    function updatepenjualan()
    { check_session();
        $datapenjualan = array('id_penjualan'=>null,
                        'id_jasa_layanan_kirim'=>$this->input->post('idjasakirim'),
                      'ongkir'=>$this->input->post('ongkirjml'),
                      'total_harga'=>$this->input->post('total'));
        $this->model_transaksi->insertpenjualan($datapenjualan);
        redirect("penjualan");
    }


    function updatepenjualanoffline()
    { check_session();
        $totalbayar=$this->input->post('total');
        $this->model_transaksi->insertpenjualanoffline($totalbayar);
        redirect("penjualan/penjualan_offline");
    }

    public function aksi_upload($foto){
		$config['upload_path']          = './img/pemesanan';
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
            redirect('penjualan');
        }
    }
   


}