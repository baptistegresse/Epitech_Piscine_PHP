<?php

function my_create_continent($continentNameToAdd, &$worldMap)
{
  if (array_key_exists($continentNameToAdd, $worldMap) == true)
  {
    echo("Failure to create a continent.\n");
  }
  else
  {
      $worldMap[$continentNameToAdd] = array();
  }
}

function my_create_country($countryNameToAdd, $continentName, &$worldMap)
{
  if (array_key_exists($continentName, $worldMap) == false || array_key_exists($countryNameToAdd, $worldMap[$continentName]) == true)
    echo("Failure to create a country.\n");
  else
  {
      $worldMap[$continentName][$countryNameToAdd] = array();
  }
}

function my_create_city($cityNameToAdd, $postalCodeOfCityToAdd, $countryName, $continentName, &$worldMap)
{
  if (array_key_exists($continentName, $worldMap) == false || array_key_exists($countryName, $worldMap[$continentName]) == false ||
      array_key_exists($cityNameToAdd, $worldMap[$continentName][$countryName]) == true)
    echo("Failure to create a city.\n");
  else
  {
      $worldMap[$continentName][$countryName][$cityNameToAdd] = $postalCodeOfCityToAdd;
  }
}

function my_get_countries_of_continent($continentName, $worldMap)
{
  if (array_key_exists($continentName, $worldMap) == false)
  {
    echo ("Failure to get a continent.\n");
    return (NULL);
  }

  return ($worldMap[$continentName]);
}

function my_get_cities_of_country($countryName, $continentName, $worldMap)
{
  if (array_key_exists($continentName, $worldMap) == false || array_key_exists($countryName, $worldMap[$continentName]) == false )
  {
    echo ("Failure to get a country.\n");
  }

  return ($worldMap[$continentName][$countryName]);
}

function my_get_city_postal_code($cityName, $countryName, $continentName, $worldMap)
{
  if (array_key_exists($continentName, $worldMap) == false || array_key_exists($countryName, $worldMap[$continentName]) == false ||
      array_key_exists($cityName, $worldMap[$continentName][$countryName]) == false)
  {
    echo ("Failure to get a city.\n");
  }

  return ($worldMap[$continentName][$countryName][$cityName]);
}

$map = array();

my_create_continent("europe", $map);
var_dump($map);

my_create_country("france", "europe", $map);
my_create_country("espagne", "europe", $map);
var_dump($map);
my_create_city("marseille", "13000", "france", "europe", $map);
my_create_city("paris", "75000", "france", "europe", $map);
my_create_city("villejuif", "94800", "france", "europe", $map);
my_create_city("barcelone", "99999", "espagne", "europe", $map);
var_dump($map);

my_get_countries_of_continent("europe", $map);
my_get_cities_of_country("france", "europe", $map);
my_get_city_postal_code("marseille", "france", "europe", $map);
?>
