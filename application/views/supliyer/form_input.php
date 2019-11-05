<div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header">
                            TOKO LINTANG<br>Tambah Data Supliyer
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('supliyer/post'); ?>
                                <div class="form-group">
                                    <label>Nama Supliyer</label>
                                    <input id="inputnamasupliyer" type="text" class="form-control" name="nama" placeholder="nama lengkap">
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input  id="inputalamatsupliyer" type="text" class="form-control" name="alamat" placeholder="alamat">
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input onkeypress='validate(event)' id="inputnotelpsupliyer" type="text" class="form-control" name="notelp" placeholder="no telp">
                                </div>
                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('supliyer','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
