<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

if ($data && isset($data->id)) {
    $stmt = $conn->prepare("UPDATE patients SET name=?, birth_date=?, phone=? WHERE id=?");
    $stmt->bind_param("sssi", $data->name, $data->birth_date, $data->phone, $data->id);
    $stmt->execute();

    echo json_encode(["status" => "success"]);
}
?>
