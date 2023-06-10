<?php
require_once 'koneksi.php';

$namapelatihan  = $_POST['namapelatihan'];
$namapeserta    = $_POST['namapeserta'];
$tanggalmulai    = $_POST['tanggalmulai'];
$tanggalselesai    = $_POST['tanggalselesai'];

$sql = "INSERT INTO pelatihan(namapelatihan, namapeserta, tanggalmulai, tanggalselesai) VALUES('$namapelatihan', '$namapeserta', '$tanggalmulai', '$tanggalselesai')"; 

echo $sql;
mysqli_query($conn, $sql);
header("location: http://localhost/api_assement3/ui.php");