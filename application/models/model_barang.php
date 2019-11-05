<?php
class model_barang extends ci_model{
    
    
    function tampil_data()
    {
        $query= "SELECT * FROM barang";
        return $this->db->query($query);
    }

    

    function tampil_data_stok_byId($id)
    {
        $query= "SELECT * FROM barang where id_barang= '".$id."'";
        return $this->db->query($query);
    }

    function tampil_data_by_stok()
    {
        $query= "SELECT a.* , b.nama_kategori FROM Barang as a inner join kategori as b on b.id_kategori=a.id_kategori";
        return $this->db->query($query);
    }

    function tampilkan_data_paging($config, $halaman)
  {
     $query= "SELECT a.* , b.nama_bahan, c.nama_kategori FROM barang as a inner join bahan as b on b.id_bahan = a.id_bahan inner join kategori as c on c.id_kategori = a.id_kategori Limit ".($halaman * $config['per_page']).", ".$config['per_page']." ";
     return $this->db->query($query);
  }

    function tampil_data_by_id($id)
    {
        $query= "SELECT a.* , b.nama_kategori, c.nama_bahan FROM barang as a inner join kategori as b on b.id_kategori=a.id_kategori inner join bahan as c on c.id_bahan = a.id_bahan where id_barang='".$id."'";
        return $this->db->query($query)->row();
    }

    function tampil_data_by_name()
    {
        $nama =$this->input->post('nama');
        $query= "SELECT a.* , b.nama_kategori FROM barang as a inner join kategori as b on b.id_kategori=a.id_kategori where nama_barang like '%".$nama."%'";
        return $this->db->query($query);
    }
    
    function post($foto)
    {
        
        $query = "SELECT max(id_barang) as maxKode from barang";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_barang = $data->maxKode;
		$noUrut = (int) substr($id_barang,3,3);
		$noUrut++;
		$char = "BRG";
        $newID = $char. sprintf("%03s",$noUrut);
        
        $id_barang = $newID;
        $nama       =   $this->input->post('nama_barang');
        $kategori   =   $this->input->post('kategori');
        $bahan   =   $this->input->post('bahan');
        $berat = $this->input->post('berat');
        $stok   =   0;
        $keterangan = "Kosong";
        $harga      =   $this->input->post('harga');

        $data       = array('nama_barang'=>$nama,
                            'id_kategori'=>$kategori,
                            'id_bahan'=>$bahan,
                            'id_barang'=> $id_barang,
                            'stok'=>$stok,
                            'harga_barang'=>$harga,
                            'berat_satuan'=>$berat,
                            'keterangan'=> $keterangan,
                            'foto'=>$foto);
        $this->db->insert('barang',$data);
    }
    
    function post_stok()
    {
        
            $query = "SELECT max(id_detail_pembelian) as maxKode from detail_pembelian";
            $check = $this->db->query($query);
            $data = $check->row();
            $id_detail_pembelian = $data->maxKode;
            $noUrut = (int) substr($id_detail_pembelian,3,3);
            $noUrut++;
            $char = "dtlpemb";
            $newID = $char. sprintf("%03s",$noUrut);
            
            $id_order = $newID;
            $id_barang       =   $this->input->post('id_barang');
            $jumlah   =   $this->input->post('jumlah');
            $harga   =   $this->input->post('harga');
            $total = $jumlah*$harga;
            $data       = array('id_order'=>$id_order,
                                'jumlah'=>$jumlah,
                                'harga'=> $harga,
                                'total_bayar'=>$total,
                                'id_barang'=>$id_barang);
            $this->db->insert('orderbarang',$data);
           redirect("pembelian");
    }
    
    function get_one($id)
    {
        $param  =   array('barang_id'=>$id);
        return $this->db->get_where('barang',$param);
    }
    
    function edit($data,$id)
    {
        $this->db->where('id_barang',$id);
        $this->db->update('barang',$data);
    }
    
    
    function delete($id)
    {
        $this->db->where('id_barang',$id);
        $this->db->delete('barang');
    }

    function tambah_stok($id,$jml)
    {
        $this->db->where('id_barang',$id);
        $this->db->update('barang','stok');
    }

    function baranglaris()
    {
        $query= "select * from barang order by id_barang desc limit 3";
        return $this->db->query($query);
    }

    function deleteimg($id)
    {   
       
        $detail= "SELECT*FROM barang where id_barang='".$id."'";
        $img=$this->db->query($detail)->result();
        foreach($img as $r)
        {
            unlink('img/barang/'.$r->foto);
        }
    }
    
}