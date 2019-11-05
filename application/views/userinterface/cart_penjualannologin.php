<div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                            Chart Pembelian
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            
                                <div class="table-responsive" style="overflow-x: hidden;">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nama Produk</th>
                                            <th>Jumlah</th>
                                            <th>Harga</th>
                                            <th>Total</th>
                                            <th>aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; $totalsemua=0; $totalberatsemua=0; foreach ($this->cart->contents() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r['name'] ?></td>
                                                <td><?php echo $r['qty'] ?></td>
                                                <td>Rp <?php echo number_format($r['price'],2) ?></td>
                                                <td>Rp <?php echo number_format($r['subtotal'],2)?></td>
                                                <input hidden id="totalberat" value="<?php $totalberat = $r['qty']*$r['options']['berat']?>" >
                                                <td class="center">
                                                    <?php echo anchor('penjualan/hapusdetailnolog/'.$r['rowid'],'Delete'); ?>
                                                </td>
                                            </tr>
                                        <?php $no++; $totalsemua=$totalsemua+$r['subtotal']; $totalberatsemua=$totalberatsemua+$totalberat; 
                                    } ?>
                                        </tbody>
                                    </table>                                   
                                    <div class="panel panel-primary" style="width: 30%; margin-left: 100%; transform: translateX(-100%);">
                                    <div class="panel-heading">Total Pembayaran :</div>
                                    <div id="totaltransaksiview" class="panel-body"> Rp  <?php echo number_format($totalsemua,2)?></div>
                                    <input id="totaltransaksi" hidden name='total'value="<?php echo $totalsemua?>">
                                    <input id="totalberattransaksi" hidden value="<?php echo $totalberatsemua?>">
                                    </div>
                                    <div align="right"> <a class="btn btn-success" href="<?php echo base_url('login');?>">Cekout</a> <button onclick="batal()" class="btn btn-danger">Batal</button><div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<script>

 function batal()
 { 
        $.ajax({
        url  :"<?php echo base_url('penjualan/hapusdetailbatal');?>",
        type : 'POST',
         success : function(data)
        {
           alert("Berhasil dibatalkan");
           window.location="<?php echo base_url().'penjualan/chart'?>";
        }
     })
}
 </script>

 <?php
    include "modal_ongkir.php";

?>
                <!-- /. ROW  -->