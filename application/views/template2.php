<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Aplikasi Penjualan</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <meta name="description" content="Hakko Bio Richard">
    <meta name="keywords" content="Perpus, Website, Aplikasi, Perpustakaan, Online">
    <!-- bootstrap 3.0.2 -->
    <link href="<?php echo base_url(); ?>/template/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- font Awesome -->
    <link href="<?php echo base_url(); ?>/template/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="<?php echo base_url(); ?>/template/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?php echo base_url(); ?>/template/css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?php echo base_url(); ?>/template/css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="<?php echo base_url(); ?>/template/css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- fullCalendar -->
    <!-- <link href="css/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" /> -->
    <!-- Daterange picker -->
    <link href="<?php echo base_url(); ?>/template/css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="<?php echo base_url(); ?>/template/css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <!-- <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" /> -->
    <link href='http://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <!-- Theme style -->
    <link href="<?php echo base_url(); ?>/template/css/style.css" rel="stylesheet" type="text/css" />
    



    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
          <![endif]-->

          <style type="text/css">

          </style>
      </head>
      <body class="skin-black "  >
        <!-- header logo: style can be found in header.less -->
        <header class="header" >
            <a href="<?php echo base_url(); ?>penjualan/penjualan_offline" class="logo" style="background: deeppink;">
             TOKO LINTANG
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
                <div class="navbar-right">
                <ul class="nav navbar-nav">
                <div class="collapse navbar-collapse">
				<ul class="nav navbar-nav navbar-right">
                    <?php 
                      if ($_SESSION['level'] == 1)
                      {?>
           
				
				<li><button style="margin-top: 6px; margin-right:5px; background-color:deeppink" id="pesan_sedia"  class='btn btn-primary' data-toggle="modal" data-target="#modalpesan" onclick="pesan()" ><span class='glyphicon glyphicon-comment'></span>  Pesan <span class="badge" id="chartpending"></span></button></li>
				<li><button style="margin-top: 6px; margin-right:15px; background-color:deeppink" id="profil"  class="btn btn-primary" data-toggle="dropdown">Hy , <?php echo $_SESSION["userdata"]->id_user;?> &nbsp<span class="glyphicon glyphicon-user"></span></button></li>

                      <?php
                      }
                      else
                      {
                      ?>
                        <!-- <li><a href="<?php  echo base_url()?>"><span class='glyphicon glyphicon-home'></span>  Home  </a></li> -->
				        <li><button  style="margin-top: 6px; margin-right:5px; background-color:deeppink" class='btn btn-primary'  href="" onclick="page('1')"><span class='glyphicon glyphicon-shopping-cart'></span>  Cart <span class="badge" id="charttotal"></span> </button></li>
                        <li><button  style="margin-top: 6px; margin-right:5px; background-color:deeppink" class='btn btn-primary' id="pesan_sedia" href="chat.php" data-toggle="modal" data-target="#modalpesan"><span class='glyphicon glyphicon-comment'></span>  Pesan  </button></li>
                        <li><button style="margin-top: 6px; margin-right:15px; background-color:deeppink" id="profil" class="btn btn-primary" data-toggle="dropdown">Hy ,<?php echo $_SESSION["userdata"]->nama_member;?> &nbsp<span class="glyphicon glyphicon-user"></span></button></li>         
                      <?php
                      }
                      ?>
				</ul>
			</div>
                       
                            </ul>
                        </div>
                    </nav>
                </header>
                <?php

?>

                <div class="wrapper row-offcanvas row-offcanvas-left" >
                    <!-- Left side column. contains the logo and sidebar -->
                    <aside class="left-side sidebar-offcanvas" style="background: deeppink;">
                        <!-- sidebar: style can be found in sidebar.less -->
                        <section class="sidebar">
                            <!-- Sidebar user panel -->
                            <div class="user-panel" style="padding:0px;">
                                <div>
                                
                          </div>
                            </div>
                            <!-- search form -->
                            <!--<form action="#" method="get" class="sidebar-form">
                                <div class="input-group">
                                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                                    <span class="input-group-btn">
                                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                                    </span>
                                </div>
                            </form> -->
                            <!-- /.search form -->
                            <!-- sidebar menu: : style can be found in sidebar.less -->
                            <?php
                            if ($_SESSION['level'] == 1)
                            {include "menu.php";
                             //include "modal_pesan.php";
                            }
                            else{
                                include "userinterface/menuuser.php";
                            }
                            ?>
                        </section>
                        <!-- /.sidebar -->
                    </aside>

                    <aside class="right-side">

                <!-- Main content -->
                <section class="content" style="padding-left: 30px;padding-right: 30px;background-color: beige;" >

                    <div class="row" style="margin-bottom:5px;">




  <?php echo $contents; ?>
