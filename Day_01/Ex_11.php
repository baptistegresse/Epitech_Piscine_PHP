<?php

function my_print_args(...$var) {
    print_r($var."\n");
}
$input = fgets(STDIN);
my_print_args($input);