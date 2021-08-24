<?php
include 'connection.php';

if($_POST){

    $nim = $_POST['nim'] ?? '';
    $password = $_POST['password'] ?? '';

    $response = []; 

    $userQuery = $connection->prepare("SELECT * FROM tb_mahasiswa where nim = ?");
    $userQuery->execute(array($nim));
    $query = $userQuery->fetch();

    if ($userQuery->rowCount() == 0) {
		$response['status'] = false;
		$response['message'] = " Maaf, NIM Tersebut Tidak Terdaftar";
	} else {
		//ambil password di db

		$passwordDB = $query['password'];

		if (strcmp(($password), $passwordDB) === 0) {
			$response['status'] = true;
			$response['message'] = "Login Berhasil";
			$response['data'] = [
				'id_mhs' => $query['id_mhs'],
				'nim' => $query['nim'],
				'nama_mhs' => $query['nama_mhs'],
				'email'=> $query['email'],
               

			];
		}else{
			$response['status'] = false;
			$response['message'] = "Maaf, Password anda salah";
		}
	}

	//data json
	$json = json_encode($response, JSON_PRETTY_PRINT);

	echo $json;
	
}

?>