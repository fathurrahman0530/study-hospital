<?php
include "../config/db.php";

$data     = json_decode(file_get_contents("php://input"));
$username = $data->username;
$password = sha1($data->password);

$query    = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

$sql      = $conn->query($query);
$result   = $sql->fetch(PDO::FETCH_ASSOC);
$respons  = null;

if ($result != false) {
  $idPasien     = $result['id_pasien'];
  $queryPasien  = "SELECT * FROM pasien WHERE id_pasien = '$idPasien'";
  $resultPasien = $conn->query($queryPasien)->fetch(PDO::FETCH_ASSOC);
  $resultPasien = ($resultPasien != false) ? $resultPasien : null;
  $respons['message']           = "Selamat Datang " . $result['username'];
  $respons['user']              = $result;
  $respons['user']['id_pasien'] = $resultPasien;
} else {
  http_response_code(401);
  $respons['message'] = "Username atau Password salah..!!";
  $respons['user']    = null;
}

echo json_encode();
