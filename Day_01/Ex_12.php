<?php

function	look_and_say($laf) {

	$result = "";
	$repeat = $laf[0];
	$times = 1;

	if (strlen($laf) - 1 == 0)
		$laf = "a";
	else
		$laf = substr($laf, 1, strlen($laf)-1) . "a";
	foreach (str_split($laf) as $actual) {
		if ($actual != $repeat) {
			$result = $result . $times . $repeat;
			$times = 1;
			$repeat = $actual;
		} else {
			$times += 1;
		}
	}
	return $result;
}

function	sequence($nbr) {
	$laf = "1";
	for ($i = 0; $i <= $nbr; $i++) {
		echo $laf . "\n";
		$laf = look_and_say($laf);
	}
}

sequence(5);
sequence(3);
sequence(0);
sequence(14);
