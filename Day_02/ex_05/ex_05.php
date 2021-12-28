<?php

/*
** Adds an item in a map

*/

function my_add_elem_map($key, $value, $map)
{
  // Checking if the key exists or not
  if (array_key_exists($key, $map) == true)
    echo ("You have to give good parameters.\n");
  else
  {
    // Assignation of the value to the key in the map
    $map[$key] = $value;
  }
  return $map;
}

/*
** Modifies an item in a map
*/

function my_modify_elem_map($key, $value, $map)
{
  // Checking if the key exists or not
  if (array_key_exists($key, $map) == false)
    echo ("You have to give good parameters.\n");
  else
  {
    // Assignation of the value to the key in the map
    $map[$key] = $value;
  }
  return $map;
}

/*
** Deletes an item in a map
*/

function my_delete_elem_map($key, $map)
{
  // Checking if the key exists or not
  if (array_key_exists($key, $map) == false)
    echo ("You have to give good parameters.\n");
  else
  {
    // Deletion of the value in the key and the key in the map
    unset($map[$key]);
  }
  return $map;
}

/*
** Checks if the item is valid in a map
*/

function my_is_elem_valid($key, $value, $map)
{
  // Checking if the key exists or not and if the value in parameters is the
  // same than the value of the key in parameters in the map
  if (array_key_exists($key, $map) == false || $map[$key] != $value)
    echo ("You have to give good parameters.\n");
}

$map = array("un" => 1);
var_dump($map);
$map = my_add_elem_map("deux", 2, $map);
var_dump($map);
$map = my_modify_elem_map("deux", 3, $map);
var_dump($map);
$map = my_delete_elem_map("deux", $map);
var_dump($map);

?>
