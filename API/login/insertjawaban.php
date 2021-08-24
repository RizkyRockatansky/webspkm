<?php
include 'connection.php';

if($_POST){

    $id_mahasiswa = $_POST['id_mahasiswa'] ?? '';
    $id_kuis = $_POST['id_kuis'] ?? '';
	$id_periode = $_POST['id_periode'] ?? '';
	$jawaban_persepsi = $_POST['jawaban_persepsi'] ?? '';
	$jawaban_harapan = $_POST['jawaban_harapan'] ?? '';

    $response = []; 

    $userQuery = $connection->prepare("SELECT * FROM hasil_kuisioner where nim = ?");
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
				'id' => $query['id_mahasiswa'],
				'nim' => $query['nim'],
				'nama' => $query['nama'],
				'email'=> $query['email'],
				'role'=> $query['role']
               

			];
		}else{
			$response['status'] = false;
			$response['message'] = "Maaf, Password anda salah";
		}
	}

	//data json
	$json = json_encode($response, JSON_PRETTY_PRINT);

	echo $json;

	// SELECT id_hasil, tb_mahasiswa.id_mhs, tb_periode.id_periode, tb_kuisioner.id_kuis, jawaban_persepsi, jawaban_harapan  FROM tb_hasil_kuisioner JOIN tb_mahasiswa ON tb_mahasiswa.id_mhs=tb_hasil_kuisioner.id_mhs JOIN tb_periode ON tb_periode.id_periode=tb_hasil_kuisioner.id_periode JOIN tb_kuisioner ON tb_kuisioner.id_kuis=tb_hasil_kuisioner.id_kuis;
	
}

?>