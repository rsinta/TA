<html style="overflow-y: hidden;">
<head>
<meta charset="utf-8">
<title>Djono Silver</title>
<link href="<?php echo base_url().'assets/css/' ?>logincss.css" rel='stylesheet' type='text/css' />
<meta name="viewport" content="width=device-width, initial-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--webfonts-->
<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700|Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
<!--//webfonts-->
<script>
	function myFunction()
		{
			alert("Thanks for login");
		}
</script>
</head>
<body style="overflow-x:hidden; overflow-y:hidden;">
<div class="wrapper fadeInDown">
    
  <div id="formContent" style="margin-top: -100px;">
    <!-- Tabs Titles -->
    <!-- Icon -->
    <div class="fadeIn first">
       <h1>ADMIN LOGIN</h1>
    </div>

    <!-- Login Form -->
	<?php echo form_open('auth/login'); ?>

      <input type="text" id="login" class="fadeIn second" name="username" placeholder="id user">
      <input  type="password" id="password" class="fadeIn third" name="password" placeholder="password" style="
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
      <input type="submit" class="fadeIn fourth" name="submit" value="LOGIN" style="margin-bottom: 10px;"><br>
      <a class="underlineHover" href="<?php echo base_url().'auth/lupapasswordadminview'?>" style="color:white;">LUPA PASSWORD?</a>
    </form>
   

    <!-- Remind Passowrd -->
    <!-- <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
	</div> -->


  </div>	
</body>
</html>