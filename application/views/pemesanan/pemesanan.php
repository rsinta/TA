<div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                            <br>Input Pemesanan
                        </h2>
                    </div>
                </div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <?php echo form_open_multipart('penjualan/accpendingpesan');  ?>
                                <div class="form-group">
                                    <label>ID Pemesanan</label>
                                    <input class="form-control" name="id_pemesanan" value="<?php echo $pesanan->id_pemesanan?>">
                                </div>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select name="kategori" class="form-control">
                                        <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->id_kategori'";
                                            echo $pesanan->id_kategori==$k->id_kategori?'selected':'';
                                            echo">$k->nama_kategori</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Bahan</label>
                                    <select id="bahan" name="bahan" class="form-control" >
                                        <?php foreach ($bahan as $k) {
                                            echo "<option value='$k->id_bahan'";
                                            echo $pesanan->id_bahan==$k->id_bahan?'selected':'';
                                            echo">$k->nama_bahan</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pengrajin</label>
                                    <select id="pengrajin" name="id_pengrajin" class="form-control" style="margin-bottom: 15px;" onchange="hitungDP()">
                                                <?php foreach ($pengrajin->result() as $k) {
                                                        echo "<option value='$k->id_pengrajin'";
                                                        echo">$k->nama_pengrajin</option>";
                                                    } ?>
                                                </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input readonly id='jml' onkeypress='validate(event)' class="form-control" name="jml" value="<?php echo $pesanan->jumlah?>">
                                </div>
                                <div class="form-group">
                                    <label>Berat</label>
                                    <input readonly id='brt' onkeypress='validate(event)' class="form-control" name="brt" value="<?php echo $pesanan->berat?>">
                                </div>
                                <div class="form-group">
                                    <img src="<?php echo base_fotopemesanan().$pesanan->foto?>" width="100" height="150p">
                                </div>
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input readonly id='harga' onkeypress='validate(event)' class="form-control" name="harga">
                                </div>
                                <div class="form-group">
                                    <label>Dp Minimal</label>
                                    <input  readonly id='dp' readonly onkeypress='validate(event)' class="form-control" name="dp">
                                </div>
                                <div class="form-group">
                                    <label>Kekurangan</label>
                                    <input  readonly id='kurang' onkeypress='validate(event)' class="form-control" name="kurang">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input type="date" onkeypress='validate(event)' class="form-control" name="tgl_selesai">
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pelunasan</label>
                                    <input type="date" onkeypress='validate(event)' class="form-control" name="tgl_pelunasan">
                                </div>
                                
                                <div class="form-group">
                                    <label>Deskripsi</label>
                                    <input readonly class="form-control" name="deskripsi" value="<?php echo $pesanan->deskripsi?>">
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
<script>

function hitungDP()
{
    $.ajax({
        url:"<?php echo base_url('transaksi/hitungharga');?>",
        type : "POST",
        data:{
           id_bahan : $('#bahan').val(),
           id_pengrajin : $("#pengrajin").val(),
           jml : $("#jml").val(),
           berat : $("#brt").val()
        },
        success : function(data)
        {
            var hasil= $.parseJSON(data);
            $('#harga').val(hasil['total']);
            $('#dp').val(hasil['dp']);
            $('#kurang').val(hasil['kekurangan']);
        }
    });

}
 
</script>