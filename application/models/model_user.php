<?php
class model_user extends ci_model
{
    function register($datauser)
    {
        $this->db->select('id_user');
        $this->db->from('user');
        $this->db->where('id_user',$datauser['id_user']);
        $chek = $this->db->get();
        $data=$chek->row();
        if ($data)
        {
            return 1;
        }
        else
        {
            $this->db->insert('user',$datauser);
            return 0;
        }
    }

    function registermember($datauser)
    {
        $this->db->select('username_anggota');
        $this->db->from('anggota');
        $this->db->where('username_anggota',$datauser['username_anggota']);
        $chek = $this->db->get();
        $data=$chek->row();
        if ($data)
        {
           return 1;
        }
        else
        {
            
                $this->db->insert('anggota',$datauser);
                return 0;
        }


        
    }

    function getKaryawan()
    {
        $this->db->select('id_karyawan,nama');
        $this->db->from('karyawan');
        $chek = $this->db->get();
        return $chek->result();
    }

    function getUser($email)
    {
        $this->db->select('*');
        $this->db->from('member');
        $this->db->where('email',$email);
        $chek = $this->db->get();
        return $chek;

      
    }

    function getUserCek($e,$p,$j)
    {
        $query= "SELECT * from member where email='".$e."' and pertanyaan='".$p."' and jawaban='".$j."' ";
        return $this->db->query($query);
      
    }

    function resetpasswordbaru($e,$p)
    {
        $passbaru = md5($e.$p);
        $data = array('password'=>$passbaru);
        $this->db->where('email',$e);
        $this->db->update('member',$data);
        return 1;
    }



}
?>