                <div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                           Tambah Data Barang
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php echo form_open_multipart('barang/post'); ?>
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input id="inputnamabarang" class="form-control" name="nama_barang" placeholder="Nama barang" required>
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select id="inputkategori" name="kategori" class="form-control">
                                        <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->id_kategori'>$k->nama_kategori</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bahan</label>
                                    <select id="inputbahan" name="bahan" class="form-control">
                                        <?php foreach ($bahan as $k) {
                                            echo "<option value='$k->id_bahan'>$k->nama_bahan</option>";
                                        } ?>
                                    </select>
                                </div>
                                    <input type="hidden" class="form-control" name="stok" value="0" required>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input onkeypress='validate(event)' id="inputharga" class="form-control" name="harga" placeholder="Harga" required>
                                </div>
                                <div class="form-group">
                                    <label>Berat Satuan</label>
                                    <input onkeypress='validate(event)' id="inputberat" class="form-control" name="berat" placeholder="Berat" required>
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <input required id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="berkas" placeholder="upload">
                                </div>
                                <button type="submit" id="btnsimpanbarang" name="submit" class="btn btn-primary btn-sm" >Simpan</button> | 
                                <?php echo anchor('barang','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                           </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->

<script>
function validateharga() {
    var harga=parseInt($('#inputharga').val());
    var hargajual=parseInt($('#inputhargajual').val());
    if(hargajual<=harga)
    {
        alert('Harga Jual harus lebih dari harga beli')
        $('#btnsimpanbarang').attr("disabled",'disabled');
    }
    else
    {
        $('#btnsimpanbarang').removeAttr('disabled');
    }
}
</script>
