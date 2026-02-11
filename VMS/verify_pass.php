<!DOCTYPE html>
<html>

<head>
  <title>Verify Visitor Pass</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      padding: 30px;
      background: #f7f9fb;
    }

    .card {
      background: white;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px #ccc;
      width: 350px;
      margin: auto;
    }

    h2 {
      color: green;
      text-align: center;
    }

    button {
      background: green;
      color: white;
      padding: 10px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      width: 100%;
      margin-top: 10px;
    }

    button:hover {
      background: darkgreen;
    }

    .back-button {
      background: #007bff;
      margin-top: 20px;
    }

    .back-button:hover {
      background: #0056b3;
    }

    .message {
      text-align: center;
      margin-top: 20px;
      font-size: 1.2em;
      color: #333;
    }
  </style>
</head>

<body>

  <?php
  include 'db.php';

//   $code = $_GET['code'] ?? '';
//   // $code = ''; // For testing purposes, replace with actual QR code data
// // echo''. $code .'';
//   if (!$code) {
//     echo "❗ QR code data missing.";
//     exit;
//   }
$code = $_GET['code'] ?? '';
echo 'Code: ' . $code; // This will show you what value is being passed
if (!$code) {
    echo "❗ QR code data missing.";
    exit;
}

  $sqlu = "SELECT * FROM user WHERE username = '$code'";
  $resultu = mysqli_query($conn, $sqlu);

  if (mysqli_num_rows($resultu) > 0) {
    $rowu = mysqli_fetch_assoc($resultu);

    if ($rowu['role'] == 'visitor') {

      echo "
  <form method='POST' action='verify_pass.php?code=" . htmlspecialchars($code) . "'>
    
    <label for='purpose'>Purpose of Visit:</label>
    <input type='text' id='purpose' name='purpose' required><br><br>

    <label for='whom_to_visit_id'>whom to visit id:</label>
    <input type='text' id='whom_to_visit_id' name='whom_to_visit_id' required><br><br>

    <label for='direction'>Direction (In/Out):</label>
    <select id='direction' name='direction' required>
      <option value='in'>In</option>
      <option value='out'>Out</option>
    </select><br><br>

    <button type='submit'>Submit</button>
  </form>
";

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      // Capture the input values from the form
      $v_id = $rowu['visitor_id'];
      $who = $_POST['whom_to_visit_id'];
      $purpose = $_POST['purpose'] ?? '';
      $direction = $_POST['direction'] ?? '';
      
  
      // Sanitize inputs
      $purpose = mysqli_real_escape_string($conn, $purpose);
      $direction = mysqli_real_escape_string($conn, $direction);
      $who = mysqli_real_escape_string($conn, $who);
      $v_id = mysqli_real_escape_string($conn, $v_id);
  
      // Get the visitor's details (if not already done)
      $sqlv = "SELECT * FROM visitor WHERE visitor_id = '$v_id'";
      $resultv = mysqli_query($conn, $sqlv);
  
      if (mysqli_num_rows($resultv) > 0) {
          $rowv = mysqli_fetch_assoc($resultv);
          $name = $rowv['visitor_name'];
          $role = 'visitor'; // This is hardcoded for visitors
  
          // Prepare the visit date (current timestamp)
          $visit_date = date('Y-m-d H:i:s');
  
          // Insert data into the 'requests' table
          $sql2 = "INSERT INTO requests (professional_id, name, role, purpose, direction, visit_date, status, submitted, whom_to_visit_id)
                   VALUES ('$v_id', '$name', '$role', '$purpose', '$direction', '$visit_date', 'pending', CURRENT_TIMESTAMP, '$who')";
  
          // Execute the query
          $result2 = mysqli_query($conn, $sql2);
  
          // Check if the query was successful
          if ($result2) {
              echo 'Successfully inserted into requests table  ';
          } else {
              echo 'Error: ' . mysqli_error($conn);
          }
      }
  }

     
    } elseif($rowu['role'] == 'student') {
      $std_id = $rowu['student_id'];

      // Sanitize input (optional but safer)
      $std_id = mysqli_real_escape_string($conn, $std_id);

      // Corrected SQL (and fixed spelling of 'professional_id')
      $sqls = "INSERT INTO passes (proffesional_id, date_time) VALUES ('$std_id', CURRENT_TIMESTAMP);";

      // Execute query
      $result1 = mysqli_query($conn, $sqls);

      // Corrected result check
      if ($result1) {
        echo 'Successfully inserted into database';
      } else {
        echo 'Error: ' . mysqli_error($conn);
      }

      
    }
    elseif($rowu['role'] == 'staff'){
      $std_id = $rowu['staff_id'];

      // Sanitize input (optional but safer)
      $std_id = mysqli_real_escape_string($conn, $std_id);

      // Corrected SQL (and fixed spelling of 'professional_id')
      $sql1 = "INSERT INTO passes (proffesional_id, date_time) VALUES ('$std_id', CURRENT_TIMESTAMP);";

      // Execute query
      $result1 = mysqli_query($conn, $sql1);

      // Corrected result check
      if ($result1) {
        echo 'Successfully inserted into database';
      } else {
        echo 'Error: ' . mysqli_error($conn);
      }

    }


  }

  ?>


</body>

</html>