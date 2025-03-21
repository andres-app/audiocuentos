<?php
header('Content-Type: application/json');

require_once 'db_config.php'; // Importa la configuración de la base de datos

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    echo json_encode(["error" => "ID de audiocuento inválido"]);
    exit();
}

$id = intval($_GET['id']);
$sql = "SELECT title, author, description, cover, audio FROM audiocuentos WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["error" => "Audiocuento no encontrado"]);
}

$stmt->close();
$conn->close();
?>
