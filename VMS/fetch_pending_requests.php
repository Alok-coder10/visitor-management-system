
<?php
include 'db.php';

$sql = "SELECT * FROM requests WHERE status = 'pending'";
$result = mysqli_query($conn, $sql);

$requests = [];
while ($row = mysqli_fetch_assoc($result)) {
    $requests[] = $row;
}

echo json_encode(['requests' => $requests]);
?>
