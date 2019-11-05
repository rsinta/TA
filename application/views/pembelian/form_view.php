<div class="row">
                    <div class="col-md-12">
                    <h3 align="center" class="page-header" style="margin-top: 0px; margin-bottom: 40px;">
                          Data Pembelian
                        </h3>
                    </div>
                </div> 
                <!-- /. ROW  -->

              
              <div class="row">                  
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Nama Barang</th>
                                                <th>Jenis Barang</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Jumlah Beli</th>
                                                <th>Pengrajin</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        //$no = $this->uri->segment('3');
                                        foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><input name="id_barang" value="<?php echo $r->id_barang ?>" hidden readonly><?php echo $r->nama_barang ?> </td>
                                                <td><?php echo $r->nama_kategori ?></td>
                                                <td>Rp. <input name="harga" value="<?php echo number_format($r->harga_barang,2)?>" hidden readonly><?php echo number_format($r->harga_barang,2)?></td>
                                                <td id="<?php echo $r->id_barang?>sss"><?php echo $r->stok ?></td>
                                                <input id="<?php echo $r->id_barang ?>s" name="stok" value="<?php echo $r->stok ?>" hidden readonly>
                                                <td><input id="<?php echo $r->id_barang ?>jumlah" type="number" name="jumlah" value='1' min='1' ></td>
                                                <td>
                                                <select id="<?php echo $r->id_barang ?>pengrajin" name="id_pengrajin" class="form-control" style="margin-bottom: 15px;">
                                                <?php foreach ($record3->result() as $k) {
                                                        echo "<option value='$k->id_pengrajin'";
                                                        echo">$k->nama_pengrajin</option>";
                                                    } ?>
                                                </select>
                                               
                                                <td>
                                                 <button type="submit" name="submit" onclick="belibarangdarisupliyer('<?php echo $r->id_barang ?>')" > Beli </button></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    <?php
                                    ?>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <h3 align="center" class="page-header">
                           Daftar Pembelian Barang
                    </div>
                </div> 
                
              <div class="row">                  
                    <div class="col-md-12">
                        <div class="panel panel-default">
                        
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>ID Detail</th>
                                                <th>ID Barang</th>
                                                <th>Harga</th>
                                                <th>Jumlah Beli</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="chartpembelian">
                                       
                                        
                                        </tbody>
                                    </table>
                                    <div class="panel panel-primary" style="width: 30%; margin-left: 100%; transform: translateX(-100%);">
                                    <div class="panel-heading">Total Pembayaran :</div>
                                    <div class="panel-body" id="totpembelian" ></div>
                                    <input id="totalsemuanyapembelian" hidden name='total'>
                                    </div>
                                </div>
                                <div align="right"><button style="margin-right:10px;" onclick="batal()" name="update" class="btn btn-danger">Batal</button><button onclick="cekout()" name="update" class="btn btn-success">Cekout</button><div>
                                </form>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>

<script >
 function belibarangdarisupliyer(id)
 { 
     var jumlah= parseInt($('#'+id+'jumlah').val());
     var id_pengrajin =  $('#'+id+'pengrajin').val();
     console.log(jumlah);
     console.log(id);
      $.ajax({
        url  :"<?php echo base_url('pembelian/post_pembelian');?>",
        type : 'POST',
        data : {
            jumlah : jumlah,
            id_barang : id,
            id_pengrajin : id_pengrajin
        },
         success : function(data)
        {
            console.log(data);
            getpreviewpembelian();
            getstokpembelian();
        }
     })
     
    
 }



  function getstokpembelian()
 {
    $.ajax({
        url  :"<?php echo base_url('pembelian/tampilpembelianbarang');?>",
        type : 'POST',
         success : function(data)
         {
            var result = $.parseJSON(data);         
            for (var i=0; i< result['barang'].length ; i++)
            {
                $("#"+result['barang'][i]['id_barang']+"sss").html("<div>"+result['barang'][i]['stok']+"</div>");
                document.getElementById(result['barang'][i]['id_barang']+"s").value = result['barang'][i]['stok'];
            }
            
         }
    })
}

function deletebarang(id)
 {
    $.ajax({
        url  :"<?php echo base_url('pembelian/hapusdetailpembelian');?>",
        type : 'POST',
        data : {
            id_detail_pembelian:id
        },
         success : function(data)
         {
            getpreviewpembelian();  
         }
    })
}


 function cekout()
 {
    var total= parseInt($('#totalsemuanyapembelian').val());
    if(total<=0 && total=='NaN'){
        alert("Tidak ada barang yg akan dibeli")
    }
    else
    {
        $.ajax({
        url  :"<?php echo base_url('pembelian/updatepembelian');?>",
        type : 'POST',
        data : {
            total : total
        },
         success : function(data)
        {
           alert("Pembelian Berhasil");
           window.location="<?php echo base_url().'pembelian'?>";
        }
     })
    }
    
 }

  function batal()
 {
        $.ajax({
        url  :"<?php echo base_url('pembelian/hapusdetailpembelianbatal');?>",
        type : 'POST',
         success : function(data)
        {
           alert("Berhasil dibatalkan");
           getpreviewpembelian();
        }
     })
}

</script>