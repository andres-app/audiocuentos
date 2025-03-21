<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$database = "audiocuentos_db";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die(json_encode(["error" => "Error de conexión a la base de datos: " . $conn->connect_error]));
}

$sql = "SELECT id, title, author, cover FROM audiocuentos";
$result = $conn->query($sql);

$audiocuentos = [];
while ($row = $result->fetch_assoc()) {
    $audiocuentos[] = $row;
}

echo json_encode($audiocuentos);

$conn->close();
?>
