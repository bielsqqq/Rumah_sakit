<?php
require 'db.php';

$sql = "SELECT id, name, birth_date, phone FROM patients ORDER BY id DESC";
$result = $conn->query($sql);

$patients = [];
while ($row = $result->fetch_assoc()) {
    $patients[] = $row;
}

header('Content-Type: application/json');
echo json_encode($patients);
?>
