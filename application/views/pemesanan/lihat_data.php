<div class="row">
                    <div class="col-md-12">
                    <h3 align="center" class="page-header">
                         Data Pesan Pengrajin
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
                                      
                                                <th>No. Pemesanan</th>
                                                <th>Nama Pengrajin</th>
                                                <th>Banyak</th>
                                                <th>Ongkos Bikin</th>
                                                <th>Total Pembuatan</th>
                                                <th>Jumlah Bayar</th>
                                                <th>Kekurangan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record as $r) { ?>
                                            <tr class="gradeU">
                                             
                                                <td><?php echo $r->id_pemesanan?></td>
                                                <td><?php echo $r->nama_pengrajin?></td>
                                                <td><?php echo $r->jumlah?></td>
                                                <td><?php echo $r->harga_jasa?></td>
                                                <td><?php echo $r->totalharga?></td>
                                                <td><?php echo $r->dp?></td>
                                                <td><?php echo $r->kekurangan?></td>
                                                <td class="center">
                                                   <?php echo anchor('pemesanan/delete/'.$r->id_pemesanan,'Delete','class="btn btn-danger"'); ?>
                                                </td>
                                            </tr>
                                        <?php  } ?>
                                        </tbody>
                                    </table>
                                   
                                </div>
                               
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
