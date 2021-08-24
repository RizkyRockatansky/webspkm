<?php

header("Content-type:application/json");

$servername = "localhost";
$username = "root";
$password = "";

try {
  $connection = new PDO("mysql:host=$servername;dbname=pjkl", $username, $password);
  // set the PDO error mode to exception
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  //echo "Connected successfully";
}catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

	//data
	$user_id = $_POST['id_mhs'] ?? '';

	$response = [];//data response

	//cek username didalam database
	$userQuery = $connection->prepare("SELECT * FROM  `tb_hasil_kuisioner` LEFT JOIN `tb_kuisioner` ON `tb_hasil_kuisioner`.`id_kuis` = `tb_kuisioner`.`id_kuis` where `id_mhs` = :id_mhs");
	$userQuery->execute(array(":id_mhs" => $user_id));

		while($row = $userQuery->fetch(PDO::FETCH_ASSOC)){
			$response[] = [
                'id_mhs' => $row['id_mhs'],
                'id_kuis' => $row['id_kuis'],
				'pertanyaan' => $row['pertanyaan'],
                'jawaban_persepsi' => $row['jawaban_persepsi'],
				'jawaban_harapan' => $row['jawaban_harapan']
			];
		}


	//data json
	$json = json_encode($response, JSON_PRETTY_PRINT);

	echo $json;	


?>
