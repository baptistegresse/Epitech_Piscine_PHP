<?php

function print_array(...$my_array) {
    foreach($my_array as $k => $v) {
        print_r($v);
    }
}

$tab1 = [3, 3, 3, 3];
$tab2 = [4, 4, 4, 4];

print_array($tab1, $tab2);

