<?php
class model_pembelian extends ci_model
{
    
    

    function totalchart()
    {
        $id_user=$_SESSION['userdata']->id_user;
        $jumlah= $this->db->query("SELECT count(id_detail) as total from detail where id_user='".$id_user."' and date(tanggal)=date(now()) and status=0");
        $jumlahchart = $jumlah->row();
        if($jumlahchart)
        {
            return $jumlahchart->total;
        }
		else{ return 0;}
    }

    function tampil_pembeliaan()
    {
  
        $query= "SELECT a.*, b.nama_barang FROM detail_pembelian as a inner join barang as b on b.id_barang= a.id_barang where id_pembelian is null and date(tgl)=date(now()) and status=0 ";
        return $this->db->query($query);
    }

    

    function insertdetailpembelian($id_brng,$jml,$id_pengrajin)
    {
    
        $queryharga="SELECT harga_barang from barang where id_barang = '".$id_brng."'";
        $checkharga = $this->db->query($queryharga)->row();
        $harga=  $checkharga->harga_barang;
        $query = "SELECT max(id_detail_pembelian) as maxKode from detail_pembelian";
        $check = $this->db->query($query);
        $data = $check->row();
		$id_keranjang = $data->maxKode;
		$noUrut = (int) substr($id_keranjang,3,3);
		$noUrut++;
		$char = "PMB";
		$newID = $char. sprintf("%03s",$noUrut);
		$querybarang = "SELECT id_barang from detail_pembelian where id_barang='".$id_brng."' and status=0 and date(tgl)=date(now())";
        $cekBarang = $this->db->query($querybarang)->row();
        $data= array('id_detail_pembelian'=>$newID,'id_pengrajin'=>$id_pengrajin,'id_barang'=>$id_brng,'harga_barang'=>$harga,'jumlah'=>$jml,'status'=>0);
		if($cekBarang)
		{
			$this->db->query("UPDATE detail_pembelian set jumlah=jumlah+$jml where id_barang='".$id_brng."' and status=0 and date(tgl)=date(now())");  
		}
		else
		{
            $this->db->insert('detail_pembelian',$data);
		}
		
    }

    
    function insertpembelian($totalbayar)
    {
        
        $query = "SELECT max(id_pembelian) as maxKode from pembelian";
        $check = $this->db->query($query);
        $data = $check->row();
        $id_pembelian = $data->maxKode;
       //echo $id_transaksi;
		$noUrut = (int) substr($id_pembelian,3,3);
        $noUrut++;
        echo $noUrut;
		$char = "BLI";
		$newID = $char. sprintf("%03s",$noUrut);
       $this->db->query("INSERT into pembelian(id_pembelian,total_bayar) values('".$newID."','".$totalbayar."')");
       $this->db->query("UPDATE detail_pembelian set status=1 , id_pembelian='".$newID."' where status=0 and date(tgl)=date(now())");  
        	
		
    }
    

    
    function laporan_default()
    {
        $query="SELECT t.tanggal_transaksi,o.nama_lengkap,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,operator as o
                WHERE td.transaksi_id=t.transaksi_id and o.operator_id=t.operator_id
                group by t.transaksi_id";
        return $this->db->query($query);
    }
    
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT t.tanggal_transaksi,o.nama_lengkap,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,operator as o
                WHERE td.transaksi_id=t.transaksi_id and o.operator_id=t.operator_id 
                and t.tanggal_transaksi between '$tanggal1' and '$tanggal2'
                group by t.transaksi_id";
        return $this->db->query($query);
    }
    function hapusdetailpembelian($id)
    {
        $this->db->where('id_detail_pembelian',$id);
        $this->db->delete('detail_pembelian');
    }
    function hapusdetailpembelianbatal()
    {
        $this->db->where('id_order',$_SESSION['userdata']->id_user);
        $this->db->delete('detail_pembelian');
    }
}