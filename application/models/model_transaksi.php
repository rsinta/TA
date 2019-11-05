<?php
class model_transaksi extends ci_model
{
    
    
    function tampiltransaksi()
    {
        $query= "SELECT*FROM penjualan";
        return $this->db->query($query);   
    }
    function tampilpemesanan($id)
    {
        $query= "SELECT*FROM pemesanan where id_anggota='".$id."'";
        return $this->db->query($query);   
    }

    function tampilpemesananadmin($id)
    {
        $query= "SELECT*FROM pemesanan where id_pemesanan='".$id."'";
        return $this->db->query($query);   
    }

    function tampilpemesananbyidpesan($id)
    {
        $query= "SELECT*FROM pemesanan where id_pemesanan='".$id."'";
        return $this->db->query($query);   
    }

    function tampiltransaksinoresi()
    {
        $query= "SELECT*FROM penjualan where resi is null";
        return $this->db->query($query);   
    }
    function tampiltransaksiuser($id)
    {
        $query= "SELECT distinct b.id_anggota as ID, a.* from penjualan as a inner join keranjang as b on b.id_penjualan= a.id_penjualan  where b.id_anggota='".$id."' and a.bukti is not null and a.status != 'Terkirim'";
        return $this->db->query($query);   
    }
    function tampiltransaksioffline()
    {
        $query= "SELECT*FROM penjualan where resi is null and status = 'Terverifikasi'";
        return $this->db->query($query);   
    }

    function tampiltransaksibyid()
    {
        $id_user= $_SESSION['userdata']->id_user;
        $query= "SELECT distinct date(b.tanggal) as tgl, b.id_transaksi, b.total_bayar FROM transaksi as b inner join detail as a on a.id_transaksi=b.id_transaksi where a.id_user='".$id_user."'";
        return $this->db->query($query);   
    }

    function tampiltransaksibyidonline()
    {
        $id_anggota= $_SESSION['userdata']->id_anggota;
        $query= "SELECT distinct date(b.tgl) as tgl, b.id_penjualan, b.total_harga FROM penjualan as b inner join keranjang as a on a.id_penjualan=b.id_penjualan where a.id_anggota='".$id_anggota."'";
        return $this->db->query($query);   
    }

    function tampiltransaksibyidonlinepending()
    {
        $id_anggota= $_SESSION['userdata']->id_anggota;
        $query= "SELECT distinct date(b.tgl) as tgl, b.id_penjualan, b.total_harga FROM penjualan as b inner join keranjang as a on a.id_penjualan=b.id_penjualan where a.id_anggota='".$id_anggota."' and b.bukti is null";
        return $this->db->query($query);   
    }
    
    function getjumlahpembayaran($id_penjualan)
    {
       
        return $this->db->query('Select total_harga from penjualan where id_penjualan="'.$id_penjualan.'"');
    }

    function hargabahan($id)
    {
        return $this->db->query('Select harga_bahan from bahan where id_bahan="'.$id.'"');
    }

    function hargajasapengrajin($id)
    {
        return $this->db->query('Select harga_jasa from pengrajin where id_pengrajin="'.$id.'"');
    }

 

    function updatebukti($name)
    {
        $id_penjualan       =   $this->input->post('transaksipending');
        $foto      =  $this->input->post('berkas');
        $data       = array('bukti'=>$name);
        $this->db->where('id_penjualan',$id_penjualan);
        $this->db->update('penjualan',$data);
    }

    function updatebuktipemesanan($name,$dp)
    {
        $id_pemesanan       =   $this->input->post('id_pemesanan');
        $this->db->query('UPDATE pemesanan set bukti_pembayaran="'.$name.'", kekurangan=kekurangan-'.$dp.' where id_pemesanan="'.$id_pemesanan.'"');
    }
    
    function tampilkan_data_paging($config, $halaman)
    {
       return $this->db->query('Select*from penjualan limit '.$halaman * $config['per_page'].','.$config['per_page'].'');
    }

    function tampilkan_data_pagingoffline($config, $halaman)
    {
       return $this->db->query('Select*from penjualan where resi is null and status="Terverifikasi" limit '.$halaman * $config['per_page'].','.$config['per_page'].'');
    }

    
    function totalchart()
    {
        $id_anggota=$_SESSION['userdata']->id_anggota;
        $jumlah= $this->db->query("SELECT count(id_keranjang) as total from keranjang where id_anggota='".$id_anggota."' and date(tgl)=date(now()) and cek=0");
        $jumlahchart = $jumlah->row();
        if($jumlahchart)
        {
            return $jumlahchart->total;
        }
		else{ return 0;}
    }

    function totalchartpending()
    {
        $jumlah= $this->db->query("SELECT count(id_penjualan) as total from penjualan where status='Proses' and bukti is not null");
        $jumlahchart = $jumlah->row();
        if($jumlahchart)
        {
            return $jumlahchart->total;
        }
		else{ return 0;}
    }

