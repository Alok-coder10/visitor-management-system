<?php
session_start();

// Retrieve role before destroying session
$role = $_SESSION['role'] ?? '';

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to login page for specific role

    header("Location: home.html");

exit();
?>
