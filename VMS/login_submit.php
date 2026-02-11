<?php
session_start();
include 'db.php';

// Get role from GET or POST
$role = $_GET['role'] ?? $_POST['role'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['name'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($username) || empty($password) || empty($role)) {
        // Missing fields, redirect back with error
        header("Location: login.php?role=$role&error=Please+fill+all+fields");
        exit();
    }

    // Prepare and execute query to get user by username and role
    $stmt = $conn->prepare("SELECT user_id, username, password, role FROM user WHERE username = ? AND role = ?");
    $stmt->bind_param("ss", $username, $role);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();

        // Verify password
        if (password_verify($password, $user['password'])) {
            // Password correct, set session variables
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['role'] = $user['role'];

            // Redirect to role-specific dashboard
            if ($user['role'] === 'student') {
                header("Location: dashboard_student.php");
            } elseif ($user['role'] === 'visitor') {
                header("Location: dashboard_visitor.php");
            } elseif ($user['role'] === 'staff') {
                header("Location: dashboard_staff.php");
            } elseif ($user['role'] === 'admin') {
                
                header("Location: admin.php");
            }
            exit();
        } else {
            // Invalid password
            header("Location: login.php?role=$role&error=Invalid+credentials");
            exit();
        }
    } else {
        // User not found
        header("Location: login.php?role=$role&error=Invalid+credentials");
        exit();
    }
} else {
    // Invalid request method
    header("Location: login.php?role=$role");
    exit();
}
?>
