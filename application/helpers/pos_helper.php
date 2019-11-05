<?php

function check_session()
{
    if(!isset($_SESSION['userdata']))
    {
        return false;
    }
    else
    {

       if(isset($_SESSION['userdata']->id_member))
       {
         $_SESSION['userdata']->level = 0;
       }
       if(isset($_SESSION['userdata']->id_user))
       {
        $_SESSION['userdata']->level = 1;
       }
       return true;
    }
  

}

function base_foto()
{
    return base_url('img/barang/');
}

function base_fotointf()
{
    return base_url('img/');
}

function base_fotobukti()
{
    return base_url('img/bukti_transaksi/');
}

function base_fotopemesanan()
{
    return base_url('img/pemesanan/');
}
function get_current_date()
{
    $CI= & get_instance();
    $date= $CI->db->query('Select NOW() as date')->row();
    return date('Ymd_His', strtotime($date->date));
}

?>
