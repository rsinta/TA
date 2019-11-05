<html>
<head>
<meta charset="utf-8">
<title>Forget Password</title>
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
       <h1>TOKO LINTANG</h1>
    </div>

    <!-- Login Form -->

      <input onchange="cek()" type="email" id="email" class="form-control" name="email" placeholder="Email" style="margin-bottom: 6px;width: 85%;margin-left: 34px;
" >
      <input readonly type="text" id="pertanyaan" class="fadeIn second" name="pertanyaan" placeholder="PERTANYAAN" >
      <input onchange="cekjawaban()"type="text" id="jawaban" class="fadeIn third" name="jawaban" placeholder="JAWABAN" style="margin-bottom : 20px;">
      <div id="resetpassword">
      
      </div>
  </div>
   
</div>

</body>
</html>
<script>

function cek()
{
    var email = $('#email').val();
    $.ajax({
        url  :"<?php echo base_url('user/lupapassword');?>",
        type : 'POST',
        data : {
            email : email
        },
        success : function(data)
        {
            if(data)
            {
                data = $.parseJSON(data);
                document.getElementById('pertanyaan').value=data['pertanyaan'] ; 
            }
        }
    })
}

 function cekjawaban()
 {
   var email = $('#email').val();
   var pertanyaan = $('#pertanyaan').val();
   var jawaban = $('#jawaban').val();
   var regex = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
    if (!regex.test(email))
    {
       alert('Format email salah')
    }
    else
    {
      $.ajax({
        url  :"<?php echo base_url('user/reset');?>",
        type : 'POST',
        data : {
          email :email,
          pertanyaan :pertanyaan,
          jawaban :jawaban 
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
     
 }

 function resetpassword()
 {
    var email = $('#email').val();
    var passbaru = $('#passbaru').val();
    if(email=="" || passbaru=="")
    {
        alert('Harus Lengkap');
    }
    else
    {
        $.ajax({
            url  :"<?php echo base_url('user/resetpass');?>",
            type : 'POST',
            data : {
            email :email,
            passbaru : passbaru
            },
            success : function(dd)
            {
                if(dd==1)
                {
                    alert('Succes');
                    window.location="<?php  echo base_url().'auth/loginuser'?>";
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