<div class="row">
                    <div class="col-md-12">
                    
                        <h2 align="center" class="page-header">
                            Djono Silver <br>
                            Laporan Pemesanan
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('cetak/cetakpembelian', array('class'=>'form-inline')); ?>
                                <table>    
                                    <tr class="form-group" >
                                        <label for="exampleInputName2" style="margin-right: 10px;">Tanggal</label>
                                        <input type="date" name="tanggal1" class="form-control" placeholder="Tanggal Mulai" style="width:25%;">
                                    </tr>
                                    <tr class="form-group" >
                                        <label for="exampleInputEmail2" style="margin-right: 10px; margin-left : 10px;"> - </label>
                                        <input type="date" name="tanggal2" class="form-control" placeholder="Tanggal Selesai" style="width:25%;">
                                    </tr>
                                    <tr><button style="margin-left: 10px;" class="btn btn-primary btn-sm" type="submit" name="submit">Tampilkan</button>
                                    <button style="margin-left: 5px;" class="btn btn-primary btn-sm" name="cetak">Cetak</button>
                                    <a style="margin-left: 5px; color:white" href="<?php echo base_url().'cetak/cetakpembelian'?>" target="_blank" class="btn btn-primary btn-sm" name="cetak">Cetak Semua</a>
                                </tr>
                                </table>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                    </div>

        <div class="row">                  
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Kode Pemesanan</th>
                                                <th>Tgl Masuk</th>
                                                <th>Total Bayar</th>
                                                
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $no = $this->uri->segment('3');
                                        foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $r->id_pembelian ?></td>
                                                <td><?php echo $r->tgl_masuk ?></td>
                                                <td><?php echo $r->total_bayar ?></td>
                                               
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                   
                                </div>
                                
                            </div>
                <!-- /. ROW  -->
               </div>
                       <!-- /. PANEL  -->
    </div>
    </div>
                