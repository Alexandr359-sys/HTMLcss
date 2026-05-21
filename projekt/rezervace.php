<?php
$host = "sql301.infinityfree.com";
$user = "if0_41961871";
$pass = "Tonymatoni420";
$dbname = "if0_41961871_kino_db";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Připojení selhalo: " . $conn->connect_error);
}

// Získání dat z POST požadavku
$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['email']) && isset($data['seats'])) {
    $email = $conn->real_escape_string($data['email']);
    $seats = $conn->real_escape_string(implode(", ", $data['seats']));

    $sql = "INSERT INTO rezervace (email, sedadla) VALUES ('$email', '$seats')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => $conn->error]);
    }
}

$conn->close();
?>