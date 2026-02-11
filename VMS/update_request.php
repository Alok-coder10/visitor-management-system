<?php
include 'db.php';

if (isset($_POST['request_id']) && isset($_POST['action'])) {
    $request_id = $_POST['request_id'];
    $action = $_POST['action'];

    // Update request status
    if ($action == 'approve') {
        $status = 'approved';
        // Assuming 'professional_id' is stored in 'requests' table
        $request_query = mysqli_query($conn, "SELECT * FROM requests WHERE request_id = '$request_id'");
        $request_data = mysqli_fetch_assoc($request_query);
        $visitor_id = $request_data['professional_id']; // or the correct field
        $direction = $request_data['direction'];

        // Add to 'passes' table
        $insert_pass = mysqli_query($conn, "INSERT INTO passes (proffesional_id, date_time, direction) VALUES ('$visitor_id', CURRENT_TIMESTAMP, '$direction')");
    } else {
        $status = 'rejected';
    }

    // Update the status of the request
    $update_status = mysqli_query($conn, "UPDATE requests SET status = '$status' WHERE request_id = '$request_id'");

    if ($update_status) {
        echo "Request status updated successfully.";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
