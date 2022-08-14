<?php
include "../../config/db.php";

$response = null;

try {
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"));
    $nama = $data->nama;
    $hp = $data->hp;
    $email = $data->email;
    $query_pasien = "INSERT INTO pasien (nama, hp, email) VALUES (?, ?, ?)";
    $query_user   = "INSERT INTO user (username, password, id_pasien) VALUES (?, ?, ?)";
    $conn->beginTransaction();
    $stmt_pasien = $conn;
  }
} catch (\Throwable $th) {
  //throw $th;
}