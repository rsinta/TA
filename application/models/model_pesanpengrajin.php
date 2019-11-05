<?php
class model_pesanpengrajin extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->query('SELECT * from pemesanan where id_pengrajin is not null and bukti_pembayaran is not null')->rseult();
    }
    
  function tampilkan_data_paging($config,$halaman)
  {
     return $this->db->get('pemesanan_pengrajin', $config['per_page'], ($halaman * $config['per_page']));
  }
    
    function post(){

         
        $query = "SELECT max(id_pesan_pengrajin) as maxKode from pemesanan_pengrajin";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_pesan_pengrajin = $data->maxKode;
        echo $id_transaksi;
		$noUrut = (int) substr($id_pesan_pengrajin,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "PSN";
		$newID = $char. sprintf("%03s",$noUrut);
        $data=array(
           'id_pesan_pengrajin'=> $newID,
           'nama_pesan_pengrajin'=>  $this->input->post('pesan')
                    );
        $this->db->insert('pemesan_pengrajin',$data);
    }
    
    
    function edit()
    {
        $data=array(
           'nama_pesan_pengrajin'=>  $this->input->post('jasakirim')
                    );
        $this->db->where('id_pesan_pengrajin',$this->input->post('id'));
        $this->db->update('pesan_pengrajin',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('id_pesan_pengrajin'=>$id);
        return $this->db->get_where('pesan_pengrajin',$param);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_pesan_pengrajin',$id);
        $this->db->delete('pesan_pengrajin');
    }
}