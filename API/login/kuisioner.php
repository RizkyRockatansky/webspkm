<?php



$conn = mysqli_connect('localhost', 'root', '', 'db_aspikepumas3');


mysqli_set_charset($conn, 'utf8');
$query = mysqli_query($conn, 'SELECT * FROM tb_kuisioner LEFT JOIN tb_kategori ON tb_kuisioner.id_kategori=tb_kategori.id_kategori');
while($row = mysqli_fetch_assoc($query)) {
	$data[] = $row;
}
			
$json = json_encode($data, JSON_PRETTY_PRINT);
echo $json;


?>
