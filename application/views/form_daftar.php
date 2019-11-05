<html>
<head>
<meta charset="utf-8">
<title>POS - Point Of Sale</title>
<link href="<?php echo base_url().'assets/css/' ?>logincss.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-3.2.1.min.js"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script>
    function myFunction(){}
</script>
</head>

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
       <h1>Djono Silver</h1>
    </div>

    <!-- Login Form -->
	<?php echo form_open('auth/register'); ?>

      <input type="text" id="username" class="fadeIn second" name="username" placeholder="USERNAME">
      <select name="karyawan" id="idkaryawan"  style="
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
                        <option value="">PILIH ID KARYAWAN</option>
      </select>
      <input type="password" id="pass" class="fadeIn second" name="password" placeholder="PASSWORD" style="
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
      <input type="text" id="pertanyaan" class="fadeIn second" name="pertanyaan" placeholder="PERTANYAAN">
      <input type="text" id="jawaban" class="fadeIn third" name="jawaban" placeholder="JAWABAN" >
      <input type="submit" class="fadeIn fourth" name="daftar" value="DAFTAR">
    </form>
  </div>
</div>




	 
</body>
</html>
<script>
   $(document).ready(function () {
        $.getJSON("<?php echo base_url('auth/selectidkaryawan');?>", function (allkaryawan) {
            console.log(allkaryawan);
            if (allkaryawan) {	
                $.each(allkaryawan, function (key, value) {
                    $("#idkaryawan").append(
                        "<option value='" + value.id_karyawan + "'>" + value.nama + "</option>"
                    );
                });
            }
        });
    });
</script>