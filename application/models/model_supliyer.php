<?php
class model_supliyer extends CI_Model{
    
    

    function post()
    {
       
        $query = "SELECT max(id_supliyer) as maxKode from supliyer";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_supliyer = $data->maxKode;
		$noUrut = (int) substr($id_supliyer,3,3);
		$noUrut++;
		$char = "SPL";
		$newID = $char. sprintf("%03s",$noUrut);

            // proses data
            $nama       =  $this->input->post('nama',true);
            $alamat   =  $this->input->post('alamat',true);
            $notelp   =  $this->input->post('notelp',true);
            $datasupl       =  array(   'id_supliyer'=>$newID,
                                    'nama'=>$nama,
                                    'alamat'=>$alamat,
                                    'kontak'=>$notelp);
            $this->db->insert('supliyer',$datasupl);
    }

    function edit()
    {
            // proses kategori
            $id =  $this->input->post('id',true);
            $nama       =  $this->input->post('nama',true);
            $alamat   =  $this->input->post('alamat',true);
            $bagian   =  $this->input->post('bagian',true);
            $jeniskel   =  $this->input->post('jk',true);
            $notelp   =  $this->input->post('nomertelp',true);
            $level   =  $this->input->post('level',true);
            $datakar       =  array(   'id_karyawan'=>$id,
                                    'nama'=>$nama,
                                    'alamat'=>$alamat,
                                    'bagian'=>$bagian,
                                    'jenis_kelamin'=>$jeniskel,
                                    'nomor_telp'=>$notelp,
                                    'level'=>$level );
             $this->db->where('id_karyawan',$id);
             $this->db->update('karyawan',$datakar);
    }
    
    
    function tampildata()
    {
        return $this->db->get('supliyer');
    }
    
    function get_one($id)
    {
        $param  =   array('id_supliyer'=>$id);
        return $this->db->get_where('supliyer',$param);
    }
}