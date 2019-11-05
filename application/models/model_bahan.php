<?php
class Model_bahan extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->get('bahan');
    }
    
  function tampilkan_data_paging($config,$halaman)
  {
     return $this->db->get('bahan', $config['per_page'], ($halaman * $config['per_page']));
  }
    
    function post(){

         
        $query = "SELECT max(id_bahan) as maxKode from bahan";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_bahan = $data->maxKode;
		$noUrut = (int) substr($id_bahan,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "BHN";
		$newID = $char. sprintf("%03s",$noUrut);
        $data=array(
           'id_bahan'=> $newID,
           'nama_bahan'=>  $this->input->post('namabahan'),
           'harga_bahan'=> $this->input->post('hargabahan')
                    );
        $this->db->insert('bahan',$data);
    }
    
    
    function edit()
    {
        $data=array(
           'nama_bahan'=>  $this->input->post('namabahan'),
           'harga_bahan'=> $this->input->post('hargabahan')
                    );
        $this->db->where('id_bahan',$this->input->post('id'));
        $this->db->update('bahan',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_bahan'=>$id);
        return $this->db->get_where('bahan',$param);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_bahan',$id);
        $this->db->delete('bahan');
    }
}