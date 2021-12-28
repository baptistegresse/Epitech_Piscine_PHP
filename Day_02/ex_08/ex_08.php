<?php

function my_order_class_name(...$args)
{
    $result = [];
    foreach ($args as $arg)
    {
        $name = is_object($arg) ? get_class($arg) : gettype($arg); // Si $arg est un object alors get_class sinon gettype
        $add = false;
        for ($i = 0; $i < count($result) && !$add; ++$i)
        {
            if (strlen($result[$i][0]) == strlen($name))
            {
                if (!in_array($name, $result[$i]))
                    array_push($result[$i], $name);
                $add = true;
            }
        }
        if (!$add)
        {
            array_push($result, array($name));
        }
    }
    $result = array_reverse($result);
    usort($result, function($a, $b) {
        $d = strlen($a[0]) - strlen($b[0]);
        if ($d == 0) {
            $cmp = strcasecmp($a[0], $b[0]);
            return $cmp;
        }
        else {
            return ($d < 0 ? -1 : 1);
        }
    });
    foreach ($result as &$arr)
    {
        usort($arr, function($a, $b) {
            $d = strlen($a) - strlen($b);
            if ($d == 0) {
                $cmp = strcasecmp($a, $b);
                return $cmp;
            }
            else {
                return ($d < 0 ? -1 : 1);
            }
        });
    }
    return ($result);
}


// TESTING AND DEBUG
class Myclass {

}

class Zog {

}

$args = [
true,
76,
false,
12.5,
"Coucou !",
[1, 2, 3],
new MyClass(),
NULL
];

print_r(my_order_class_name(...$args));

$args = [
"ZOG",
new Zog(),
'z',
'o',
'g',
21,
42,
42.42,
NULL,
4242.4242,
[4, 2, 4, 2]
];

print_r(my_order_class_name(...$args));

?>

?>