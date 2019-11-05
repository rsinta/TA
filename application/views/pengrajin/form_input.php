<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header">
                           Tambah Data Pengrajin
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php echo form_open('pengrajin/post'); ?>
                                <div class="form-group">
                                    <label>Nama Pengrajin</label>
                                    <input  class="form-control" name="nama" placeholder="Nama Pengrajin" required>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input class="form-control" name="alamat" placeholder="Alamat" required>
                                </div>
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input class="form-control" name="notelp" placeholder="No Telp" required>
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input onkeypress='validate(event)' class="form-control" name="hargajasa" placeholder="Harga Jasa" required>
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
