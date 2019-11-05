                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                            POS (Point of Sale) <br>Tambah Data Barang
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open('barang/post'); ?>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input class="form-control" name="nama_barang" placeholder="Nama barang">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->jenis_barang'>$k->jenis_barang</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Merk</label>
                                    <input class="form-control" name="merk" placeholder="Merk">
                                </div>
                                    <input type="hidden" class="form-control" name="stok" value="0">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input class="form-control" name="harga" placeholder="Harga">
                                </div>
                                <div class="form-group">
                                    <label>Harga Jual</label>
                                    <input class="form-control" name="hargajual" placeholder="Harga jual">
                                </div>

                                <button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button> | 
                                <?php echo anchor('barang','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->