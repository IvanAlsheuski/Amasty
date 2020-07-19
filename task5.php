<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test_com";
$link = mysqli_connect($servername, $username, $password, $dbname);
echo 'First request'."<br>";
$wer1 = mysqli_query($link,"SELECT `fullname`, 100 + (SELECT sum(`amount`) FROM `transactions` WHERE `to_person_id` = `persons`.`id`) - (SELECT sum(`amount`) FROM `transactions` WHERE `from_person_id` = `persons`.`id`) FROM `persons` ");
while($row = mysqli_fetch_row($wer1)){
echo "Name: ". $row[0].",  Balance:  " ;
if(is_null($row[1])){
	echo '100';
}else{
	echo $row[1];
} 
echo "<br>";
}

echo 'Second request'."<br>";
$wer3 = mysqli_query($link,"SELECT `cities`.`name` AS city_name,  (SELECT COUNT(`transactions`.`amount`) FROM `transactions` WHERE `transactions`.`from_person_id` = `persons`.`id` OR `transactions`.`to_person_id` = `persons`.`id`) AS transactions_count FROM `persons` INNER JOIN `cities` ON `cities`.`id` = `persons`.`city_id`GROUP BY `cities`.`name` ORDER BY transactions_count DESC LIMIT 1");

while($row1 = mysqli_fetch_row($wer3))
 	{ echo "City: ". $row1[0]; echo "<br>";
}
echo 'Third request'."<br>";
$wer4 = mysqli_query($link,"SELECT `transactions`.`transaction_id`, `transactions`.`from_person_id`, `transactions`.`to_person_id`, `transactions`.`amount` FROM `transactions` LEFT JOIN `persons` AS p1 ON p1.`id` = `transactions`.`from_person_id` LEFT JOIN `persons` AS p2 ON p2.`id` = `transactions`.`to_person_id` WHERE p1.`city_id`=p2.`city_id`");

while($row2 = mysqli_fetch_row($wer4)){
echo "Transaction: transaction id:". $row2[0]."  from person id:  ".$row2[1]."  to person id:  ".$row2[2]."  amount:  ".$row2[3]; echo "<br>";
}
?>
