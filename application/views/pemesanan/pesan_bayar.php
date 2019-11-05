<div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                            <br>Konfirmasi Pembayaran
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="row">                  
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th>ID Pemesanan</th>
                                                <th>Harga Total</th>
                                                <th>Kekurangan</th>
                                                <th>Bukti Pembayaran</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = $this->uri->segment('3');
                                        foreach ($record as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $r->id_pemesanan ?></td>
                                                <td><?php echo $r->totalharga ?></td>
                                                <td><?php echo $r->kekurangan ?></td>
                                                <td><img src="<?php echo base_fotobukti().$r->bukti_pembayaran; ?>" width="60" height="80p"></td>
                                                <td class="center">
                                                    <?php echo anchor('pemesanan/updatestatus/'.$r->id_pemesanan,'ACC','class="btn btn-primary"'); ?> 
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                   
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                
                <!-- /. ROW  -->
<script>

function hitungDP()
{
    $.ajax({
        url:"<?php echo base_url('transaksi/hitungharga');?>",
        type : "POST",
        data:{
           id_bahan : $('#bahan').val(),
           id_pengrajin : $("#pengrajin").val(),
           jml : $("#jml").val(),
           berat : $("#brt").val()
        },
        success : function(data)
        {
            
        }
    });

}
 
</script>