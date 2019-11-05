<?php
class model_pengrajin extends CI_Model{
    
    
    

    function post()
    {
       
        $query = "SELECT max(id_pengrajin) as maxKode from pengrajin";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_pengrajin = $data->maxKode;
		$noUrut = (int) substr($id_pengrajin,3,3);
		$noUrut++;
		$char = "PNR";
		$newID = $char. sprintf("%03s",$noUrut);

            // proses data
            $nama       =  $this->input->post('nama');
            $alamat   =  $this->input->post('alamat');
            $notelp   =  $this->input->post('notelp');
            $hargajasa   =  $this->input->post('hargajasa');
            $data       =  array(   'id_pengrajin'=>$newID,
                                    'nama_pengrajin'=>$nama,
                                    'alamat'=>$alamat,
                                    'no_telp'=> $notelp,
                                    'harga_jasa'=>$hargajasa);
            $this->db->insert('pengrajin',$data);
    }

    function edit()
    {
            // proses kategori
            $id =  $this->input->post('id');
            $nama     =  $this->input->post('nama');
            $alamat   =  $this->input->post('alamat');
            $bagian   =  $this->input->post('bagian');
            $notelp   =  $this->input->post('nomertelp');
            $hargajasa=  $this->input->post('hargajasa');
            $data       =  array(   'nama_pengrajin'=>$nama,
                                    'alamat'=>$alamat,
                                    'no_telp'=>$notelp,
                                    'harga_jasa'=>$hargajasa );
             $this->db->where('id_pengrajin',$id);
             $this->db->update('pengrajin',$data);
    }
    
    function delete($id)
    {
        $this->db->where('id_pengrajin',$id);
        $this->db->delete('pengrajin');
    }

    function tampildata()
    {
        return $this->db->get('pengrajin');
    }

    function tampildatapengrajin()
    {
        return $this->db->get('pengrajin');
    }

    function tampildatamemberbyname()
    {
        $nama =$this->input->post('nama');
        $query= "SELECT * from member where nama_member like '%".$nama."%'";
        return $this->db->query($query);
        
    }
    
    function get_one($id)
    {
        $param  =   array('id_pengrajin'=>$id);
        return $this->db->get_where('pengrajin',$param);
    }

    function getUser($id_user)
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->where('id_user',$id_user);
        $chek = $this->db->get();
        return $chek;

      
    }

    function getUserCek($i,$p,$j)
    {
        $query= "SELECT * from user where id_user='".$i."' and pertanyaannya='".$p."' and jawabannya='".$j."' ";
        return $this->db->query($query);
      
    }

    function resetpasswordbaru($i,$p)
    {
        $passbaru = md5($i.$p);
        $data = array('password'=>$passbaru);
        $this->db->where('id_user',$i);
        $this->db->update('user',$data);
        return 1;
    }
}