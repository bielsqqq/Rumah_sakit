<?php
require 'db.php';

$data = json_decode(file_get_contents("php://input"));

if ($data) {
    $stmt = $conn->prepare("INSERT INTO patients (name, birth_date, phone) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $data->name, $data->birth_date, $data->phone);
    $stmt->execute();

    echo json_encode(["status" => "success", "id" => $stmt->insert_id]);
}
?>
