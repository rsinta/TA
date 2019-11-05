                <div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                            <br>Edit Data Barang
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open_multipart('barang/edit'); ?>
                                <input type="hidden" name="id" value="<?php echo $record->id_barang?>">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input class="form-control" name="nama_barang" value="<?php echo $record->nama_barang?>">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->id_kategori'";
                                            echo $record->nama_kategori==$k->nama_kategori?'selected':'';
                                            echo">$k->nama_kategori</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bahan</label>
                                    <select name="bahan" class="form-control">
                                        <?php foreach ($bahan as $k) {
                                            echo "<option value='$k->id_bahan'";
                                            echo $record->nama_bahan==$k->id_bahan?'selected':'';
                                            echo">$k->nama_bahan</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo base_foto().$record->foto?>" width="100" height="150p">
                                    <input id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="berkas" placeholder="upload">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input onkeypress='validate(event)' class="form-control" name="harga" value="<?php echo $record->harga_barang?>">
                                </div>
                                 <div class="form-group">
                                    <label>Keterangan</label>
                                    <select name="keterangan" class="form-control">
                                       <option value="Ready">Ready</option>
                                       <option value="Kosong">Kosong</option>
                                    </select>
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Update</button> | 
                                <?php echo anchor('barang','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->