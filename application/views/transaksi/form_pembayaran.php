<div class="row">
                    <div class="col-md-12">
                        <h2 class="page-header" style="margin-top: 0px;margin-bottom: 40px;">
                            Pembayaran (No Rekening 0373952581 A/N Sinta Rostika)
                        </h2>
                    </div>
</div> 
                <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <?php echo form_open_multipart('transaksi/updatebuktipembayaran'); ?>
                                <div class="form-group">
                                    <label>Transaksi Pending</label>
                                    <select id="transaksipending" name="transaksipending" class="form-control" onfocus="pilihtransaksi()">
                                        <?php foreach ($data as $k) {
                                            echo "<option value='$k->id_penjualan'>$k->id_penjualan</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Pembayaran</label>
                                    <input  id="jmlint" class="form-control" name="bayar" placeholder="jumlah bayar" required readonly>
                                    <input hidden id="jmlbayar" class="form-control" name="bayar" placeholder="jumlah bayar" required readonly>
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <input required id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="berkas" placeholder="upload">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Uang</label>
                                    <input  id="jmlinput" class="form-control" name="inputuang" placeholder="jumlah uang" onchange="total1()" required >
                                </div>
                                <div class="form-group">
                                    <label>Kekurangan</label>
                                    <input  id="total" class="form-control" name="total" placeholder="total bayar" required readonly>
                                    <input hidden id="jmltotal" class="form-control" name="total" placeholder="total bayar" required readonly>
                                </div>
                                <button type="submit" id="btnsimpanbarang" name="submit" class="btn btn-primary btn-sm" >Simpan</button> | 
                                <?php echo anchor('penjualan','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                           </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
            </div>
                <!-- /. ROW  -->

<script>
function pilihtransaksi() {
    var id_penjualan=$('#transaksipending').val();
    $.ajax({
        url  :"<?php echo base_url('transaksi/getjumlahpembayaran');?>",
        type : 'POST',
        data :{id_penjualan : id_penjualan},
        success : function(dd)
        {
            var data= $.parseJSON(dd);
            console.log(dd);
           $('#jmlbayar').val(data['total_harga']);
           $('#jmlint').val(accounting.formatMoney(data['total_harga'], "Rp ", 2, ".", ","));
        }
    })
}
</script>


<script>
function total1() {
    var jmlinput=parseInt($('#jmlinput').val());
    var jmlbayar= parseInt($('#jmlbayar').val());
    var kekurangan = jmlbayar-jmlinput;
    $('#total').val(kekurangan);
    if(kekurangan > 0)
    { alert("jumlah yang di inputkan kurang"); }
}
</script>
