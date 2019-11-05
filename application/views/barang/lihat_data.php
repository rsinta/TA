                <div class="row">
                    <div class="col-md-12">
                        <h3 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                           Data Barang
                        </h3>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="row">                  
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('barang/post','Tambah Data',array('class'=>'btn btn-info btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example" >
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Jenis Barang</th>
                                                <th>Bahan</th>
                                                <th>Harga Barang</th>
                                                <th>Berat Satuan</th>
                                                <th>Foto</th>
                                                <th>Stok</th>
                                                <th>Keterangan</th>
                                                <th>Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = $this->uri->segment('3');
                                        foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $r->nama_barang ?></td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td><?php echo $r->nama_bahan ?></td>
                                                <td>Rp. <?php echo number_format($r->harga_barang,2) ?></td>
                                                <td><?php echo $r->berat_satuan ?></td>
                                                <td><img src="<?php echo base_foto().$r->foto; ?>" width="60" height="80p"></td>
                                                <td style="text-align:center"><?php echo $r->stok ?></td>
                                                <td style="text-align:center"><?php echo $r->keterangan ?></td>
                                                <td class="center">
                                                    <?php echo anchor('barang/edit/'.$r->id_barang,'Edit','class="btn btn-primary"'); ?> 
                                                    <?php echo anchor('barang/delete/'.$r->id_barang,'Delete','class="btn btn-danger"'); ?>
                                                </td>
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


