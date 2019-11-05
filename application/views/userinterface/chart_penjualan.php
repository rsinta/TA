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
                                        <?php echo form_open('penjualan/updatepenjualan'); ?>
                                        <tbody>
                                        <?php $no=1; $totalsemua=0; $totalberatsemua=0; foreach ($databelanja->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_barang ?></td>
                                                <td><?php echo $r->jumlah ?></td>
                                                <td>Rp <?php echo number_format($r->harga_barang,2) ?></td>
                                                <td>Rp <?php $total= $r->jumlah*$r->harga_barang; echo number_format($total,2)?></td>
                                                <input hidden id="totalberat" value="<?php $totalberat =  $r->jumlah*$r->berat_satuan?>" >
                                                <td class="center">
                                                    <?php echo anchor('penjualan/hapusdetail/'.$r->id_keranjang,'Delete'); ?>
                                                </td>
                                            </tr>
                                        <?php $no++; $totalsemua=$totalsemua+$total; $totalberatsemua=$totalberatsemua+$totalberat; 
                                    } ?>
                                        </tbody>
                                    </table>
                                    <button  id="btnkurir" type="button"  class="btn btn-warning"  data-toggle="modal" data-target="#modalpesan1" style="margin-bottom: 5px;transform: translateX(-100%);margin-left: 100%;">
                                            Pilih Jasa Pengiriman
                                    </button>
                                    <div class="panel panel-primary" style="width: 30%; margin-left: 100%; transform: translateX(-100%);">
                                        <div id="jasakirim" class="panel-heading">Jasa Pengiriman : </div>
                                        <div id="ongkirnya" class="panel-body">Rp </div>
                                        <input hidden id="ongkirjml" name="ongkirjml">
                                        <input hidden id="idjasakirim" name='idjasakirim'>
                                    </div>
                               
                                    <div class="panel panel-primary" style="width: 30%; margin-left: 100%; transform: translateX(-100%);">
                                    <div class="panel-heading">Total Pembayaran :</div>
                                    <div id="totaltransaksiview" class="panel-body"> Rp  <?php echo number_format($totalsemua,2)?></div>
                                    <input id="totaltransaksi" hidden name='total'value="<?php echo $totalsemua?>">
                                    <input id="totalberattransaksi" hidden value="<?php echo $totalberatsemua?>">
                                    </div>
                                    <div align="right"> <button type="submit" name="update" class="btn btn-success">Cekout</button> </form>   <button onclick="batal()" class="btn btn-danger">Batal</button><div>
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