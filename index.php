<?php
require_once 'koneksi.php';

header("Access-Control-Allow-Origin: *");
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE');
header('Content-Type: application/json');

$req_type = $_SERVER['REQUEST_METHOD'];

if($req_type == "GET"){

    global $conn;
    $query = $conn->query("SELECT * FROM pelatihan");            
    while($row=mysqli_fetch_object($query))
    {
        $data[] =$row;
    }
    echo json_encode($data);
}

if($req_type == "POST"){
    $namapelatihan  = $_POST['namapelatihan'];
    $namapeserta    = $_POST['namapeserta'];
    $tanggalmulai    = $_POST['tanggalmulai'];
    $tanggalselesai    = $_POST['tanggalselesai'];

    global $conn;
    $sql = "INSERT INTO pelatihan(namapelatihan, namapeserta, tanggalmulai, tanggalselesai) VALUES('$namapelatihan', '$namapeserta', '$tanggalmulai', '$tanggalselesai')";    
    $query = $conn->query($sql);
  
    if($query){
        header("HTTP/1.1 201 Created");
        $data = array("code" => 200, "response" => $sql);
    }
    else{
        header("HTTP/1.1 500 Internal Server Error");
        $data = array("code" => 200, "response" => $sql);
    }
    
    
    echo json_encode($data);
}

if($req_type == "PUT"){
    parse_str(file_get_contents('php://input'), $value);
    
    $id     = $value['id'];
    $namapelatihan = $value['namapelatihan'];
    $namapeserta = $value['namapeserta'];
    $tanggalmulai = $value['tanggalmulai'];
    $tanggalselesai = $value['tanggalselesai'];
    
    global $conn;
    $sql = "UPDATE pelatihan SET namapelatihan = '$namapelatihan', namapeserta = '$namapeserta', tanggalmulai = '$tanggalmulai', tanggalselesai = '$tanggalselesai' WHERE id = '$id'";
    $query = $conn->query($sql);

    if($query){
        header("HTTP/1.1 201 Created");
        $data = array("code" => 200, "response" => $sql);
    }
    else{
        header("HTTP/1.1 500 Internal Server Error");
        $data = array("code" => 200, "response" => $sql);
    }
    
    
    echo json_encode($data);
}


if($req_type == "PATCH"){
    parse_str(file_get_contents('php://input'), $value);
    
    $id     = $value['id'];
    $namapelatihan = $value['namapelatihan'];
    $namapeserta = $value['namapeserta'];
    $tanggalmulai = $value['tanggalmulai'];
    $tanggalselesai = $value['tanggalselesai'];

    global $conn;
    $sql = "UPDATE pelatihan SET namapelatihan = '$namapelatihan', namapeserta = '$namapeserta', tanggalmulai = '$tanggalmulai', tanggalselesai = '$tanggalselesai' WHERE id = '$id'";
    $query = $conn->query($sql);

    if($query){
        header("HTTP/1.1 201 Created");
        $data = array("code" => 200, "response" => $sql);
    }
    else{
        header("HTTP/1.1 500 Internal Server Error");
        $data = array("code" => 200, "response" => $sql);
    }
    
   
    echo json_encode($data);
}

if($req_type == "DELETE"){
    parse_str(file_get_contents('php://input'), $value);

    $id     = $value['id'];
 
    global $conn;
    $sql = "DELETE FROM pelatihan WHERE id = '$id'";
    $query = $conn->query($sql);


    if($query){
        header("HTTP/1.1 201 Created");
        $data = array("code" => 200, "response" => $sql);
    }
    else{
        header("HTTP/1.1 500 Internal Server Error");
        $data = array("code" => 200, "response" => $sql);
    }
    
   
    echo json_encode($data);
}



