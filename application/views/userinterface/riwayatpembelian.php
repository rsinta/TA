<div class="row">
                    <div class="col-md-12">
                        <h3 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                           Riwayat Pembelian
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
                                                <th>Preview Detail</th>
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
                                                <td><button class="btn btn-success" onclick="getpreviewtransaksionline('<?php echo $r->id_penjualan ?>')">Preview</button></td>                                             
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

                <div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header" style="margin: 0px 0 0px;">
                            Detail Transaksi
                        </h2>
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
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody id="detailTrans">
                                      
                                        </tbody>
                                    </table>
                                  
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->


<script >
 function getpreviewtransaksionline(id_trans)
 {
     $.ajax({
        url  :"<?php echo base_url('transaksi/getdetailtransaksi');?>",
        type : 'POST',
        data : {
            id_penjualan : id_trans
        },
         success : function(datatrans)
        {
               var result = $.parseJSON(datatrans);
               $("#detailTrans").empty();
               for(var i=0; i< result.length; i++)
               {
                   var no = i+1;
                   var total = result[i]['harga_barang']*result[i]['jumlah'];
                   $("#detailTrans").append(
                        "<tr >"+
                            "<td>"+no+"</td>"+
                            "<td>"+result[i]['nama_barang']+"</td>"+
                            "<td>"+accounting.formatMoney(result[i]['harga_barang'], "Rp ", 2, ".", ",")+"</td>"+
                            "<td>"+result[i]['jumlah']+"</td>"+
                            "<td>"+accounting.formatMoney(total, "Rp ", 2, ".", ",")+"</td>"+
                        "</tr>"
                );
               }
        }
     })
 }
</script>

