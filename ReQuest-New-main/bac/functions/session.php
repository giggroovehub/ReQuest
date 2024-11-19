<?php
// session.php
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // If not logged in, redirect to login page
    header("Location: /request/bac/login.php");
    exit();
}
?>
