<?php
class model_kategori extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->get('kategori');
    }
    
  function tampilkan_data_paging($config,$halaman)
  {
     return $this->db->get('kategori', $config['per_page'], ($halaman * $config['per_page']));
  }
    
    function post(){

         
        $query = "SELECT max(id_kategori) as maxKode from kategori";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_kategori = $data->maxKode;
        echo $id_transaksi;
		$noUrut = (int) substr($id_kategori,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "KTG";
		$newID = $char. sprintf("%03s",$noUrut);
        $data=array(
           'id_kategori'=> $newID,
           'nama_kategori'=>  $this->input->post('kategori')
                    );
        $this->db->insert('kategori',$data);
    }
    
    
    function edit()
    {
        $data=array(
           'nama_kategori'=>  $this->input->post('kategori')
                    );
        $this->db->where('id_kategori',$this->input->post('id'));
        $this->db->update('kategori',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_kategori'=>$id);
        return $this->db->get_where('kategori',$param);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_kategori',$id);
        $this->db->delete('kategori');
    }
}