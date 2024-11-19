<?php
// Start the session to check if the user is logged in
session_start();

// If the user is not logged in, redirect to the login page
if (!isset($_SESSION['user_id'])) {
    header('Location: /request/admin/login.php');
    exit;
}

// Fetch user details from the session
$user_id = $_SESSION['user_id'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];

// Optional: You can fetch additional user info from the database if needed
// Example: You could query user details based on $user_id

?>