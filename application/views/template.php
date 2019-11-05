<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link href="<?php echo base_url(); ?>/template/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <title>Djono Silver</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url()?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url();?>template/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Custom CSS -->
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="<?php echo base_url()?>assets/css/colors/default-dark.css" id="theme" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <script src="<?php echo base_url(); ?>assets/js/accounting.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootbox.min.js" type="text/javascript"></script>
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="fix-header card-no-border fix-sidebar">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">TUGAS AKHIR SINTA 2018</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" style="height: 50px;" >
            <nav class="navbar top-navbar navbar-expand-md navbar-light" style="height: 40px; min-height: 40px;">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo base_url(); ?>penjualan/penjualan_offline">
                        <!-- Logo icon --><b>
                            <img src="<?php echo base_fotointf()?>logo.png" alt="homepage" class="dark-logo" style="width: 100%;" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                       
                    </a>

    
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav mr-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                      
                        <!-- ============================================================== -->
                        <!-- Profile -->
                        <!-- ============================================================== -->
                      <li><button style="margin-top: 6px; margin-right:5px;background-color:silver ; color:black;" id="pesan_sedia"  class='btn btn-primary' data-toggle="modal" data-target="#modalpesan" onclick="pesan()" ><span class='glyphicon glyphicon-comment'></span>  Pesan <span class="badge" id="chartpending"></span></button></li>
                      <li><button style="margin-top: 6px; margin-right:5px;background-color:silver ; color:black;" id="pesan_sedia"  class='btn btn-primary' data-toggle="modal" data-target="#modalpemesanan" onclick="pemesanan()" ><span class='glyphicon glyphicon-comment'></span>  Pemesanan <span class="badge" id="pemesananpending"></span></button></li>
                      <li class="dropdown">
                        <button style="margin-top: 6px; margin-right:15px;" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Hy , <?php echo $_SESSION["userdata"]->nama_admin;?> &nbsp<span class="glyphicon glyphicon-user"></span>
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu" style="background-color: red;border-radius: 7px;min-width: 90%;">
                            <li><a style="color:white;" href="<?php echo base_url().'logout'?>">Keluar</a></li>
                        </ul>
                      </li>

                      <?php
                     
                      ?>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" style="background-color: silver">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" style="background-color: silver">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav" style="padding-top:5px;padding-bottom:7px;">
      
                    <?php
                            if ($_SESSION['level'] == 1)
                            {
                             
                                    include "menu.php";
                                
                              
                             //include "modal_pesan.php";
                            }
                            else{
                                include "userinterface/menuuser.php";
                            }
                    ?>
           
                    
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper" style="padding-top: 55px; padding-bottom: 0px;">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid" style="padding: 0px 25px;">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="row page-titles">
                    <div class="col-md-5 align-self-center">
                    </div>
                   
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-12">
                    <?php echo $contents; ?>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
           
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
       
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
                        </div>
    <footer class="footer" align="center" style="transform: translateX(9%);">
                TUGAS AKHIR SINTA 2018
            </footer>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    
    <!-- Bootstrap tether Core JavaScript -->
   
  
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="<?php echo base_url()?>assets/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="<?php echo base_url()?>assets/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="<?php echo base_url()?>assets/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="<?php echo base_url()?>assets/js/custom.min.js"></script>
       

<script type="text/javascript">
window.onload=total('<?php echo $_SESSION['level']?>');

function validate(evt) {
  var theEvent = evt || window.event;

  // Handle paste
  if (theEvent.type === 'paste') {
      key = event.clipboardData.getData('text/plain');
  } else {
  // Handle key press
      var key = theEvent.keyCode || theEvent.which;
      key = String.fromCharCode(key);
  }
  var regex = /[0-9]/;
  if( !regex.test(key) ) {
    theEvent.returnValue = false;
    if(theEvent.preventDefault) theEvent.preventDefault();
  }
}



function total(level) {
    level = parseInt(level);
if(level == 1)
{
   

    $.ajax({
        url:"<?php echo base_url('penjualan/get_trans_pending');?>",
        type : "get",
        success : function(data)
        {
                $("#chartpending").html(
                    "<div>"+data+"</div>"
                );
            
        $.ajax({
        url:"<?php echo base_url('penjualan/get_pemesanan_pending');?>",
        type : "get",
        success : function(data)
        { 
            $("#pemesananpending").html(
                    "<div>"+data+"</div>"
                );
            if(window.location.href==="<?php echo base_url('pembelian')?>"){getpreviewpembelian();}
        }
    })
           
            
        
       
        }
    });
}
else
{
    $.ajax({
        url:"<?php echo base_url('penjualan/get_totalchart');?>",
        type : "get",
        success : function(data)
        {
           if (data) 
           {	
            $("#slideshow > div:gt(0)").hide();
                $("#charttotal").html(
                    "<div>"+data+"</div>"
                );
           }
        }
    });


    
    $.ajax({
        url:"<?php echo base_url('penjualan/get_totalchart');?>",
        type : "get",
        success : function(data)
        {
           if (data) 
           {	
            $("#slideshow > div:gt(0)").hide();
                $("#charttotal").html(
                    "<div>"+data+"</div>"
                );
           }
        }
    });
}
   
}

