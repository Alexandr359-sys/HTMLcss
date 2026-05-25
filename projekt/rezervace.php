<?php

header('Content-Type: application/json; charset=utf-8');

$host = "sql301.infinityfree.com";
$dbname = "if0_41961871_kino_db";
$username = "if0_41961871";  
$password = "Tonymatoni420";     

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Chyba připojení k DB: " . $e->getMessage()]);
    exit;
}


$inputData = file_get_contents('php://input');
$data = json_decode($inputData, true);


if (!isset($data['email']) || !isset($data['seats']) || empty($data['seats'])) {
    echo json_encode(["status" => "error", "message" => "Chybí e-mail nebo vybraná sedadla."]);
    exit;
}

$email = filter_var($data['email'], FILTER_VALIDATE_EMAIL);
if (!$email) {
    echo json_encode(["status" => "error", "message" => "Neplatný formát e-mailu."]);
    exit;
}


$sedadla = implode(', ', $data['seats']);


try {
    $stmt = $pdo->prepare("INSERT INTO rezervace (email, sedadla) VALUES (:email, :sedadla)");
    $stmt->execute([
        ':email' => $email,
        ':sedadla' => $sedadla
    ]);

    
    echo json_encode(["status" => "success"]);
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Chyba zápisu do DB: " . $e->getMessage()]);
}
?>