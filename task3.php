<?php
fwrite(STDOUT, "Enter data: ");
$string = trim(fgets(STDIN));
$numbers = explode(" ", $string);

foreach ($numbers as $testcase) {
    if (check_num($testcase) == true) {
    	$array[] =  (int)$testcase;
	}
}


function check_num($num){
    if (preg_match("#^(-[0-9]{1,}|[0-9]{1,})$#", $num)){
        return true;
    }else{
        return false;
    }
}
$array = array_unique($array);
sort($array);
for ($j = 0; $j < count($array); $j++) {
	echo $array[$j];
	echo " ";
}

?>