function getpreview()
 {
     $.ajax({
        url  :"<?php echo base_url('penjualan/chartpenjualanoff');?>",
        type : 'POST',
        data : {

        },
         success : function(data)
        {
            var result = $.parseJSON(data);
            $("#charttransaksi").empty();
            if(result.length>0)
            {
                
             
               var totalsemua=0;
               for(var i=0; i< result.length; i++)
               {
                   var no = i+1;
                   var total = result[i]['harga']*result[i]['jumlah'];
                   totalsemua = totalsemua+ total;
                   $("#charttransaksi").append(
                
                                            "<tr class='gradeU'>"+
                                                "<td>"+no+"</td>"+
                                                "<td>"+result[i]['nama_barang']+"</td>"+
                                                "<td>"+accounting.formatMoney(result[i]['harga'], "Rp ", 2, ".", ",")+"</td>"+
                                                "<td>"+result[i]['jumlah']+"</td>"+
                                                "<td>"+accounting.formatMoney(total, "Rp ", 2, ".", ",")+"</td>"+
                                                "<td class='center'>"+
                                                "<button class='btn btn-danger' onclick=deletebarang('"+result[i]['id_detail']+"')>Delete</button>"+
                                                "</td>"+
                                            "</tr>"
                );
               }
               $("#tot").html(accounting.formatMoney(totalsemua, "Rp ", 2, ".", ","));
               document.getElementById('totalsemuanya').value = totalsemua;

            }
            else
            {
                $("#tot").html(accounting.formatMoney(0, "Rp ", 2, ".", ","));
               document.getElementById('totalsemuanya').value = 0;
            }
               
        }
     })
 }


function getpreviewpembelian()
 {
     $.ajax({
        url  :"<?php echo base_url('pembelian/tampilpembelianbarang');?>",
        type : 'POST',
        data : {

        },
         success : function(data)
        {  var result = $.parseJSON(data);
            $("#chartpembelian").empty();
             if(result['record2'].length>0)
             {
              
               var totalsemua=0;
               for(var i=0; i< result['record2'].length; i++)
               {
                   var no = i+1;
                   var total = result['record2'][i]['harga_barang']*result['record2'][i]['jumlah'];
                   totalsemua = totalsemua+ total;
                   $("#chartpembelian").append(

                       
                                            "<tr class='gradeU'>"+
                                                "<td>"+result['record2'][i]['id_detail_pembelian']+"</td>"+
                                                "<td>"+result['record2'][i]['nama_barang']+"</td>"+
                                                "<td>"+accounting.formatMoney(result['record2'][i]['harga_barang'], "Rp ", 2, ".", ",")+"</td>"+
                                                "<td>"+result['record2'][i]['jumlah']+"</td>"+
                                                "<td>"+accounting.formatMoney(total, "Rp ", 2, ".", ",")+"</td>"+
                                                "<td class='center'>"+
                                                "<button class='btn btn-danger' onclick=deletebarang('"+result['record2'][i]['id_detail_pembelian']+"')>Delete</button>"+
                                                "</td>"+
                                            "</tr>"
                );
               }
               $("#totpembelian").html(accounting.formatMoney(totalsemua, "Rp ", 2, ".", ","));
               document.getElementById('totalsemuanyapembelian').value = totalsemua;
            
             }
             else{
                $("#totpembelian").html(accounting.formatMoney(0, "Rp ", 2, ".", ","));
               document.getElementById('totalsemuanyapembelian').value = 0;
             }
              
        }
     })
 }

function pesan()
{
    
    $.ajax({
        url:"<?php echo base_url('penjualan/get_data_pending');?>",
        type : "get",
        success : function(data)
        {
          var result = $.parseJSON(data);
          $("#modalpending").empty();
          for(var i=0; i<result.length; i++)
          {
            $("#modalpending").append(
                        "<tr >"+
                            "<td>"+result[i]['id_penjualan']+"</td>"+
                            "<td>"+result[i]['tgl']+"</td>"+
                            "<td>"+accounting.formatMoney(result[i]['total_harga'], "Rp ", 2, ".", ",")+"</td>"+
                            "<td class='center'>"+
                                "<button class='btn btn-danger' style='height: 22px;font-size: 12px;padding-top: 2px;' onclick=ACC('"+result[i]['id_penjualan']+"')>ACC</button>"+
                                "<button class='btn btn-danger' style='height: 22px;font-size: 12px;padding-top: 2px; margin-left:5px'  data-toggle='modal' data-target='#modalpreview' onclick=previewbukti('"+result[i]['id_penjualan']+"')>Preview Bukti</button>"+
                            "</td>"+
                        "</tr>"
                );
          }
        }
    });
}

