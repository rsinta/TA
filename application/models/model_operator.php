<?php
class model_operator extends CI_Model{
    
    
    
    function login($username,$password)
    {
        $this->db->select('*');
        $this->db->from('admin');
        $this->db->where('username',$username);
        $this->db->where('pass',$password);
        $chek = $this->db->get();
        return $chek->row();
    }

    function loginuser($email,$password)
    {
        
        $this->db->select('*');
        $this->db->from('anggota');
        $this->db->where('username_anggota',$email);
        $this->db->where('password_anggota',md5($password));
        $chek = $this->db->get();
        return $chek->row();
    }

    function post()
    {
       
        $query = "SELECT max(id_karyawan) as maxKode from karyawan";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_karyawan = $data->maxKode;
		$noUrut = (int) substr($id_karyawan,3,3);
		$noUrut++;
		$char = "KRY";
		$newID = $char. sprintf("%03s",$noUrut);

            // proses data
            $nama       =  $this->input->post('nama',true);
            $alamat   =  $this->input->post('alamat',true);
            $bagian   =  $this->input->post('bagian',true);
            $jeniskel   =  $this->input->post('jk',true);
            $notelp   =  $this->input->post('nomertelp',true);
            $level   =  $this->input->post('level',true);
            $datakar       =  array(   'id_karyawan'=>$newID,
                                    'nama'=>$nama,
                                    'alamat'=>$alamat,
                                    'bagian'=>$bagian,
                                    'jenis_kelamin'=>$jeniskel,
                                    'nomor_telp'=>$notelp,
                                    'level'=>$level );
            $this->db->insert('karyawan',$datakar);
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
        return $this->db->get('karyawan');
    }

    function tampildatamember()
    {
        return $this->db->get('anggota');
    }

    function tampildatamemberbyname()
    {
        $nama =$this->input->post('nama');
        $query= "SELECT * from member where nama_member like '%".$nama."%'";
        return $this->db->query($query);
        
    }
    
    function get_one($id)
    {
        $param  =   array('id_karyawan'=>$id);
        return $this->db->get_where('karyawan',$param);
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