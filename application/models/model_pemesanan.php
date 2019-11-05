<?php
class model_pemesanan extends ci_model{
    
    function tampilpemesanan() 
    {
        $query = "SELECT * from pemesanan where status='waiting' AND bukti_pembayaran is not null";
        $pesan = $this->db->query($query)->result();
        return $pesan;
    }

    function updatestatuspemesanan($id)
    {
        $query = "UPDATE pemesanan SET status='Proses' where id_pemesanan='".$id."'";
        $update = $this->db->query($query);
    }

    function tampilkan_data_pemesanan(){
        
        return $this->db->query('SELECT a.*, b.nama_pengrajin, b.harga_jasa from pemesanan as a inner join pengrajin as b on b.id_pengrajin=a.id_pengrajin  where a.id_pengrajin is not null and a.bukti_pembayaran is not null ORDER by id_pemesanan asc')->result();
    }


    function delete($id)
    {
        $this->db->where('id_pemesanan',$id);
        $this->db->delete('pemesanan');
    }
   
    
}