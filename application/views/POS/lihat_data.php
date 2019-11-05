                <div class="row" >
                    <div class="col-md-12"  >
                    <img style="display: block;margin-left: auto;margin-right: auto; width: 200px;" src="<?php echo base_url()?>assets/img/lintang.png">
                        <h3 align="center" class="page-header">
                           TOKO LINTANG <br>Penjualan Offline
                        </h3>
                    </div>
                </div> 
                <!-- /. ROW  -->
                <div class="row">                  
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-body">
                            <div class="panel-body" >
                            <input onchange='caribarangnama()' style="margin-left: -15px;" id='caribarang' name='cari' type='text'> 
                            <button class="btn" onclick='caribarangnama()'>Cari</button>
                            </div>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Jenis Barang</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Jumlah</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id='tabelbarang'>
                                        <?php $no=1; foreach ($record->result() as $r) { ?>
                                            <tr class="gradeU">
                                                <td><?php echo $no ?></td>
                                                <td><?php echo $r->nama_barang ?></td>
                                                <td><?php echo $r->jenis_barang ?></td>
                                                <td>Rp. <?php echo number_format($r->harga_jual,2) ?></td>
                                                <td id="<?php echo $r->id_barang?>S"><?php echo $r->stok ?></td>
                                                <input hidden id="<?php echo $r->id_barang?>" value="<?php echo $r->stok ?>"/>
                                                <td><input name="jml" id="<?php echo $r->id_barang?>J" style="max-width: 35px;text-align: center;" value="1" type="number"  min="1" max="<?php echo $r->stok?>" /></td>
                                                <td class="center">
                                                <button id="btnbeli" class="btn btn-success"  name="transaksi" onclick="belibarang('<?php echo $r->id_barang?>')">BELI</button> 
                                                </td>
                                            </tr>
                                        <?php $no++; } ?>
                                        </tbody>
                                    </table>
                                </div>
                                
                            </div>
                        </div>
                        <!-- /. PANEL  -->
                    </div>
                </div>
                <!-- /. ROW  -->
                <div class="row">
                    <div class="col-md-12">
                        <h2 align="center" class="page-header">
                            Chart <small>Pembelian</small>
                        </h2>
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
                                                <th>No.</th>
                                                <th>Nama Barang</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody id="charttransaksi">
                                       
                                        </tbody>
                                    </table>
                                    <div class="panel panel-primary" style="width: 30%; margin-left: 100%; transform: translateX(-100%);">
                                    <div class="panel-heading">Total Pembayaran :</div>
                                    <div class="panel-body" id="tot" ></div>
                                    <input id="totalsemuanya" hidden name='total'>
                                    </div>
                                </div>
                                <div align="right"><button onclick="batal()" class="btn btn-danger">Batal</button> <button onclick="cekout()" name="update" class="btn btn-success">Cekout</button><div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. ROW  -->


<script >
 function belibarang(id)
 {
     $('#btnbeli').attr('disabled','disabled');

     getstok();
     var jumlah= parseInt($('#'+id+'J').val());
     var stok = parseInt($('#'+id).val());
     if(jumlah>stok)
     {
         alert("STOK BARANG TIDAK MENCUKUPI");
         $('#btnbeli').removeAttr('disabled');
     }
     else
     {
        $.ajax({
        url  :"<?php echo base_url('penjualan/post_penjualan');?>",
        type : 'POST',
        data : {
            jumlah : jumlah,
            id_barang : id
        },
         success : function(data)
        {   
            console.log(data);
             getpreview();
             getstok();
             $('#btnbeli').removeAttr('disabled');
        }
     })
     }
    
 }



 function getstok()
 {
    $.ajax({
        url  :"<?php echo base_url('penjualan/penjualan_offline_tampildata');?>",
        type : 'POST',
         success : function(data)
         {
            var result = $.parseJSON(data);         
            for (var i=0; i< result.length ; i++)
            {
                if (result[i]['stok']==0)
                $("#"+result[i]['id_barang']).empty();
                $("#"+result[i]['id_barang']+"S").html(result[i]['stok']);
                document.getElementById(result[i]['id_barang']).value = result[i]['stok'];
            }
            
         }
    })
}



function deletebarang(id)
 {
    $.ajax({
        url  :"<?php echo base_url('penjualan/hapusdetailadmin');?>",
        type : 'POST',
        data : {
            id_detail:id
        },
         success : function(data)
         {
           getpreview();  
           getstok();
         }
    })
}

function caribarangnama()
 {
     var nama = $('#caribarang').val();
    $.ajax({
        url  :"<?php echo base_url('penjualan/penjualan_offline_tampildata_byname');?>",
        type : 'POST',
        data : {
            nama : nama
        },
         success : function(data)
         {
            var result = $.parseJSON(data);
            $("#tabelbarang").empty();
            
            for (var i=0; i< result.length ; i++)
            {
                var no = i+1;
                $("#tabelbarang").append(
                "<tr class='gradeU'>"+
                    "<td>"+no+"</td>"+
                    "<td>"+result[i]['nama_barang']+"</td>"+
                    "<td>"+result[i]['jenis_barang']+"</td>"+
                    "<td>"+accounting.formatMoney(result[i]['harga_jual'], "Rp ", 2, ".", ",")+"</td>"+
                    "<td id='"+result[i]['id_barang']+"S'>"+result[i]['stok']+"</td>"+
                    "<input hidden id='"+result[i]['id_barang']+"' value="+result[i]['stok']+"/>"+
                    "<td><input name='jml' id='"+result[i]['id_barang']+"J' style='max-width: 35px;text-align: center;' value='1' type='number'  min='1' max='5' /></td>"+
                    "<td class='center'>"+
                    "<button  name='transaksi' onclick=belibarang('"+result[i]['id_barang']+"')>BELI</button>"+ 
                    "</td>"+
                "</tr>"
                )
            }
            
         }
    })
}

function cekout()
 {
    var total= parseInt($('#totalsemuanya').val());
    if(total<=0 || total=='NaN'){
        alert("Tidak ada barang yg akan dijual")
    }
    else
    {
        $.ajax({
        url  :"<?php echo base_url('penjualan/updatepenjualanoffline');?>",
        type : 'POST',
        data : {
            total : total
        },
         success : function(data)
        {
           alert("Penjualan Berhasil");
           window.location="<?php echo base_url().'penjualan/penjualan_offline'?>";
        }
     })
    }
    
 }

 function batal()
 {
        $.ajax({
        url  :"<?php echo base_url('penjualan/hapusdetailadminbatal');?>",
        type : 'POST',
         success : function(data)
        {
           alert("Berhasil dibatalkan");
           getpreview();
        }
     })
}
    
</script>

