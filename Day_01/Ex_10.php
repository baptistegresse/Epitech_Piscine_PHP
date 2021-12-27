<?php

function my_get_args(...$var) {
    $temp = [];
    foreach($var as $k => $v) {
        array_push($temp, $v);
    }
    return $temp;
}

var_dump(my_get_args(3, 4, 5));
