<?php

function my_swap(&$a, &$b) {
    $c = $a;
    $a = $b;
    $b = $c;
}

$res1 = "World";
$res2 = "Hello";

echo($res1." ".$res2."\n");

my_swap($res1, $res2);

echo($res1." ".$res2);
