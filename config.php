<?php

$host = "191.252.1.143";           
$user = "douglas";      
$pass = "Douglas193";   
$dbname = "bd_servico"; 
$port = 3306;           



mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try { 
    $conn = new mysqli($host, $user, $pass, $dbname, $port);
    if ($conn->connect_error) {
        throw new Exception("Falha na conexão: " . $conn->connect_error);
    }
} catch (Exception $e) {
    error_log("Erro de conexão com o banco: " . $e->getMessage());
    
    header("Content-Type: application/json");
    echo json_encode(["error" => "Falha na conexão com o banco", "details" => $e->getMessage()]);
    exit;
}
?>