</div>
              <!-- row end -->
                </section><!-- /.content -->
                <div class="footer-main">
                    KERJA PRAKTEK </a> 2018
                </div>
            </aside><!-- /.right-side -->

        </div><!-- ./wrapper -->


        <!-- jQuery 2.0.2 -->
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>/template/js/jquery.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>/assets/js/accounting.js" type="text/javascript"></script>

        <!-- jQuery UI 1.10.3 -->
        <script src="<?php echo base_url(); ?>/template/js/jquery-ui-1.10.3.min.js" type="text/javascript"></script>
        
        <!-- Bootstrap -->
        <script src="<?php echo base_url(); ?>/template/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="<?php echo base_url(); ?>/template/js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>

        <script src="<?php echo base_url(); ?>/template/js/plugins/chart.js" type="text/javascript"></script>

        <!-- datepicker
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>-->
        <!-- Bootstrap WYSIHTML5
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>-->
        <!-- iCheck -->
        <script src="<?php echo base_url(); ?>/template/js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <!-- calendar -->
        <script src="<?php echo base_url(); ?>/template/js/plugins/fullcalendar/fullcalendar.js" type="text/javascript"></script>

        <!-- Director App -->
        <script src="<?php echo base_url(); ?>/template/js/Director/app.js" type="text/javascript"></script>

        <!-- Director dashboard demo (This is only for demo purposes) -->
        <script src="<?php echo base_url(); ?>/template/js/Director/dashboard.js" type="text/javascript"></script>

        <!-- Director for demo purposes -->
        <script type="text/javascript">
            $('input').on('ifChecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().addClass('highlight');
                $(this).parents('li').addClass("task-done");
                console.log('ok');
            });
            $('input').on('ifUnchecked', function(event) {
                // var element = $(this).parent().find('input:checkbox:first');
                // element.parent().parent().parent().removeClass('highlight');
                $(this).parents('li').removeClass("task-done");
                console.log('not');
            });

        </script>
        <script>
            $('#noti-box').slimScroll({
                height: '400px',
                size: '5px',
                BorderRadius: '5px'
            });

            $('input[type="checkbox"].flat-grey, input[type="radio"].flat-grey').iCheck({
                checkboxClass: 'icheckbox_flat-grey',
                radioClass: 'iradio_flat-grey'
            });
</script>
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
            console.log(data);
           if (data) 
           {	
                $("#chartpending").html(
                    "<div>"+data+"</div>"
                );
           }
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
                $("#charttotal").html(
                    "<div>"+data+"</div>"
                );
           }
        }
    });
}
   
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
                            "<td>"+result[i]['id_transaksi']+"</td>"+
                            "<td>"+result[i]['tanggal']+"</td>"+
                            "<td>"+accounting.formatMoney(result[i]['total_bayar'], "Rp ", 2, ".", ",")+"</td>"+
                            "<td class='center'>"+
                                "<button class='btn btn-danger' style='height: 22px;font-size: 12px;padding-top: 2px;' onclick=ACC('"+result[i]['id_transaksi']+"')>ACC</button>"+
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
            id_transaksi : id
        },
        success : function(data)
        {
            total(1);
            pesan();
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
    window.location="<?php echo base_url().'pembelian'?>";
        break;
    case 10:
    window.location="<?php echo base_url().'transaksi/laporan'?>";
        break;
    case 11:
    window.location="<?php echo base_url().'transaksi/laporan_offline'?>";
        break;
    case 12:
    window.location="<?php  echo base_url().'penjualan/chart'?>";
        break;
    case 13:
    window.location="<?php  echo base_url().'penjualan/chart'?>";
        break;
}
}


</script>

 <?php
    if ($_SESSION['level'] == 1)
    {
    include "modal_pesan.php";
    }
    ?>
</body>
</html>