    function totalpemesananpending()
    {
        $jumlah= $this->db->query("SELECT count(id_pemesanan) as total from pemesanan where status=1");
        $jumlahchart = $jumlah->row();
        if($jumlahchart)
        {
            return $jumlahchart->total;
        }
		else{ return 0;}
    }

    function tampilpesananwaiting($id)
    {
        $query= "SELECT*FROM pemesanan where id_anggota='".$id."' and status=7";
        return $this->db->query($query);   
    }

    function accdatapending($id)
    {
        $this->db->query("UPDATE penjualan set status='Terverifikasi' where id_penjualan='".$id."'");
    }
    function accdatapendingpesanan($id,$dataupdate)
    {
        $this->db->where('id_pemesanan',$id);
        $this->db->update('pemesanan',$dataupdate);
    }

    function datapending()
    {
        return $this->db->query("SELECT*from penjualan where status='Proses' and bukti is not null");
    }

    function datapemesananpending()
    {
        return $this->db->query("SELECT  a.*, b.nama_kategori from pemesanan as a inner join kategori as b on b.id_kategori = a.id_kategori where status=1");
    }
    function datapemesananpendingbyid($id)
    {
        return $this->db->query("SELECT  a.*, b.nama_kategori from pemesanan as a inner join kategori as b on b.id_kategori = a.id_kategori where status=1 where id_pemesanan='".$id."'");
    }

    function chart()
    {
        $query= "SELECT b.id_keranjang, a.nama_barang, b.jumlah, a.harga_barang, b.id_penjualan, b.id_barang, a.berat_satuan FROM keranjang as b inner join barang as a on b.id_barang = a.id_barang   WHERE b.id_anggota='".$_SESSION['userdata']->id_anggota."' and date(b.tgl)=date(now()) and cek=0";
        return $this->db->query($query);   
    }

    
    function chartoff()
    {
        $query= "SELECT a.id_detail, b.nama_barang, a.harga, b.berat_satuan, a.jumlah FROM detail as a inner join barang as b on b.id_barang=a.id_barang WHERE a.id_user='".$_SESSION['userdata']->id_user."' and date(tanggal)= date(now()) and status=0";
        return $this->db->query($query);   
    }

    function insertdetail($databarangtransaksi)
    {
        $id_brng=$databarangtransaksi['id'];
        $id_anggota=$_SESSION['userdata']->id_anggota;
        $query = "SELECT max(id_keranjang) as maxKode from keranjang";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_detail = $data->maxKode;
		$noUrut = (int) substr($id_detail,3,3);
		$noUrut++;
		$char = "KRJ";
		$newID = $char. sprintf("%03s",$noUrut);
		$querybarang = "SELECT id_barang from keranjang where id_anggota ='".$id_anggota."' and id_barang='".$id_brng."' and cek=0 and date(tgl)=date(now())";
        $cekBarang = $this->db->query($querybarang)->row();
        $data= array('id_keranjang'=>$newID,'id_barang'=>$id_brng,'jumlah'=>1,'id_anggota'=>$id_anggota,'cek'=>0);
		if($cekBarang)
		{
			$this->db->query("UPDATE keranjang set jumlah=jumlah+1 where id_anggota = '".$id_anggota."' and id_barang='".$id_brng."' and cek=0 and date(tgl)=date(now())");  
		}
		else
		{
            $this->db->insert('keranjang',$data);
		}
		
    }

    function insertdetail2($databarangtransaksi)
    {
        $id_brng=$databarangtransaksi['id'];
        $jml=$databarangtransaksi['qty'];
        $id_anggota=$_SESSION['userdata']->id_anggota;
        $query = "SELECT max(id_keranjang) as maxKode from keranjang";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_detail = $data->maxKode;
		$noUrut = (int) substr($id_detail,3,3);
		$noUrut++;
		$char = "KRJ";
		$newID = $char. sprintf("%03s",$noUrut);
		$querybarang = "SELECT id_barang from keranjang where id_anggota ='".$id_anggota."' and id_barang='".$id_brng."' and cek=0 and date(tgl)=date(now())";
        $cekBarang = $this->db->query($querybarang)->row();
        $data= array('id_keranjang'=>$newID,'id_barang'=>$id_brng,'jumlah'=>$jml,'id_anggota'=>$id_anggota,'cek'=>0);
		if($cekBarang)
		{
			$this->db->query("UPDATE keranjang set jumlah=jumlah+$jml where id_anggota = '".$id_anggota."' and id_barang='".$id_brng."' and cek=0 and date(tgl)=date(now())");  
		}
		else
		{
            $this->db->insert('keranjang',$data);
		}
		
    }

