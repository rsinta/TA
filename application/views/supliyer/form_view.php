<div class="row">
                    <div class="col-md-12">
                    <img style="display: block;margin-left: auto;margin-right: auto; width: 200px;" src="<?php echo base_url()?>assets/img/lintang.png">
                    <h3 align="center" class="page-header">
                           TOKO LINTANG <br>Data Supliyer
                        </h3>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">                  
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('supliyer/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Supliyer</th>
                                                <th>Alamat</th>
                                                <th>No Telp</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama ?></td>
                                                <td><?php echo $r->alamat?></td>
                                                <td><?php echo $r->kontak?></td>
                                                <td class="center">
                                                    <?php echo anchor('supliyer/edit/'.$r->id_supliyer,'Edit','class="btn btn-primary"'); ?> 
                                                    <?php echo anchor('supliyer/delete/'.$r->id_supliyer,'Delete','class="btn btn-danger"'); ?>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->


