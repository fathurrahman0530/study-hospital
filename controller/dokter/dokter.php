<?php

include "../../config/db.php";

$nama   = $_GET['nama'] ?? null;
$query  = "SELECT * FROM dokter";

if ($nama != null) {
  $query = $query . " WHERE nama LIKE '%$nama%'";
}

$sql    = $conn->query($query);

echo json_encode($sql->fetchAll(PDO::FETCH_ASSOC));