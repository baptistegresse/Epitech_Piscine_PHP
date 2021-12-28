<?php

/*
** Transformation of several arrays to a map
*/

function my_create_map(...$arrays)
{
    $array_map = [];

    foreach($arrays as $value)
        {
            if ($value == NULL || count($value) != 2)
                {
                    echo("The given arrays aren't good.\n");
                    return (NULL);
                }
            $array_map[$value[0]] = $value[1]; // ==> objectn[0], objectn[1]
        }

    return ($array_map);
}


$object1 = array("pi", 3.14);
$object2 = array("answer", 42);
$object3 = array("trois", "trois");

var_dump(my_create_map($object1, $object2, $object3));

?>
