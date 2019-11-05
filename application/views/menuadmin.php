<ul id="sidebarnav" class="in">
                    <li class="sidebar_nav">
                        <a  onclick="page('2')"href="#" style="color : white"><i style="color:white;" class="fa fa-dashboard"></i>
                        <span class="hide-menu"> Point Of Sale</span>
                        </a>
                    </li>
                    <li class="sidebar_nav">
                        <a  onclick="page('3')" href="#" style="color : white"><i style="color:white;" class="fa fa-desktop"></i>
                        <span class="hide-menu"> Kategori Barang</span>
                        </a>
                    </li>
                    <li class="sidebar_nav">
                        <a  onclick="page('4')" href="#" style="color : white"><i style="color:white;" class="fa fa-bar-chart-o"></i>
                        <span class="hide-menu"> Data Barang</span>
                        </a>
                    </li>
                    <li class="sidebar_nav">
                        <a  onclick="page('12')" href="#" style="color : white"><i style="color:white;" class="fa fa fa-address-book" style="color:white;"></i>
                        <span class="hide-menu"> Data Member</span>
                        </a>
                    </li>
                    <li class="sidebar_nav">
                        <a  onclick="page('6')" href="#" style="color : white"><i style="color:white;" class="fa fa fa-address-book"></i>
                        <span class="hide-menu"> Data Supliyer</span>
                        </a>
                    </li>
                    <li data-toggle="collapse" data-target="#menu">
                    <a href="#" style="color : white"><i style="color:white;" class="fa fa fa-credit-card"></i>
                    <span class="hide-menu dropdown-toggle "> Transaksi</span>
                    </li>
                                        
        </ul>

  <div id="menu" class="collapse" style="background-color:#1c2128; list-style:none; padding-left:40px; ">
                    <li class="sidebar_nav sidebarnew" style="padding:10px; ">
                        <a  onclick="page('7')" href="#" style="color : white">
                        <span class="hide-menu"> Transaksi Online</span>
                        </a>
                    </li>
                    <li class="sidebar_nav sidebarnew" style="padding:10px;">
                        <a  onclick="page('8')" href="#" style="color : white">
                        <span class="hide-menu"> Transaksi Offline</span>
                        </a>
                    </li>
                    <li class="sidebar_nav sidebarnew" style="padding:10px;">
                        <a  onclick="page('9')" href="#" style="color : white">
                        <span class="hide-menu"> Pembelian Barang</span>
                        </a>
                    </li>
                    <li class="sidebar_nav sidebarnew" style="padding:10px;">
                        <a  onclick="page('10')" href="#" style="color : white">
                        <span class="hide-menu">Laporan Online</span></a>
                    </li>
                    <li class="sidebar_nav sidebarnew" style="padding:10px;">
                        <a  onclick="page('11')" href="#" style="color : white">
                        <span class="hide-menu">Laporan Offline</span>
                        </a>
                    </li>
                    <li class="sidebar_nav sidebarnew" style="padding:10px;">
                        <a href="<?php echo base_url().'transaksi/allpdf'?>" target="_blank" style="color : white">
                        <span class="hide-menu">Cetak Laporan</span>
                        </a>
                    </li>
                    <li class="sidebar_nav sidebarnew" style="padding:10px;">
                        <a href="<?php echo base_url().'transaksi/laporanbarang'?>" target="_blank" style="color : white">
                        <span class="hide-menu">Cetak Barang</span>
                        </a>
                    </li>
</div>

<style>
.sidebarnew{
    font-size: 14px;
        font-weight: 400;
}
</style>
                            
                            	