<?php

function replace_empty_by_one($arr) {
  $arr = array_replace($arr, array_fill_keys(array_keys($arr, ""), 1));
  return $arr;
}

function calculate_not_simp($a, $b, $ltr) {
  $returnArr = array();
  foreach ($a as $smallBloc) {
    $smallBlocParts = replace_empty_by_one(explode("$ltr^", $smallBloc));
    $size1 = count($smallBlocParts);
    foreach ($b as $smallBloc2) {
      $smallBloc2Parts = replace_empty_by_one(explode("$ltr^", $smallBloc2));
      $multiplication = array();
      array_push($multiplication, (intval($smallBlocParts[0]) * (intval($smallBloc2Parts[0]))));
      $size2 = count($smallBloc2Parts);
      if ($size1 > 1 || $size2 > 1) {
       $nb1 = ($size1 > 1 ? $smallBlocParts[1] : "0");
       $nb2 = ($size2 > 1 ? $smallBloc2Parts[1] : "0");
       array_push($multiplication, intval($nb1) + intval($nb2));
     } else {
       array_push($multiplication, 0);
     }
     array_push($returnArr, $multiplication);
   }
 }
 return $returnArr;
}

function add_entry_to_final($k, $v, $ltr) {
  $ret = "";
  if ($v == 1 && $k != 0) {
    $ret .= "";
  } elseif ($v == -1 && $k != 0) {
    $ret .= "-";
  } else {
    $ret .= strval($v);
  }

  if ($k == 0) {
    $ret .= "";
  } elseif ($k == 1) {
    $ret .= $ltr;
  } else {
    $ret .= "$ltr^" . $k;
  }
  return ($ret);
}

function simple_and_sort_exp($arr, $ltr) {
  $finalRes = "";
  $simplified = array();
  foreach ($arr as $value) {
    if (!isset($dict[strval($value[1])]))
      $dict[strval($value[1])] = 0;
    $dict[strval($value[1])] += $value[0];
  }
  krsort($dict);
  $len = count($dict);
  $i = 0;
  foreach ($dict as $k => $v) {
    if ($i == 0) {
      $finalRes .= add_entry_to_final($k, $v, $ltr);
    }
    else {
      if ($v > 0)
       $finalRes .= "+";
     $finalRes .= add_entry_to_final($k, $v, $ltr);
   }
   $i += 1;
 }
 return $finalRes;
}

function get_under_blocs($bloc) {
  $returnArr = array();
  $offset = 0;
  $begin = 0;
  while (preg_match("/\d[+-]/", $bloc, $matches, PREG_OFFSET_CAPTURE, $offset)) {
    $offset = $matches[0][1] + 1;
    preg_match("/[+-]/", $bloc, $matches, PREG_OFFSET_CAPTURE, $offset);
    array_push($returnArr, substr($bloc, $begin, $matches[0][1] - $begin));
    $begin = $matches[0][1];
  }
  array_push($returnArr, substr($bloc, $begin));
  return $returnArr;
}

function simplify_polynomial_expression($expr)
{
  $expr = substr($expr, 1, -1);
  $ltr = "x";
  if (preg_match("/[a-z]/", $expr, $matches)) {
    $ltr = $matches[0];
  }
  $expr = preg_replace("/$ltr([^\^])/", "$ltr^1$1", $expr);
  $blocs = explode(")(", $expr);
  $underbloc_a = get_under_blocs($blocs[0]);
  $underbloc_b = get_under_blocs($blocs[1]);
  return (simple_and_sort_exp(calculate_not_simp($underbloc_a, $underbloc_b, $ltr), $ltr));
}



var_dump(simplify_polynomial_expression("(1x^5-4x^2+3)(2x^2+3)"));
var_dump(simplify_polynomial_expression("(1x^3)(3x^10+2)"));
var_dump(simplify_polynomial_expression("(2x^2+4)(6x^3+3)"));
var_dump(simplify_polynomial_expression("(2x^3)(-3x^3-2)"));
var_dump(simplify_polynomial_expression("(1x^2-4)(2x^-2+1)"));
var_dump(simplify_polynomial_expression("(1x^3-3)(2x^2+1)"));
var_dump(simplify_polynomial_expression("(2x^0)(1)"));
var_dump(simplify_polynomial_expression("(-1y^10)(-1y^12)"));
var_dump(simplify_polynomial_expression("(-1p^1+3)(-1p^2-1p^2)"));
var_dump(simplify_polynomial_expression("(3x)(-7x^3+3)"));
?>