<?php
$array = array("red", "blue", "green", "yellow", "lime", "magenta", "black","gold", "gray", "tomato");
for ($i = 0; $i <= 9;) {
	if ( $rand_keys = array_rand($array, 1) != $array[$i] ){
    $rand_keys = array_rand($array, 1);
    $color[] = $array[$rand_keys];
    $i++;
	}
}
for ($j = 0; $j <= 5; $j++) {
	for ($k = 0; $k <= 5; $k++) {
		$rand_keys = array_rand($array, 1);
		printf("<span style='color: $color[$rand_keys] '>$array[$rand_keys] </span>");
	}
	echo "<br>";
}

?>

