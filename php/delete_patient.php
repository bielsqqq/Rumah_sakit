<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->id)) {
    $stmt = $conn->prepare("DELETE FROM patients WHERE id=?");
    $stmt->bind_param("i", $data->id);
    $stmt->execute();

    header('Content-Type: application/json');
    echo json_encode(["status" => "deleted"]);
}
?>
