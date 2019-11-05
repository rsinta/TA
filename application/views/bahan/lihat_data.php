<div class="row">
                    <div class="col-md-12">
                    <h3 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                           Data Bahan
                        </h3>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                 <?php echo anchor('bahan/post','Tambah Data',array('class'=>'btn btn-danger btn-sm')) ?>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nama Bahan</th>
                                                <th>Harga Bahan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                             
                                                <td><?php echo $r->nama_bahan?></td>
                                                <td>Rp. <?php echo number_format($r->harga_bahan,2)?></td>
                                                <td class="center">
                                                   <?php echo anchor('bahan/edit/'.$r->id_bahan,'Edit','class="btn btn-primary"'); ?>
                                                   <?php echo anchor('bahan/delete/'.$r->id_bahan,'Delete','class="btn btn-danger"'); ?>
                                                </td>
                                            </tr>
                                        <?php  } ?>
                                        </tbody>
                                    </table>
                                   
                                </div>
                                <?php
                                        echo $this->pagination->create_links();
                                    ?>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
