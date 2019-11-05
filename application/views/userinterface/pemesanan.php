               <!-- /. ROW  -->

                <div class="row">
                    <div class="col-md-6" style="border-radius: 12px;  ">
                       <h2 align="center" class="page-header" style="margin-top: 0px;">
                           Pemesanan Barang
                        </h2>
                        <div class="panel panel-default" style=" background:#868e96; color:white;border-radius: 12px; ">
                            <div class="panel-body">
                            <?php echo form_open_multipart('penjualan/postpemesanan'); ?>
                                <div class="form-group">
                                    <label>Kategori</label>
                                    <select id="inputkategori" name="kategori" class="form-control">
                                        <?php foreach ($kategori as $k) {
                                            echo "<option value='$k->id_kategori'>$k->nama_kategori</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Keterangan</label>
                                    <textarea required name="deskripsi" style="height: 100px; width:100%; border-radius:5px;"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Upload Foto</label>
                                    <input required id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="berkas" placeholder="upload">
                                </div>
                                <div class="form-group">
                                    <label>Berat</label>
                                    <input  id="brtpesan" type="number" class="form-control" name="brtpesan" placeholder="Keterangan" value="1" min="1">
                                </div>
                                <div class="form-group">
                                    <label>Jumlah Pesanan</label>
                                    <input  id="jmlpesan" type="number" class="form-control" name="jmlpesan" placeholder="Keterangan" value="1" min="1" max="10">
                                </div>
                                <button type="submit" id="btnsimpanpemesanan" name="submit" class="btn btn-primary btn-sm" >Simpan</button> | 
                                <?php echo anchor('penjualan','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                    <div class="col-md-6" style="border-radius: 12px;">
                    <h2 align="center" class="page-header" style="margin-top: 0px;">
                           Cek Pemesanan
                        </h2>
                        <div class="panel panel-default" style=" background:#868e96; color:white; border-radius: 12px;">
                            <div class="panel-body">
                                <div class="form-group">
                                    <label>No Pesanan</label>
                                    <select id="pilidpesanan" name="pilpemesanan" class="form-control" onchange="cekpesanan()">
                                    <option value=0>Pilih ID</option>
                                        <?php foreach ($pesanan as $k) {
                                            echo "<option value='$k->id_pemesanan'>$k->id_pemesanan</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pesan</label>
                                    <input  id="tglpesan" type="text" class="form-control" name="tglpesan" placeholder="Tanggal Pesan" >
                                </div>
                                <div hidden  id="tglselesaibox" class="form-group">
                                    <label>Tanggal Selesai</label>
                                    <input  id="tglselesai" type="text" class="form-control" name="tglselesai" placeholder="Tanggal Selesai">
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <input  id="status" type="text" class="form-control" name="status" placeholder="Status" >
                                </div>
                                <div hidden id="totalbox" class="form-group">
                                    <label>Total yang Harus Dibayar</label>
                                    <input  id="total" type="text" class="form-control" name="total" placeholder="Total" >
                                </div>
                                <div hidden  id="dpminimalbox" class="form-group">
                                    <label>DP minimal</label>
                                    <input  id="dpminimal" type="text" class="form-control" name="dpminimal" placeholder="DP Minimal">
                                </div>
                                <div hidden id="kekuranganbox" class="form-group">
                                    <label>Kekurangan</label>
                                    <input  id="kekurangan" type="text" class="form-control" name="kekurangan" placeholder="Kekurangan" >
                                </div>
                                <div hidden id="tglpelunasanbox" class="form-group">
                                    <label>Tanggal Pelunasan Paling Lambat</label>
                                    <input  id="tglpelunasan" type="text" class="form-control" name="tglpelunasan" placeholder="Tanggal Pelunasan" >
                                </div>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                    <div class="col-md-6" style="border-radius: 12px;  ">
                       <h2 align="center" class="page-header" style="margin-top: 0px;">
                           Pembayaran Transaksi
                        </h2>
                        <div class="panel panel-default" style=" background:#868e96; color:white;border-radius: 12px; ">
                            <div class="panel-body">
                            <?php echo form_open_multipart('transaksi/updatebuktipembayaranpesanan'); ?>
                            <div class="form-group">
                                    <label>No Pesanan</label>
                                    <select id="pilidpesanan1" name="id_pemesanan" class="form-control" onchange="cekpemesanan()">
                                    <option value=0>Pilih ID</option>
                                        <?php foreach ($pesananwaiting as $k) {
                                            echo "<option value='$k->id_pemesanan'>$k->id_pemesanan</option>";
                                        } ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Upload Bukti Pembayaran</label>
                                    <input required id="inputfoto" accept="image/x-png,image/gif,image/jpeg" type="file" class="form-control" name="berkasbayar" placeholder="upload">
                                </div>
                                <div class="form-group">
                                    <label>Total Bayar (DP)</label>
                                    <input  id="totalbayarDP" type="text" class="form-control" name="byrdp" placeholder="0">
                                </div>
                                <button type="submit" id="btnsimpanpemesanan" name="submit" class="btn btn-primary btn-sm" >Simpan</button> | 
                                <?php echo anchor('penjualan','Kembali',array('class'=>'btn btn-danger btn-sm'))?>
                                </form>
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
<script>
$("#jmlpesan").keydown(function(e) {
    //prevent both backspace and delete keys
    if ((e.keyCode === 8 || e.keyCode === 46)) {
        return false;
    };
});

function cekpesanan()
{
 
    var id = $('#pilidpesanan').val();
   if(id!=0)
   {
    $.ajax({
        url  :"<?php echo base_url('penjualan/tampil_pemesanan');?>",
        type : 'POST',
        data :{
            id : id
        },
         success : function(data)
         {
            var result = $.parseJSON(data);
            var totallll = parseInt(result['totalharga']);
            if(totallll==0)
            {
            $('#tglselesaibox').attr('hidden','true');
            $('#dpminimalbox').attr('hidden','true');
            $('#tglpesan').val(result['tgl']);
            $('#status').val(result['status']);
            $('#kekuranganbox').attr('hidden','true');
            $('#tglpelunasanbox').attr('hidden','true');
            $('#totalbox').attr('hidden','true');
            }
            else
            {
            $('#tglselesaibox').removeAttr('hidden');
            $('#dpminimalbox').removeAttr('hidden');
            $('#kekuranganbox').removeAttr('hidden');
            $('#tglpelunasanbox').removeAttr('hidden');
            $('#totalbox').removeAttr('hidden');
            $('#tglselesai').val(result['tgl_selesai']);
            $('#dpminimal').val(result['dp']);
            $('#tglpesan').val(result['tgl']);
            $('#status').val(result['status']);
            $('#kekurangan').val(result['kekurangan']);
            $('#tglpelunasan').val(result['tgl_pelunasan']);
            $('#total').val(result['totalharga']);
            }
         
         }
            
    })
   }
   else
   {
    $('#tglselesaibox').attr('hidden','true');
    $('#dpminimalbox').attr('hidden','true');
    $('#kekuranganbox').attr('hidden','true');
    $('#tglpelunasanbox').attr('hidden','true');
    $('#totalbox').attr('hidden','true');
    $('#kekuranganbox').attr('hidden','true');
    $('#tglpesan').val('Tanggal Pesan');
    $('#status').val('Status');
   }
   
}

function cekpemesanan()
{
 
    var id = $('#pilidpesanan1').val();
    if(id!=0)
   {
    $.ajax({
        url  :"<?php echo base_url('penjualan/tampil_pemesanan');?>",
        type : 'POST',
        data :{
            id : id
        },
         success : function(data)
         {
            
            var result = $.parseJSON(data);
            $('#totalbayarDP').val(result['dp']);
         
         }
            
    })
   }
   else
   {
    $('#totalbayarDP').val(0);
   }
   

   
}



</script>
