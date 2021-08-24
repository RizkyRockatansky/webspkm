<?php

include 'connection.php';

if($_POST){
$id_mahasiswa = $_POST['id_mahasiswa'] ?? '';
$id_periode = $_POST['id_periode'] ?? '';
$id_kuis = $_POST['id_kuis'] ?? '';
$jawaban_persepsi = $_POST['jawaban_persepsi'] ?? '';
$jawaban_harapan = $_POST['jawaban_harapan'] ?? '';
// $created_at = $_POST['created_at'];

$response = [];


$query = $connection->prepare("INSERT INTO `tb_hasil_kuisioner`(id_mahasiswa, id_periode, id_kuis, jawaban_persepsi, jawaban_harapan)
VALUES(:id_mahasiswa, :id_periode, :id_kuis, :jawaban_persepsi, :jawaban_harapan) ");



if ($query->execute(array(":id_mahasiswa"=>$id_mahasiswa, ":id_periode"=>$id_periode,
 ":id_kuis"=>$id_kuis,":jawaban_persepsi"=>$jawaban_persepsi,":jawaban_harapan"=> $jawaban_harapan))){

    $response['success'] = true;
    $response['message'] = "successfully";
}else{

    $response['success'] = false;
    $response['message'] = "Fail";
}


echo json_encode($response, JSON_PRETTY_PRINT);

}
?>