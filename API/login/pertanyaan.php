<?php



$conn = mysqli_connect('localhost', 'root', '');


mysqli_select_db($conn,  'db_aspikepumas');

$id_mahasiswa = $_POST['id_mahasiswa'];
$id_periode = $_POST['id_periode'];
$id_kuis = $_POST['id_kuis'];
$jawaban_persepsi = $_POST['jawaban_presepsi'];
$jawaban_harapan = $_POST['jawaban_harapan'];

$qry="INSERT INTO 'tb_hasil_kuisioner'('id_hasil', 'id_mahasiswa','id_periode', 'id_kuis', 'jawaban_presepsi','jawaban_harapan') VALUES
(NULL, '$id_mahasiswa', '$id_periode'. '$id_kuis', '$jawaban_persepsi', '$jawaban_harapan')";

mysqli_query($conn, $qry);

echo json_encode(array('response'=>"Data terekam"));

?>