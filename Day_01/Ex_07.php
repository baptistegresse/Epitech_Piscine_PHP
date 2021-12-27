<?php

function get_angry_dog(int $nbr) {
    for($i = 0; $i < $nbr; $i++) {
        echo("woof\n");
    }
}

get_angry_dog(4);