function pemesanan()
{
    
    $.ajax({
        url:"<?php echo base_url('penjualan/get_datapemesanan_pending');?>",
        type : "get",
        success : function(data)
        {
          var result = $.parseJSON(data);
          $("#modalpemesananpending").empty();
          for(var i=0; i<result.length; i++)
          {
            $("#modalpemesananpending").append(
                        "<tr >"+
                            "<td>"+result[i]['id_pemesanan']+"</td>"+
                            "<td>"+result[i]['id_anggota']+"</td>"+
                            "<td>"+result[i]['nama_kategori']+"</td>"+
                            "<td>"+result[i]['berat']+"</td>"+
                            "<td>"+result[i]['tgl']+"</td>"+
                            "<td class='center'>"+
                                "<button class='btn btn-danger' style='height: 22px;font-size: 12px;padding-top: 2px;' onclick=ACCpesan('"+result[i]['id_pemesanan']+"')>ACC</button>"+
                                "<button class='btn btn-danger' style='height: 22px;font-size: 12px;padding-top: 2px; margin-left:5px'  data-toggle='modal' data-target='#modalpreviewfoto' onclick=previewfoto('"+result[i]['id_pemesanan']+"')>Foto</button>"+
                            "</td>"+
                        "</tr>"
                );
          }
        }
    });
}

function ACC(id)
{
    $.ajax({
        url:"<?php echo base_url('penjualan/accpending');?>",
        type : "POST",
        data:{
            id_penjualan : id
        },
        success : function(data)
        {
            total(1);
            pesan();
        }
    });
}

function ACCpesan(id)
{
     window.location="<?php echo base_url('penjualan/tampil_pemesanan_admin').'?id="+id+"'?>"
}
 
function preview(id)
{
    $.ajax({
        url:"<?php echo base_url('penjualan/accpending');?>",
        type : "POST",
        data:{
            id_penjualan : id
        },
        success : function(data)
        {
            total(1);
            pesan();
        }
    });
}
function previewbukti(id)
{
    $.ajax({
        url:"<?php echo base_url('penjualan/get_data_pending');?>",
        type : "POST",
        data:{
            id_transaksi : id
        },
        success : function(data)
        {
            var result = $.parseJSON(data);
            console.log(result);
            $("#buktipembayaran").empty();
            $("#buktipembayaran").append(
                       "<image style='width: 50%;'src=<?php echo base_fotobukti()?>"+result[0]['bukti']+">"
                );
        }
    });
}

function previewfoto(id)
{
    $.ajax({
        url:"<?php echo base_url('penjualan/get_datapemesanan_pending');?>",
        type : "POST",
        data:{
            id : id
        },
        success : function(data)
        {
            var result = $.parseJSON(data);
            console.log(result);
            $("#buktipreviewfoto").empty();
            $("#buktipreviewfoto").append(
                       "<image style='width: 50%;'src=<?php echo base_fotopemesanan()?>"+result[0]['foto']+">"
                );
        }
    });
}

function page(a)
{
    
var index= parseInt(a);
    switch(index) {
    case 1:
        window.location="<?php  echo base_url().'penjualan/chart'?>";
        break;
    case 2:
    window.location="<?php echo base_url().'penjualanOffline'?>";
        break;
    case 3:
    window.location="<?php echo base_url().'kategori'?>";
        break;
    case 4:
    window.location="<?php echo base_url().'barang'?>";
        break;
    case 5:
    window.location="<?php echo base_url().'operator'?>";
        break;
    case 6:
    window.location="<?php echo base_url().'supliyer'?>";
        break;
    case 7:
    window.location="<?php echo base_url().'transaksi'?>";
        break;
    case 8:
    window.location="<?php echo base_url().'transaksi/offline'?>";
        break;
    case 9:
    window.location="<?php echo base_url().'pengrajin'?>";
        break;
    case 10:
    window.location="<?php echo base_url().'bahan'?>";
        break;
    case 11:
    window.location="<?php echo base_url().'jasakirim'?>";
        break;
    case 12:
    window.location="<?php  echo base_url().'operator/tampil_member'?>";
        break;
    case 13:
    window.location="<?php  echo base_url().'penjualan/chart'?>";
        break;
    case 14:
    window.location="<?php  echo base_url().'pembelian'?>";
    break;
    case 15:
    window.location="<?php  echo base_url().'pemesanan'?>";
    break;
    case 16:
    window.location="<?php  echo base_url().'pemesanan/tampil_data_pemesanan'?>";
    break;
    case 17:
    window.location="<?php  echo base_url().'laporan'?>";
    break;
    case 18:
    window.location="<?php  echo base_url().'laporan/tampil_data_barang'?>";
    break;
    case 19:
    window.location="<?php  echo base_url().'laporan/tampil_data_pemesanan'?>";
    break;
    case 20:
    window.location="<?php  echo base_url().'laporan/tampil_pembelian'?>";
    break;
}
}



</script>

 <?php
    if ($_SESSION['level'] == 1)
    {
    include "modal_pesan.php";
    include "modal_preview.php";
    include "modal_pemesanan.php";
    }
    ?>
</body>

</html>