<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $pass_id = $_POST['pass_id'];

    $sql = "UPDATE passes SET exit_time = NOW(), status = 'expired' WHERE id = '$pass_id'";
    if (mysqli_query($conn, $sql)) {
        echo "✅ Visitor marked as checked-out successfully.";
    } else {
        echo "❌ Error updating record.";
    }
}
?>
