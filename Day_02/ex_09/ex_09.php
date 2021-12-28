<?php

function combine($num, $arr, $max, $i)
{
  if ($num == $max && $i >= 2)
    return $i;
  while (!empty($arr))
    {
      $res = combine($num + array_shift($arr), $arr, $max, $i + 1);
      if ($res >= 2)
	return $res;
    }
  return 0;
}

function check_array_sum($numbers)
{
  if (empty($numbers))
    return (false);
  $max = max($numbers);
  while (!empty($numbers))
    {
      if (combine(array_shift($numbers), $numbers, $max, 1) >= 2)
	return (true);
    }
  return (false);
}

$arr =  [4, 6, 23, 10, 1, 3];
$arr2 =  [4, 6, 22, 10, 1, 3];

var_dump(check_array_sum($arr));
var_dump(check_array_sum($arr2));

?>