    function insertdetailadmin($databarangtransaksi)
    {
        $id_brng=$databarangtransaksi['id'];
        $id_user=$_SESSION['userdata']->id_user;
        $jml=$databarangtransaksi['jml'];
        $harga=$databarangtransaksi['hrg'];
        $query = "SELECT max(id_detail) as maxKode from detail";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_detail = $data->maxKode;
		$noUrut = (int) substr($id_detail,3,3);
		$noUrut++;
		$char = "DTL";
		$newID = $char. sprintf("%03s",$noUrut);
		$querybarang = "SELECT id_barang from detail where id_user ='".$id_user."' and id_barang='".$id_brng."' and status=0 and date(tanggal)=date(now())";
        $cekBarang = $this->db->query($querybarang)->row();
        $data= array('id_detail'=>$newID,'id_barang'=>$id_brng,'harga'=>$harga,'jumlah'=>$jml,'id_user'=>$id_user,'status'=>0);
		if($cekBarang)
		{
			$this->db->query("UPDATE detail set jumlah=jumlah+$jml where id_user = '".$id_user."' and id_barang='".$id_brng."' and status=0 and date(tanggal)=date(now())");  
		}
		else
		{
            $this->db->insert('detail',$data);
		}
		
    }

    

    

    function insertpenjualan($datapenjualan)
    {
        $query = "SELECT max(id_penjualan) as maxKode from penjualan";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_penjualan = $data->maxKode;
        echo $id_penjualan;
		$noUrut = (int) substr($id_penjualan,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "PNJ";
        $newID = $char. sprintf("%03s",$noUrut);
        $datapenjualan['id_penjualan']= $newID;
        echo json_encode($datapenjualan);
        $this->db->insert('penjualan',$datapenjualan);
        $this->db->query("UPDATE keranjang set cek=1 , id_penjualan='".$newID."' where cek=0 and id_anggota='".$_SESSION['userdata']->id_anggota."' and date(tgl)=date(now())");  
       
        	
		
    }

    function insertpemesanan($datapenjualan)
    {
        $query = "SELECT max(id_pemesanan) as maxKode from pemesanan";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_pemesanan = $data->maxKode;
       
		$noUrut = (int) substr($id_pemesanan,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "PSN";
        $newID = $char. sprintf("%03s",$noUrut);
        
        $datapenjualan['id_pemesanan']= $newID;
        echo json_encode($datapenjualan);
        $this->db->insert('pemesanan',$datapenjualan); 
    }


    function insertpenjualanoffline($totalbayar)
    {
        
        $query = "SELECT max(id_transaksi) as maxKode from transaksi";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_transaksi = $data->maxKode;
        echo $id_transaksi;
		$noUrut = (int) substr($id_transaksi,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "TRS";
		$newID = $char. sprintf("%03s",$noUrut);
       $this->db->query("INSERT into transaksi(id_transaksi,total_bayar,jenis_transaksi,status) values('".$newID."','".$totalbayar."','offline',1)");
       $this->db->query("UPDATE detail set status=1 , id_transaksi='".$newID."' where status=0 and id_user='".$_SESSION['userdata']->id_user."' and date(tanggal)=date(now())");  
        	
		
    }

    function inputresi($id,$resi)
    {
       $query = "UPDATE penjualan set resi = '".$resi."', status='Dikirim' where id_penjualan = '".$id."'";
       $this->db->query($query);
    }

    
    function tampilkan_detail_transaksi()
    {
        $id_penjualan = $this->input->post('id_penjualan');
        $query  ="SELECT b.nama_barang, a.jumlah, a.tgl, b.harga_barang From keranjang as a inner join barang as b on b.id_barang=a.id_barang where a.id_penjualan='$id_penjualan'";
        $data = $this->db->query($query);
        return $data->result();
    }
    function tampilkan_detail_transaksi_offline()
    {
        $id_transaksi = $this->input->post('id_transaksi');
        $query  ="SELECT b.nama_barang, a.jumlah, a.tanggal, a.harga From detail as a inner join barang as b on b.id_barang=a.id_barang where a.id_transaksi='$id_transaksi'";
        $data = $this->db->query($query);
        return $data->result();
    }
    
    
    function hapusdetail($id)
    {
        $this->db->where('id_detail',$id);
        $this->db->delete('detail');
    }
    function hapusdetailbatal()
    {
        $this->db->where('id_penjualan',null);
        $this->db->where('id_anggota',$_SESSION['userdata']->id_anggota);
        $this->db->delete('keranjang');
    }
    function hapusdetailonline($id)
    {
        $this->db->where('id_keranjang',$id);
        $this->db->delete('keranjang');
    }

    function hapusdetailonlinebatal()
    {
        $this->db->where('id_penjualan',null);
        $this->db->where('id_anggota',$_SESSION['userdata']->id_anggota);
        $this->db->delete('keranjang');
    }
    
    
    function laporan_default_offline()
    {
        $query="SELECT* from laporan_penjualan_offline";
        return $this->db->query($query);
    }
    function laporan_default()
    {
        $query="SELECT* from laporan_penjualan";
        return $this->db->query($query);
    }
    
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT*from laporan_penjualan where date(tanggal) between '$tanggal1' and '$tanggal2'";
        return $this->db->query($query);
    }
    function laporan_periode_offline($tanggal1,$tanggal2)
    {
        $query="SELECT*from laporan_penjualan_offline where date(tanggal) between '$tanggal1' and '$tanggal2'";
        return $this->db->query($query);
    }
}