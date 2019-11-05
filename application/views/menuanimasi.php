<style>
body {
    font-family: "Lato", sans-serif;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    transition: 0.5s;
}

.sidenav a {
	padding: 8px 8px 8px 10px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
</style>
</head>
<body>

<div id="mySidenav" class="sidenav">
	<img class="img-responsive" src="<?php echo $basepath?>img/logo.jpg"  href="javascript:void(0)" onclick="closeNav()" >
	<a href="../user/profil.php?page=1"  style="font-size: 2rem;"><span class="glyphicon glyphicon-user"></span> Profil</a>
	<a href="user/form_pemesanan.php?page=1"  style="font-size: 2rem;"><span class="glyphicon glyphicon-briefcase"></span> Pemesanan</a>
	<a href="/djonosilver/user/riwayat_pesanan.php"  style="font-size: 2rem;"><span class="glyphicon glyphicon-briefcase"></span> Riwayat Pesanan  </a>
</div>

<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
	$("#profil").attr("onclick","closeNav()");
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
	$("#profil").attr("onclick","openNav()");
}
</script>