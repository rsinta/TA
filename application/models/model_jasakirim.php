<?php
class model_jasakirim extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->get('jasa_layanan_kirim');
    }
    
  function tampilkan_data_paging($config,$halaman)
  {
     return $this->db->get('jasa_layanan_kirim', $config['per_page'], ($halaman * $config['per_page']));
  }
    
    function post(){

         
        $query = "SELECT max(id_jasa_layanan_kirim) as maxKode from jasa_layanan_kirim";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_jasakirim = $data->maxKode;
        echo $id_transaksi;
		$noUrut = (int) substr($id_jasakirim,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "JASA";
		$newID = $char. sprintf("%03s",$noUrut);
        $data=array(
           'id_jasa_layanan_kirim'=> $newID,
           'nama_jasa_layanan_kirim'=>  $this->input->post('jasa')
                    );
        $this->db->insert('jasa_layanan_kirim',$data);
    }
    
    
    function edit()
    {
        $data=array(
           'nama_jasa_layanan_kirim'=>  $this->input->post('jasakirim')
                    );
        $this->db->where('id_jasa_layanan_kirim',$this->input->post('id'));
        $this->db->update('jasa_layanan_kirim',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_jasa_layanan_kirim'=>$id);
        return $this->db->get_where('jasa_layanan_kirim',$param);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_jasa_layanan_kirim',$id);
        $this->db->delete('jasa_layanan_kirim');
    }
}