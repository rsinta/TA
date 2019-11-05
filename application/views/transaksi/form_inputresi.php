<div class="row">
                    <div class="col-md-12">
                        <h3 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                           Data Transaksi
                        </h3>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">                  
                    <div class="col-md-12">
                        <div class="panel panel-default">
                           
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nomer Transaksi</th>
                                                <th>Tanggal Transaksi</th>
                                                <th>Total Transaksi</th>
                                                <th>Status</th>
                                                <th>Input Resi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = $this->uri->segment('3');
                                        foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $r->id_penjualan ?></td>
                                                <td><?php echo $r->tgl ?></td>
                                                <td>Rp. <?php echo number_format($r->total_harga,2) ?></td>   
                                                <td><?php echo $r->status?></td>  
                                                <td><button class="btn btn-success" onclick="getpreviewtransaksi('<?php echo $r->id_penjualan ?>')">Input Resi</button></td>                                             
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php
                                        echo $this->pagination->create_links();
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->

               
                <!-- /. ROW  -->

               
                <!-- /. ROW  -->


<script>
 function getpreviewtransaksi(id_penjualan)
 {
    bootbox.prompt("Input Resi untuk Id Penjualan : "+id_penjualan+"", function(result) {                
    if (result === null) {                                             
                                   
    } else {
        $.ajax({
        url  :"<?php echo base_url('transaksi/updateresi');?>",
        type : 'POST',
        data : {
            id : id_penjualan,
            resi : result
        },
         success : function(data)
            {
            alert('Succes');
            window.location="<?php echo base_url().'transaksi/offline'?>";
            }
        });
        }
    })
 }
</script>

