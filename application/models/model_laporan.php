<?php
class model_laporan extends CI_Model{
    
    function tampillaporanpenjualan()
    {
        $query = "SELECT a.* , b.nama_jasa_layanan_kirim as nama_layanan from penjualan as a inner join 
        jasa_layanan_kirim as b  on b.id_jasa_layanan_kirim = a.id_jasa_layanan_kirim ";
        $penjualan = $this->db->query($query);
        return $penjualan;
    }
    
    function tampildatabarang()
    {
        $query = "SELECT b.* , k.nama_kategori, a.nama_bahan from barang as b inner join kategori as k on 
        b.id_kategori=k.id_kategori inner join bahan as a on b.id_bahan=a.id_bahan";
        $barang = $this->db->query($query);
        return $barang;
    }
    
    function tampildatapemesanan()
    {
        $query = "SELECT a.* , b.nama_anggota, c.nama_kategori, d.nama_pengrajin, e.nama_bahan from pemesanan as a 
        inner join anggota as b on b.id_anggota=a.id_anggota inner join kategori as c on 
        c.id_kategori=a.id_kategori inner join pengrajin as d on d.id_pengrajin=a.id_pengrajin
        inner join bahan as e on e.id_bahan=a.id_bahan where a.status='Proses'";
        $barang = $this->db->query($query);
        return $barang;
    }

    function tampildatapembelian()
    {
        $query = "SELECT * from pembelian";
        $barang = $this->db->query($query);
        return $barang;
    }
}