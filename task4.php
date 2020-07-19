<head>
	
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

</head>
<body>
	<br><br>
	<center>
		<form action="" method="post">
			<input type="text" class="raz" name="command" autofocus required>
			<input type="submit" name="button" value="Показать">
		</form>
	</center>
<br><br><br>
</body>
<?php
$check = $_POST['command']; 

include_once 'simple_html_dom.php' ;

$url = "https://terrikon.com/football/italy/championship/archive";
$urli = "https://terrikon.com";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$answer = curl_exec($ch);

$dom = new simple_html_dom();
$html = str_get_html($answer);
$list = $html->find(".tab dd  a");
$link_array = array();
foreach($list as $link){
    $href = $link->getAttribute('href');
    array_push($link_array, $href);
}

for ($j = 0; $j < count($link_array); $j++) {

	$urls = $urli . $link_array[$j];

	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $urls);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$answer = curl_exec($ch);

	$dom = new simple_html_dom();
	$html = str_get_html($answer);
	$list = $html->find(".id h1 ");
	foreach($list as $link => $value){
		echo $value->plaintext. '<br>' ;
	}	
		$list = $html->find(".tab tr");
		foreach($list as $link){
			
				$command = $link->find('a', 0);

				$place = $link->find('td', 0);

			if(strcasecmp($command->plaintext, $check) == 0) {
				echo $command->plaintext. '  '.$place->plaintext.'<br>' ;
			}		
		}
	}
?>
