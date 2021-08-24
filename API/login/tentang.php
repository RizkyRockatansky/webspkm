<?php

$conn = mysqli_connect('localhost', 'root', '', 'pjkl');


mysqli_set_charset($conn, 'utf8');
$query = mysqli_query($conn, 'SELECT * FROM tb_tentang');
while($row = mysqli_fetch_assoc($query)) {
	$data[] = $row;
}
			
$json = json_encode($data, JSON_PRETTY_PRINT);
echo $json;


?>