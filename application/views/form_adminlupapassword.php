<html>
<head>
<meta charset="utf-8">
<title>Admin Lupa Password</title>
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
       <h1>Djono Silver</h1>
    </div>

    <!-- Login Form -->

      <input onchange="cek()" type="text" id="id_user" class="form-control" name="id_user" placeholder="ID ADMIN" style="margin-bottom: 6px;width: 85%;" >
      <input readonly type="text" id="pertanyaannya" class="fadeIn second" name="pertanyaannya" placeholder="PERTANYAAN" >
      <input onchange="cekjawaban()" type="text" id="jawabannya" class="fadeIn third" name="jawabannya" placeholder="JAWABAN" style="margin-bottom : 20px;">
      <div id="resetpassword">
      
      </div>
  </div>
   
</div>

</body>
</html>
<script>

function cek()
{
    var id_user = $('#id_user').val();
    $.ajax({
        url  :"<?php echo base_url('auth/lupapasswordadmin');?>",
        type : 'POST',
        data : {
            id_user : id_user
        },
        success : function(data)
        {
            if(data)
            {
                data = $.parseJSON(data);
                document.getElementById('pertanyaannya').value=data['pertanyaannya'] ; 
            }
        }
    })
}

 function cekjawaban()
 {
   var id_user = $('#id_user').val();
   var pertanyaan = $('#pertanyaannya').val();
   var jawaban = $('#jawabannya').val();

      $.ajax({
        url  :"<?php echo base_url('auth/resetadmin');?>",
        type : 'POST',
        data : {
          id_user :id_user,
          pertanyaannya :pertanyaan,
          jawabannya :jawaban 
        },
         success : function(dd)
        {
            console.log(dd);
          $("#resetpassword").empty();
          if(dd==1)
          {
          
              $("#resetpassword").append(
                  '<input type="text" id="passbaru" class="form-control" name="jawaban" placeholder="Password Baru" style="margin-top:-10px;">'+
                  '<button class="btn btn-primary" style="margin-top: 20px; margin-bottom: 20px; width: 200px;" class="fadeIn fourth" name="daftar" onclick="resetpassword()" >RESET PASSWORD </button>'
              )
          }
          else
          {
              alert('jawaban salah!');
          }
        }
     })
     
 }

 function resetpassword()
 {
    var id_user = $('#id_user').val();
    var passbaru = $('#passbaru').val();
    if(id_user=="" || passbaru=="")
    {
        alert('Harus Lengkap');
    }
    else
    {
        $.ajax({
            url  :"<?php echo base_url('auth/resetpassadmin');?>",
            type : 'POST',
            data : {
            id_user :id_user,
            passbaru : passbaru
            },
            success : function(dd)
            {
                if(dd==1)
                {
                    alert('Succes');
                    window.location="<?php  echo base_url().'admin'?>";
                }
                else
                {
                    alert('Aborted');
                }
            }
        })
    }
   
}
</script>