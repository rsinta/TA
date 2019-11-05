                <div class="row">
                    <div class="col-md-12">
                    <img style="display: block;margin-left: auto;margin-right: auto; width: 200px;" src="<?php echo base_url()?>assets/img/lintang.png">
                    <h3 align="center" class="page-header">
                           Djono Silver<br>Data Operator
                        </h3>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('operator/post','Tambah Data Karyawan',array('class'=>'btn btn-danger btn-sm')) ?>
                                 <?php echo anchor('auth/daftar','Daftar User System',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Bagian</th>
                                                <th>Nomer Telp</th>
                                                <th style="text-align:center">Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama ?></td>
                                                <td><?php echo $r->alamat ?></td>
                                                <td><?php echo $r->bagian ?></td>
                                                <td><?php echo $r->nomor_telp ?></td>
                                                <td style="text-align:center"><?php echo $r->level ?></td>
                                                <td class="center">
                                                    <?php echo anchor('operator/edit/'.$r->id_karyawan,'Edit','class="btn btn-primary"'); ?>
                                                    <?php echo anchor('operator/delete/'.$r->id_karyawan,'Delete','class="btn btn-danger"'); ?>
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->