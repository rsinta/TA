<div class="row">
                    <div class="col-md-12" align="center">

                        <h2 class="page-header">
                        </h2>
                    </div>
</div> 
                <!-- /. ROW  -->

<div id="slideshow">
<?php 
            foreach($terlaris->result_array() as $rr)
                { 
                
        ?> <div>
            <img style="width:100%;height:340px;padding-bottom:10px;" src="<?php echo base_foto().$rr['foto']?>">
            </div>
            <?php
            
                }
            ?>
    </div>
        </div>
    </div>

<style>
#slideshow { 
    margin-top:0px;
    background-color:silver; 
    position: relative; 
    width: 100%; 
    height: 350px; 
    box-shadow: 0 0 20px rgba(0,0,0,0.4); 
}

#slideshow > div { 
    position: absolute; 
    text-align:center;
    top: 10px; 
    bottom: 10px; 
    transform: translate(50%,0%);
    width:50%;
}
</style>
                <div class="panel-body" >
                            <input onchange='caribarangnama()' style="margin-left: -15px;" id='caribarang' name='cari' type='text'> 
                            <button class="btn" onclick='caribarangnama()'>Cari</button>
                </div>
                <div class="row" id="tabelbarangpenjualan">
                    <?php $no=1; foreach ($databarang->result() as $data) { ?>
                        <div class="col-md-3 col-sm-12 col-xs-12">
                            <div class="panel panel-primary text-center no-boder bg-color-green">
                                <div class="panel-body">
                                <h3><?php echo $data->nama_barang ?></h3>
                                <div class="hvrbox">
                                    <img style="width: 100%;height: 176px;" src="<?php echo base_foto().$data->foto?>" alt="" class="hvrbox-layer_bottom">
                                    <div class="hvrbox-layer_top hvrbox-layer_scale">
                                        <div class="hvrbox-text">Bahan : <?php echo $data->nama_bahan?> <br> Berat : <?php echo $data->berat_satuan?> gr </div>
                                    </div>
                                </div>
                                <h6>Rp. <?php echo number_format($data->harga_barang,2) ?></h6>
                                 <input hidden name="hrg" value="<?php echo $data->harga_barang?>">
                                 <input hidden id="<?php echo $data->id_barang?>" value="<?php echo $data->stok?>">
                                </div>
                                <div class="panel-footer back-footer-green">
                                 <button id="btnbeliuser" class="btn btn-success" name="transaksi" onclick="belibarang('<?php echo $data->id_barang?>')">BELI</button> 
                                </div>    
                            </div>
                        </div>
                    <?php $no++; }
                  
                    ?>

                <!-- /. ROW  -->
                </div>
<div align="center">
<?php
  echo $this->pagination->create_links();
  
?>
</div>

<script >

function detail()
{
     $.ajax({
        url  :"<?php echo base_url('penjualan/post_penjualan');?>",
        type : 'POST',
        data : {
            id_barang : id
        },
         success : function(data)
        {
              total();
              getstok(id);
        }
     })
    bootbox.alert("Detail Barang ", function() {
  Example.show("Hello world callback");
});
}

 function belibarang(id)
 { 
    if ('<?php if(isset($_SESSION["userdata"]->id_anggota)) {echo true;} else {echo false;}?>')
    {
        var stok = parseInt($('#'+id).val());
        if(stok<1)
        {
            alert('stok habis');
        }
        else
        {
            $.ajax({
            url  :"<?php echo base_url('penjualan/post_penjualan');?>",
            type : 'POST',
            data : {
                id_barang : id
            },
            success : function(data)
            {
                total();
                getstok(id);
            }
            })
        }
    }
    else
    {
        var stok = parseInt($('#'+id).val());
        if(stok<1)
        {
            alert('stok habis');
        }
        else
        {
        $.ajax({
        url  :"<?php echo base_url('penjualan/poscartpending');?>",
        type : 'POST',
        data : {
            id_barang : id
        },
         success : function(data)
        {
                    var cart=JSON.parse(data);
					 var count = Object.keys(cart).length;
                     $("#chartpendingtotal").html(
                    "<div>"+count+"</div>");
        }
     })
        }
    }
     
 }


 
 function getstok(id)
 {
    $.ajax({
        url  :"<?php echo base_url('penjualan/stokbarang');?>",
        type : 'POST',
        data :{
            id_barang : id
        },
         success : function(data)
         {
            var result = $.parseJSON(data); 
            document.getElementById(result[0]['id_barang']).value = result[0]['stok'];
         }
            
    })
}

function caribarangnama()
 {
     var nama = $('#caribarang').val();
    $.ajax({
        url  :"<?php echo base_url('penjualan/penjualan_tampildata_byname');?>",
        type : 'POST',
        data : {
            nama : nama
        },
         success : function(data)
         {
            var result = $.parseJSON(data);
            $("#tabelbarangpenjualan").empty();
            
            for (var i=0; i< result.length ; i++)
            {
                var no = i+1;
                $("#tabelbarangpenjualan").append(
                        "<div class='col-md-3 col-sm-12 col-xs-12'>"+
                            "<div class='panel panel-primary text-center no-boder bg-color-green'>"+
                                "<div class='panel-body'>"+
                                "<h3>"+result[i]['nama_barang']+"</h3>"+
                                "<img style='width: 100%;height: 176px;' src='<?php echo base_url('img/barang/')?>"+result[i]['foto']+"'>"+
                                "<h6>"+accounting.formatMoney(result[i]['harga_barang'], "Rp ", 2, ".", ",")+"</h6>"+
                                 "<input hidden name='hrg' value='"+result[i]['harga_barang']+"'>"+
                                "</div>"+
                                "<div class='panel-footer back-footer-green'>"+
                                 "<button id='btnbeliuser' class='btn btn-success' name='transaksi' onclick=belibarang('<?php echo $data->id_barang?>')>BELI</button>"+
                                "</div>"+
                            "</div>"+
                        "</div>"
                )
            }
            
         }
    })
}


setInterval(function() { 
  $('#slideshow > div:first')
    .fadeOut(2000)
    .next()
    .fadeIn(2000)
    .end()
    .appendTo('#slideshow');
},  3000);

</script>
