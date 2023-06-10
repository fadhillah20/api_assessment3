<?php
require_once 'koneksi.php';
$id             = $_POST['id'];
$namapelatihan  = $_POST['namapelatihan'];
$namapeserta    = $_POST['namapeserta'];
$tanggalmulai    = $_POST['tanggalmulai'];
$tanggalselesai    = $_POST['tanggalselesai'];

$sql = "UPDATE pelatihan SET namapelatihan = '$namapelatihan', namapeserta = '$namapeserta', tanggalmulai = '$tanggalmulai', tanggalselesai = '$tanggalselesai' WHERE id = '$id'";


echo $sql;
mysqli_query($conn, $sql);
header("location: http://localhost/api_assement3/ui.php");