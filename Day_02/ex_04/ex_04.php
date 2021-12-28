<?php

function my_password_hash($password)
{
  $salt = random_bytes(16);
  return (["hash" => md5($salt.$password), "salt" => $salt]);
}

function my_password_verify($password, $salt, $hash)
{
  return (md5($salt.$password) == $hash);
}


$salt = '10';
$arr = my_password_hash("hello");
$arr2 = my_password_hash("hello");

var_dump(my_password_hash("hello"));
var_dump($arr["salt"] == $arr2["salt"]);
var_dump(my_password_verify("hello",$arr["salt"], $arr["hash"]));
var_dump(my_password_verify("hello",$arr["salt"], "toto"));
var_dump(my_password_verify("zog",$arr["salt"], $arr["hash"]));

?>
