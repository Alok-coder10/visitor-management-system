<?php
session_start();
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $role = $_POST['role'] ?? $_GET['role'] ?? '';

    if (empty($role)) {
        die("Role is required.");
    }

    // Common fields
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password)) {
        die("Username and password are required.");
    }

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Initialize variables for foreign keys
    $student_id = null;
    $staff_id = null;
    $visitor_id = null;

    // Insert role-specific data
    if ($role === 'student') {
        $name = $_POST['name'] ?? '';
        $rollno = $_POST['rollno'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $department = $_POST['department'] ?? '';

        if (empty($name) || empty($rollno) || empty($phone) || empty($department)) {
            die("All student fields are required.");
        }

        // Convert to uppercase
        $name = strtoupper($name);
        $rollno = strtoupper($rollno);
        $phone = strtoupper($phone);
        $department = strtoupper($department);

        // Insert into student table
        $stmt = $conn->prepare("INSERT INTO student (roll_no, student_name, department, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $rollno, $name, $department, $phone);
        if (!$stmt->execute()) {
            die("Error inserting student data: " . $stmt->error);
        }
        $student_id = $rollno;

    } elseif ($role === 'staff') {
        $name = $_POST['name'] ?? '';
        $staff_id_input = $_POST['staff_id'] ?? ''; // staff_id field not in form, so generate or use username?
        $phone = $_POST['phone'] ?? '';
        $department = $_POST['department'] ?? '';

        if (empty($name) || empty($phone) || empty($department)) {
            die("All staff fields are required.");
        }

        // Generate staff_id if not provided (e.g., use username or random)
        if (empty($staff_id_input)) {
            // Generate staff_id as first 5 chars of username or random string
            $staff_id_input = substr($username, 0, 5);
        }

        // Convert to uppercase
        $name = strtoupper($name);
        $staff_id_input = strtoupper($staff_id_input);
        $phone = strtoupper($phone);
        $department = strtoupper($department);

        // Insert into staff table
        $stmt = $conn->prepare("INSERT INTO staff (staff_id, staff_name, department, phone) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $staff_id_input, $name, $department, $phone);
        if (!$stmt->execute()) {
            die("Error inserting staff data: " . $stmt->error);
        }
        $staff_id = $staff_id_input;

    } elseif ($role === 'visitor') {
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        

        if (empty($name) || empty($phone) ) {
            die("All visitor fields are required.");
        }

        // Convert to uppercase
        $name = strtoupper($name);
        $phone = strtoupper($phone);
        // $whom_to_visit = strtoupper($whom_to_visit);

        // Insert into visitor table
        $stmt = $conn->prepare("INSERT INTO visitor (visitor_name, phone) VALUES (?, ?)");
        $stmt->bind_param("ss", $name, $phone);
        if (!$stmt->execute()) {
            die("Error inserting visitor data: " . $stmt->error);
        }
        $visitor_id = $conn->insert_id;

    } elseif ($role === 'admin') {
        // Admin has no role-specific table entry
        // $student_id = null;
        // $staff_id = null;
        // $visitor_id = null;
        $name = $_POST['name'] ?? '';
        $phone = $_POST['phone'] ?? '';
        $address = $_POST['address'] ?? '';

        $stmt = $conn->prepare("INSERT INTO admin (admin_name, address, phone ) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $address, $phone);
        if (!$stmt->execute()) {
            die("Error inserting visitor data: " . $stmt->error);
        }
        $admin_id = $conn->insert_id;
    } else {
        die("Invalid role specified.");
    }

    // Insert into user table
    $stmt = $conn->prepare("INSERT INTO user (username, password, role, student_id, staff_id, visitor_id) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $username, $hashed_password, $role, $student_id, $staff_id, $visitor_id);
    if (!$stmt->execute()) {
        die("Error inserting user data: " . $stmt->error);
    }

    // Set user_id session variable from inserted user id
    $_SESSION['user_id'] = $conn->insert_id;

    // Registration successful, set session and redirect to respective dashboard
    $_SESSION['username'] = $username;
    $_SESSION['role'] = $role;

    if ($role === 'student') {
        $_SESSION['student_id'] = $student_id;
        header("Location: dashboard_student.php");
    } elseif ($role === 'staff') {
        $_SESSION['staff_id'] = $staff_id;
        header("Location: dashboard_staff.php");
    } elseif ($role === 'visitor') {
        $_SESSION['visitor_id'] = $visitor_id;
        header("Location: dashboard_visitor.php");
    } elseif ($role === 'admin') {
        header("Location: admin.php");
    } else {
        // fallback redirect
        header("Location: login.php");
    }
    exit();


} else {
    die("Invalid request method.");
}
?>
