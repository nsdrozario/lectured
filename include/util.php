<?php

function input_check($str) {
    return isset($str) && !empty($str);
}

function random_bignum($n) {
    $id_str = "";
    for ($i = 0; $i < $n; $i++) {
        $id_str = $id_str . random_int(0, 9);
    }
    return $id_str;
}

?>