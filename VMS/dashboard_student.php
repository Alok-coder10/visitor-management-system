<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'student') {
    header("Location: login.php?error=Please+login+as+student");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com">
  </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .dashboard {
            max-width: 800px;
            margin: auto;
            background: white;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .card {
            display: flex;
            align-items: center;
            border: 1px solid #e2e2e2;
            border-radius: 5px;
            margin-bottom: 20px;
            padding: 15px;
        }
        .image {
            background-color: #ff7f50;
            width: 100px;
            height: 100px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 5px;
            color: white;
            font-size: 24px;
            margin-right: 20px;
        }
        .info {
            flex: 1;
        }
        .info p {
            margin: 5px 0;
        }
        .info h1 {
            font-size: 20px;
            color: #333;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        .status {
            border: 1px solid #e2e2e2;
            border-radius: 5px;
            padding: 15px;
            background-color: #f0f8ff;
        }
        .status h3 {
            margin: 0 0 10px;
            color: #333;
        }
        .status-box {
            background-color: #7a68a5;
            color: white;
            padding: 10px;
            text-align: center;
            border-radius: 5px;
            font-weight: bold;
        }
    </style>
</head>

<body>
<?php
    // Set QRid to a fixed value
    $qrId = $_SESSION['username'];

    // Generate QR code image URL using a public API (https://api.qrserver.com/v1/create-qr-code/)
    $qrCodeUrl = "https://api.qrserver.com/v1/create-qr-code/?size=100x100&data=" . urlencode($qrId);
  ?>
  <?php
  include 'db.php';
  $userId = $_SESSION['user_id'];
// Get visitor ID
$sqlfors = "SELECT student_id from user where student_id = '$userId'";
// $stmt = $conn->prepare($sqlforv);
// $stmt->bind_param("s", $userId);
// $stmt->execute();
$results = mysqli_query($conn, $sqlfors);
if (mysqli_num_rows($results) > 0) {
    $rowv = mysqli_fetch_assoc($results);
}
$student = $rowv['student_id'];
// Prepare SQL to get the latest request
$sql = "SELECT * FROM requests WHERE professional_id = '$student' order by request_id desc";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $rows = mysqli_fetch_assoc($result);
}
else{
    $rows['status'] = 'no request';
}
$status = $rows['status'];
// $stmt = $conn->prepare($sql);
// $stmt->bind_param("s", $userId);
// $stmt->execute();
// $result = $stmt->get_result();

// $requestStatus = "No request found";
// if ($row = $result->fetch_assoc()) {
//     $requestStatus = ucfirst($row['status']);
// }
// $stmt->close();
// $conn->close();
?>
    <div class="dashboard">
    <h2>Student Profile</h2>
        <div class="card">
            <div class="image">
            <img alt="QR code image generated" class=" " height="100" src="<?php echo $qrCodeUrl; ?>" width="100"/>
            </div>
            <div class="info">
            <p>User ID: <?php echo htmlspecialchars($_SESSION['user_id']); ?></p>
            <h1>Username: <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
                
            </div>
            <a href="logout.php">Logout</a>
        </div>
        <div class="status">
            <h3>Status of Current Visit</h3>
            <div class="status-box">
                <span>
                    <?php echo "$status"; ?>
                </span>
            </div>
        </div>
    </div>
</body>
</html>
