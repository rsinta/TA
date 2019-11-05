<?php
    class cetak extends ci_controller{
    
        function __construct() {
        parent::__construct();
        $this->load->model(array('model_barang','model_transaksi','model_pembelian','model_pemesanan','model_laporan'));
        check_session();
    }


    function allpdf()
    {
        if($_SESSION['level']==1)
        {
            $this->load->library('cfpdf');
        $pdf=new FPDF('P','cm','A4');
        $pdf->AddPage();

        $pdf->SetFont('Arial','B','C');
        $pdf->SetFontSize(16);
        $pdf->image(base_url().'img/logo.png',1,0.4,4);
        $pdf->text(8, 2.7,'Djono Silver',0,1,'C');
        $pdf->text(7, 4.5,'LAPORAN PENJUALAN',0,1,'C');
        $pdf->SetFont('Arial','B','C');
        $pdf->SetFontSize(12);
        $pdf->setLineWidth(0.05);
        $pdf->Cell(15);
        $pdf->Cell(4, 2, date('d-M-y'), 1,1,'C');
        $pdf->SetFont('Arial','B','C');
        $pdf->setLineWidth(0.08);
        $pdf->Line(21,3.5,0,3.5);
        $pdf->setLineWidth(0.05);
        $pdf->Ln(2);
        $pdf->SetFontSize(12);
        $pdf->Cell(2);
        $pdf->Cell(1, 1, 'No', 1,0,'C');
        $pdf->Cell(4, 1, 'Nama Jasa Kirim', 1,0,'C');
        $pdf->Cell(5, 1, 'Tanggal Order', 1,0,'C');
        $pdf->Cell(3, 1, 'Ongkos Kirim', 1,0,'C');
        $pdf->Cell(3, 1, 'Total Harga', 1,1,'C');
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->model_laporan->tampillaporanpenjualan();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(2);
            $pdf->Cell(1, 1, $no, 1,0,'C');
            $pdf->Cell(4, 1, $r->nama_layanan, 1,0,'C');
            $pdf->Cell(5, 1, $r->tgl, 1,0,'C');
            $pdf->Cell(3, 1,'Rp '.$r->ongkir, 1,0,'R');
            $pdf->Cell(3, 1,'Rp '.$r->total_harga, 1,1,'R');
            $no++;
            $total=$total+$r->total_harga;
        }
        // end
        $pdf->Cell(2);
        $pdf->Cell(10,1,'Total',1,0,'R');
        $pdf->Cell(5,1,'Rp '.$total,1,0,'R');
        $pdf->Output();
        }
        else
        {
            redirect('auth/login');
        }
        
    }
   

    function cetakbarang()
    {
        if($_SESSION['level']==1)
        {
            $this->load->library('cfpdf');
        $pdf=new FPDF('P','cm','A4');
        $pdf->AddPage();

        $pdf->SetFont('Arial','B','C');
        $pdf->SetFontSize(16);
        $pdf->image(base_url().'img/logo.png',1,0.4,4);
        $pdf->text(9, 2,'Djono Silver',0,1,'C');
        $pdf->text(7, 2.7,'LAPORAN DATA BARANG',0,1,'C');
        $pdf->SetFont('Arial','B','C');
        $pdf->SetFontSize(12);
        $pdf->setLineWidth(0.05);
        $pdf->Cell(15);
        $pdf->Cell(4, 2, date('d-M-y'), 1,1,'C');
        $pdf->SetFont('Arial','B','C');
        $pdf->setLineWidth(0.08);
        $pdf->Line(21,3.5,0,3.5);
        $pdf->setLineWidth(0.05);
        $pdf->Ln(2);
        $pdf->SetFontSize(12);
        
        $pdf->Cell(1, 1, 'No', 1,0,'C');
        $pdf->Cell(4, 1, 'Kode Barang', 1,0,'C');
        $pdf->Cell(5, 1, 'Nama Barang', 1,0,'C');
        $pdf->Cell(3, 1, 'Kategori', 1,0,'C');
        $pdf->Cell(3, 1, 'Bahan', 1,0,'C');
        $pdf->Cell(3, 1, 'Harga', 1,1,'C');
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->model_laporan->tampildatabarang();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
           
            $pdf->Cell(1, 1, $no, 1,0,'C');
            $pdf->Cell(4, 1, $r->id_barang, 1,0,'C');
            $pdf->Cell(5, 1, $r->nama_barang, 1,0,'C');
            $pdf->Cell(3, 1, $r->nama_kategori, 1,0,'R');
            $pdf->Cell(3, 1, $r->nama_bahan, 1,0,'R');
            $pdf->Cell(3, 1,'Rp '.$r->harga_barang, 1,1,'R');
            $no++;
            
        }
        // end
      
        $pdf->Output();
        }
        else
        {
            redirect('auth/login');
        }
        
    }

    function cetakpemesanan()
    {
        if($_SESSION['level']==1)
        {
        $this->load->library('cfpdf');
        $pdf=new FPDF('L','cm','A4');
        $pdf->AddPage();

        $pdf->SetFont('Arial','B','C');
        $pdf->SetFontSize(16);
        $pdf->image(base_url().'img/logo.png',1,0.4,4);
        $pdf->text(12.4, 2,'Djono Silver',0,1,'C');
        $pdf->text(11, 2.7,'LAPORAN PEMESANAN',0,1,'C');
        $pdf->SetFont('Arial','B','C');
        $pdf->SetFontSize(12);
        $pdf->setLineWidth(0.05);
        $pdf->Cell(23);
        $pdf->Cell(4, 2, date('d-M-y'), 1,1,'C');
        $pdf->SetFont('Arial','B','C');
        $pdf->setLineWidth(0.08);
        $pdf->Line(30,3.5,0,3.5);
        $pdf->setLineWidth(0.05);
        $pdf->Ln(2);
        $pdf->SetFontSize(12);
        
        $pdf->Cell(1, 1, 'No', 1,0,'C');
        $pdf->Cell(4, 1, 'Nama Anggota', 1,0,'C');
        $pdf->Cell(3, 1, 'Kategori', 1,0,'C');
        $pdf->Cell(4, 1, 'Nama Pengrajin', 1,0,'C');
        $pdf->Cell(3, 1, 'Nama Bahan', 1,0,'C');
        $pdf->Cell(3, 1, 'Tgl. Selesai', 1,0,'C');
        $pdf->Cell(4, 1, 'Tgl. Pelunasan', 1,0,'C');
        $pdf->Cell(3, 1, 'Berat', 1,0,'C');
        $pdf->Cell(3, 1, 'Total Harga', 1,1,'C');
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->model_laporan->tampildatapemesanan();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            
            $pdf->Cell(1, 1, $no, 1,0,'C');
            $pdf->Cell(4, 1, $r->nama_anggota, 1,0,'C');
            $pdf->Cell(3, 1, $r->nama_kategori, 1,0,'C');
            $pdf->Cell(4, 1, $r->nama_pengrajin, 1,0,'C');
            $pdf->Cell(3, 1, $r->nama_bahan, 1,0,'C');
            $pdf->Cell(3, 1, $r->tgl_selesai, 1,0,'C');
            $pdf->Cell(4, 1, $r->tgl_pelunasan, 1,0,'C');
            $pdf->Cell(3, 1, $r->berat, 1,0,'C');
            $pdf->Cell(3, 1,'Rp '.$r->totalharga, 1,1,'R');
            $no++;
            
        }
        // end
        
        $pdf->Output();
        }
        else
        {
            redirect('auth/login');
        }
        
    }
    function cetakpembelian()
    {
        if($_SESSION['level']==1)
        {
            $this->load->library('cfpdf');
        $pdf=new FPDF('P','cm','A4');
        $pdf->AddPage();

        $pdf->SetFont('Arial','B','C');
        $pdf->SetFontSize(16);
        $pdf->image(base_url().'img/logo.png',1,0.4,4);
        $pdf->text(8.5, 2,'Djono Silver',0,1,'C');
        $pdf->text(7, 2.7,'LAPORAN PEMBELIAN',0,1,'C');
        $pdf->SetFont('Arial','B','C');
        $pdf->SetFontSize(12);
        $pdf->setLineWidth(0.05);
        $pdf->Cell(15);
        $pdf->Cell(4, 2, date('d-M-y'), 1,1,'C');
        $pdf->SetFont('Arial','B','C');
        $pdf->setLineWidth(0.08);
        $pdf->Line(21,3.5,0,3.5);
        $pdf->setLineWidth(0.05);
        $pdf->Ln(2);
        $pdf->SetFontSize(12);
        $pdf->Cell(1.5);
        $pdf->Cell(1, 1, 'No', 1,0,'C');
        $pdf->Cell(5, 1, 'Kode Pembelian', 1,0,'C');
        $pdf->Cell(5, 1, 'Tgl. Masuk', 1,0,'C');
        $pdf->Cell(5, 1, 'Total Bayar', 1,1,'C');
        // tampilkan dari database
        $pdf->SetFont('Arial','','L');
        $data=  $this->model_laporan->tampildatapembelian();
        $no=1;
        $total=0;
        foreach ($data->result() as $r)
        {
            $pdf->Cell(1.5);
            $pdf->Cell(1, 1, $no, 1,0,'C');
            $pdf->Cell(5, 1, $r->id_pembelian, 1,0,'C');
            $pdf->Cell(5, 1, $r->tgl_masuk, 1,0,'C');
            $pdf->Cell(5, 1,'Rp '.$r->total_bayar, 1,1,'R');
            $no++;
            
        }
        // end
      
        $pdf->Output();
        }
        else
        {
            redirect('auth/login');
        }
        
    }
}

?>
