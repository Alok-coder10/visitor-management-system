<?php
require_once 'db_connection.php';

$sql = "SELECT name, role, status, purpose, direction, visit_date, submitted, whom_to_visit_id 
        FROM requests 
        WHERE status IN ('approved', 'rejected') 
        ORDER BY updated_at DESC 
        LIMIT 5";

$result = $conn->query($sql);
$recent = [];

while ($row = $result->fetch_assoc()) {
    $recent[] = $row;
}

header('Content-Type: application/json');
echo json_encode(['recent' => $recent]);
