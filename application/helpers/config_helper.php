<?php

function cart_config($id, $qty, $price, $name, $berat){
    $cart = array(
        'id'      => $id,
        'qty'     => $qty,
        'price'   => $price,
        'name'    => $name,
        'options' => array('berat' => $berat)
    );
    return $cart;
}

?>
