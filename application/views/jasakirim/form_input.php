                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            Tambah Data Jasa Kirim
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <?php echo form_open_multipart('jasakirim/post'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Nama Jasa Kirim</label>
                                    <input required id="jasakiriminput" type="text" name="jasakirim" class="form-control" placeholder="Jasa Kirim">
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm" >Simpan</button> | 
                                <?php echo anchor('jasakirim','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->