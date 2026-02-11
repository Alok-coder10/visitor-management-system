<?php
include 'db.php';

$total_requests = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM requests"))['total'];
$approved_requests = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as approved FROM requests WHERE status='approved'"))['approved'];
$rejected_requests = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as rejected FROM requests WHERE status='rejected'"))['rejected'];

echo json_encode([
    'total_requests' => $total_requests,
    'approved_requests' => $approved_requests,
    'rejected_requests' => $rejected_requests
]);
?>
