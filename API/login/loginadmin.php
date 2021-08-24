<?php
include 'connection.php';

if($_POST){

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    $response = []; 

    $userQuery = $connection->prepare("SELECT * FROM tb_admin where email = ?");
    $userQuery->execute(array($email));
    $query = $userQuery->fetch();

    if ($userQuery->rowCount() == 0) {
		$response['status'] = false;
		$response['message'] = " Maaf, Email Tersebut Tidak Terdaftar";
	} else {
		//ambil password di db

		$passwordDB = $query['password'];

		if (strcmp(($password), $passwordDB) === 0) {
			$response['status'] = true;
			$response['message'] = "Login Berhasil";
			$response['data'] = [
				'id' => $query['id_admin'],
				'email' => $query['email'],
				'nama_admin' => $query['nama_admin']
			
               

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