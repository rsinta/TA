                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                            Tambah Data Barang
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <?php echo form_open_multipart('kategori/post'); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>Nama Kategori</label>
                                    <input required id="kategoriinput" type="text" name="kategori" class="form-control" placeholder="kategori">
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm" >Simpan</button> | 
                                <?php echo anchor('kategori','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->