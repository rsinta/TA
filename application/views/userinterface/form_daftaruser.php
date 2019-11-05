<html>
<head>
<meta charset="utf-8">
<title>Daftar Anggota Djonosilver</title>
<link href="<?php echo base_url().'assets/css/' ?>logincss.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js"></script>
<link href="<?php echo base_url(); ?>/template/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
</head>
<body style="background-color: none;">
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
       <h1>DJONO SILVER</h1>
    </div>

    <!-- Login Form -->

      <input type="text" id="nama_anggota" class="fadeIn second" name="nama_anggota" placeholder="Nama Lengkap">      
      <input type="text" id="alamat" class="fadeIn second" name="alamat" placeholder="Alamat">
                    <select name="province_destination" id="province_destination" class="form-control" onchange="get_city_destination(this);" style="margin-top: 3px; width: 85%;margin-left: 33px;">
                        <option value="">Pilih Provinsi</option>
                    </select>

                     <select name="city_destination" id="city_origin" class="form-control"  style="margin-top: 3px; width: 85%;margin-left: 33px;">
                        <option value="">Pilih Kota</option>
                    </select>
      <input type="text" id="username" class="fadeIn third" name="username" placeholder="username" >
      <select align="center" id="jenis_kelamin" name="jenis_kelamin" class="form-control" style="margin-top: 6px; width: 85%;margin-left: 33px;" >
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
      </select>
      <input type="password" id="password" class="fadeIn second" name="password" placeholder="PASSWORD" style="
    background-color: rgb(246, 246, 246);
    color: rgb(13, 13, 13);
    text-align: center;
    display: inline-block;
    font-size: 16px;
    width: 85%;
    padding: 15px 32px;
    text-decoration: none;
    margin: 5px;
    border-width: 2px;
    border-style: solid;
    border-color: rgb(246, 246, 246);
    border-image: initial;
    transition: all 0.5s ease-in-out 0s;
    border-radius: 5px;
">
      <button class="btn btn-primary" style="margin-top: 20px; margin-bottom: 20px; width: 200px;" class="fadeIn fourth" name="daftar" value="DAFTAR" onclick="daftar()" >DAFTAR</button>
  </div>
</div>



				
	 
</body>
</html>
<script>
window.onload=get_city();
 function daftar()
 {
   var nama_anggota = $('#nama_anggota').val();
   var alamat = $('#alamat').val();
   var username = $('#username').val();
   var jenis_kelamin = $('#jenis_kelamin').val();
   var password = $('#password').val();
   var provinsi = $('#province_destination').val();
   var city   = $('#city_origin').val();
 
      $.ajax({
        url  :"<?php echo base_url('auth/registeruser');?>",
        type : 'POST',
        data : {
          daftar : 'yes',
          nama_anggota : nama_anggota,
          alamat : alamat,
          username : username, 
          jenis_kelamin : jenis_kelamin, 
          password :password,
          provinsi : provinsi,
          kota : city,
          islogin : 0
        },
         success : function(dd)
        {
          console.log(dd);
          if (dd==1)
          {
            alert("username sudah ada");
          }
          else
          {
            window.location= "<?php echo base_url('auth/loginuser');?>";
          }
           
        }
     })
     
 }

 function get_city()
 {
  $.ajax({
        url  :"<?php echo base_url('apiongkir/province');?>",
        type : 'POST',
         success : function(data)
        {
          var all_province = $.parseJSON(data);
          $(".all_province").html("<option value=''>Pilih Provinsi</option>");
                $.each(all_province['rajaongkir']['results'], function (key, value) {
                    $("#province_destination").append(
                        "<option value='" + value.province_id + "'>" + value.province + "</option>"
                    );
                });
        }
  })
 }

  function get_city_destination(sel)
 {
  $.ajax({
        url  :"<?php echo base_url('apiongkir/city');?>",
        type : 'POST',
        data : {id: sel.value},
         success : function(data)
        {
          var get_city = $.parseJSON(data);
          $("#city_origin").html("<option value=''>Pilih Kota</option>");
                $.each(get_city['rajaongkir']['results'], function (key, value) {
                    $("#city_origin").append(
                        "<option value='" + value.city_id + "'>" + value.type + " - " + value.city_name + "</option>"
                    );
                });
        }
  })
 }
</script>